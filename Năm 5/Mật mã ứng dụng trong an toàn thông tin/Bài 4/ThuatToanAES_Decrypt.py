import numpy

# Khóa mở rộng đã tạo ở bài 2

KeyExpansion=["", "", "", "", "f0465f33", "1d892995", "152a9fed", "241bb883", "5d2ab305",
				"40a39a90", "5589057d", "7192bdfe", "165008a6", "56f39236", "037a974b", "72e82ab5", "85b5dde6",
				"d3464fd0", "d03cd89b", "a2d4f22e", "dd3cecdc", "0e7aa30c", "de467b97", "7c9289b9", "b29bbacc",
				"bce119c0", "62a76257", "1e35ebee", "647292be", "d8938b7e", "ba34e929", "a40102c7", "980554f7",
				"4096df89", "faa236a0", "5ea33467", "891dd1af", "c98b0e26", "33293886", "6d8a0ce1", "c1e32993",
				"086827b5", "3b411f33", "56cb13d2"]

SBox_Inverse=[  ["52","09","6a","d5","30","36","a5","38","bf","40","a3","9e","81","f3","d7","fb"],
                ["7c","e3","39","82","9b","2f","ff","87","34","8e","43","44","c4","de","e9","cb"],
                ["54","7b","94","32","a6","c2","23","3d","ee","4c","95","0b","42","fa","c3","4e"],
                ["08","2e","a1","66","28","d9","24","b2","76","5b","a2","49","6d","8b","d1","25"],
                ["72","f8","f6","64","86","68","98","16","d4","a4","5c","cc","5d","65","b6","92"],
                ["6c","70","48","50","fd","ed","b9","da","5e","15","46","57","a7","8d","9d","84"],
                ["90","d8","ab","00","8c","bc","d3","0a","f7","e4","58","05","b8","b3","45","06"],
                ["d0","2c","1e","8f","ca","3f","0f","02","c1","af","bd","03","01","13","8a","6b"],
                ["3a","91","11","41","4f","67","dc","ea","97","f2","cf","ce","f0","b4","e6","73"],
                ["96","ac","74","22","e7","ad","35","85","e2","f9","37","e8","1c","75","df","6e"],
                ["47","f1","1a","71","1d","29","c5","89","6f","b7","62","0e","aa","18","be","1b"],
                ["fc","56","3e","4b","c6","d2","79","20","9a","db","c0","fe","78","cd","5a","f4"],
                ["1f","dd","a8","33","88","07","c7","31","b1","12","10","59","27","80","ec","5f"],
                ["60","51","7f","a9","19","b5","4a","0d","2d","e5","7a","9f","93","c9","9c","ef"],
                ["a0","e0","3b","4d","ae","2a","f5","b0","c8","eb","bb","3c","83","53","99","61"],
                ["17","2b","04","7e","ba","77","d6","26","e1","69","14","63","55","21","0c","7d"]]

Matrix_MixColumn_Inverse=[["0e","0b","0d","09"],["09","0e","0b","0d"],["0d","09","0e","0b"],["0b","0d","09","0e"]]

# Encrypted_PlainText = "a624624834dda8b91af1735d000ecf61"
Encrypted_PlainText = "a624624834dda8b91af1735d000ecf61"
CipherKey = "368ac0f4edcf76a608a3b6783131276e"

# Khai báo mảng 2 chiều giá trị mặc định bằng 0
# Round=[[0]*4] (Khai báo như này sẽ gán 1 giá trị đến nhiều hàng)
Round=[[ 0 for i in range(4) ] for j in range(4)]
AddRoundKey=[[ 0 for i in range(4) ] for j in range(4)]
CipherKeyArray=[[ 0 for i in range(4) ] for j in range(4)]
CipherKeyExpansionArray=[[ 0 for i in range(4) ] for j in range(4)]
index_Encrypted_PlainText = 0
index_CipherKey = 0

# Lưu PlainText đã mã hóa vào mảng
for i in range(0,4):
    for j in range(0,4):
        tachByte=Encrypted_PlainText[index_Encrypted_PlainText]+Encrypted_PlainText[index_Encrypted_PlainText+1]
        index_Encrypted_PlainText+=2
        Round[j][i]=tachByte

# Lưu CipherKey vào mảng 
for i in range(0,4):
    for j in range(0,4):
        tachByte=CipherKey[index_CipherKey]+CipherKey[index_CipherKey+1]
        index_CipherKey+=2
        CipherKeyArray[j][i]=tachByte

# Giải mã AddRoundKey vòng 0
# Lưu KeyExpansion từ 40 đến 43
cipherKeyExpansion=""
index_CipherKeyExpansion=0
for j in range(40,44):
    cipherKeyExpansion+=KeyExpansion[j]


# Lưu cipherKeyExpansion vào mảng để tính xor
for j in range(0,4):
    for k in range(0,4):
        tachByte=cipherKeyExpansion[index_CipherKeyExpansion]+cipherKeyExpansion[index_CipherKeyExpansion+1]
        index_CipherKeyExpansion+=2
        CipherKeyExpansionArray[k][j]=tachByte

# Tính AddRoundKey vòng 0

for i in range(0,4):
    for j in range(0,4):
        valueRound="0x"+Round[i][j]
        valueCipherKeyExpansion="0x"+CipherKeyExpansionArray[i][j]
        xorValue_hex=hex(int(valueRound,16)^int(valueCipherKeyExpansion,16))
        getValue=xorValue_hex[2:]
        if len(getValue)<2:
            getValue="0"+getValue
        AddRoundKey[i][j]=getValue
print
# ----------------------Các hàm tính từ vòng 1 đến vòng 10------------------------#
def Cal_Inverse_SubByte(temp,SBox_Inverse_thamchieu):
    tham_chieu_hang=temp[0]
    tham_chieu_cot=temp[1]
    if tham_chieu_hang=="a":
        tham_chieu_hang=10
    elif tham_chieu_hang=="b":
        tham_chieu_hang=11
    elif tham_chieu_hang=="c":
        tham_chieu_hang=12
    elif tham_chieu_hang=="d":
        tham_chieu_hang=13
    elif tham_chieu_hang=="e":
        tham_chieu_hang=14
    elif tham_chieu_hang=="f":
        tham_chieu_hang=15
    
    if tham_chieu_cot=="a":
        tham_chieu_cot=10
    elif tham_chieu_cot=="b":
        tham_chieu_cot=11
    elif tham_chieu_cot=="c":
        tham_chieu_cot=12
    elif tham_chieu_cot=="d":
        tham_chieu_cot=13
    elif tham_chieu_cot=="e":
        tham_chieu_cot=14
    elif tham_chieu_cot=="f":
        tham_chieu_cot=15
    result=SBox_Inverse_thamchieu[int(tham_chieu_hang)][int(tham_chieu_cot)]
    return result


# Convert sang dạng nhị phân 8 bit
def convert_to_binary(hextobinary):
    return format(int(hextobinary, 16),'08b')

# Lưu vào 1 biến mảng
def convert_to_array(to_array):
    getValue_to_array=[]
    for i in to_array:
        getValue_to_array.append(int(i))
    return getValue_to_array

def nhanDaThuc(valueMixcolumn,valueRound):
    result_mul=numpy.polynomial.polynomial.polymul(valueMixcolumn,valueRound)
    index=0
    for i in result_mul:
        while i>1:
            i=i%2
            result_mul[index]=i
        index+=1
    return result_mul

def chiaDaThuc(valueCanChia):
    # Đa thức g(x)= 1+ x+ x^3 + x^4 + x^8
    gx=[1,1,0,1,1,0,0,0,1]
    result_thuong,result_du=numpy.polynomial.polynomial.polydiv(valueCanChia,gx)
    index=0
    for i in result_du:
        if i<0:
            i=abs(i)
            result_du[index]=i
        while i>1:
            i=i%2
            result_du[index]=i
        index+=1
    return result_du

# Format lại 8 bit khi đã thực hiện chia đa thức
def convert8bit(valueCanConvert):
    getValue=[]
    for i in valueCanConvert:
        getValue.append(i)
    while len(getValue)!=8:
        getValue.append(0.0)
    return getValue

# Đảo ngược lại các bit lưu vào biến string
def reverse8bit(valueCanReverse):
    value=""
    for i in valueCanReverse:
        value+=str(int(i))
    return value[::-1]

# Xor các giá trị tính được
def xorValue(value1,value2,value3,value4):
    value1=int(value1, 2)
    value2=int(value2, 2)
    value3=int(value3, 2)
    value4=int(value4, 2)
    result=hex(value1^value2^value3^value4)
    getHex_no0x=result[2:]
    if len(getHex_no0x)<2:
        getHex_no0x="0"+getHex_no0x
    return getHex_no0x

# Đảo ngược lại các bit để dùng được thư viện numpy. VD:10010 thành 01001
def reverse_he_so(reverseValue):
    return reverseValue[::-1]


# Hàm tính Inverse MixColumn cột thứ 1
def Inverse_MixColumn1(Round,Matrix_MixColumn):
    # Tạo bản nháp của ma trận
    temp_array=[[ 0 for i in range(4) ] for j in range(4)]
    for i in range(0,4):
        for j in range(0,4):
            temp_array[i][j]=Round[i][j]
    # Thực hiện tính MixColumn
    for i in range(0,4):
        getValue1MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][0])))
        getValue2MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][1])))
        getValue3MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][2])))
        getValue4MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][3])))
        getValue1RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[0][0])))
        getValue2RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[1][0])))
        getValue3RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[2][0])))
        getValue4RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[3][0])))
        resultmuldiv_1=chiaDaThuc(nhanDaThuc(getValue1MixColumn,getValue1RoundColumn1))
        resultmuldiv_2=chiaDaThuc(nhanDaThuc(getValue2MixColumn,getValue2RoundColumn1))
        resultmuldiv_3=chiaDaThuc(nhanDaThuc(getValue3MixColumn,getValue3RoundColumn1))
        resultmuldiv_4=chiaDaThuc(nhanDaThuc(getValue4MixColumn,getValue4RoundColumn1))
        result8bit_and_reverse_1=reverse8bit(convert8bit(resultmuldiv_1))
        result8bit_and_reverse_2=reverse8bit(convert8bit(resultmuldiv_2))
        result8bit_and_reverse_3=reverse8bit(convert8bit(resultmuldiv_3))
        result8bit_and_reverse_4=reverse8bit(convert8bit(resultmuldiv_4))
        resultXor=xorValue(result8bit_and_reverse_1,result8bit_and_reverse_2,result8bit_and_reverse_3,result8bit_and_reverse_4)
        temp_array[i][0]=resultXor
    return temp_array


# Hàm tính Inverse MixColumn cột thứ 2
def Inverse_MixColumn2(Round,Matrix_MixColumn):
    # Tạo bản nháp của ma trận
    temp_array=[[ 0 for i in range(4) ] for j in range(4)]
    for i in range(0,4):
        for j in range(0,4):
            temp_array[i][j]=Round[i][j]
    # Thực hiện tính MixColumn
    for i in range(0,4):
        getValue1MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][0])))
        getValue2MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][1])))
        getValue3MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][2])))
        getValue4MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][3])))
        getValue1RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[0][1])))
        getValue2RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[1][1])))
        getValue3RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[2][1])))
        getValue4RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[3][1])))
        resultmuldiv_1=chiaDaThuc(nhanDaThuc(getValue1MixColumn,getValue1RoundColumn1))
        resultmuldiv_2=chiaDaThuc(nhanDaThuc(getValue2MixColumn,getValue2RoundColumn1))
        resultmuldiv_3=chiaDaThuc(nhanDaThuc(getValue3MixColumn,getValue3RoundColumn1))
        resultmuldiv_4=chiaDaThuc(nhanDaThuc(getValue4MixColumn,getValue4RoundColumn1))
        result8bit_and_reverse_1=reverse8bit(convert8bit(resultmuldiv_1))
        result8bit_and_reverse_2=reverse8bit(convert8bit(resultmuldiv_2))
        result8bit_and_reverse_3=reverse8bit(convert8bit(resultmuldiv_3))
        result8bit_and_reverse_4=reverse8bit(convert8bit(resultmuldiv_4))
        resultXor=xorValue(result8bit_and_reverse_1,result8bit_and_reverse_2,result8bit_and_reverse_3,result8bit_and_reverse_4)
        temp_array[i][1]=resultXor
    return temp_array


# Hàm tính Inverse MixColumn cột thứ 3
def Inverse_MixColumn3(Round,Matrix_MixColumn):
    # Tạo bản nháp của ma trận
    temp_array=[[ 0 for i in range(4) ] for j in range(4)]
    for i in range(0,4):
        for j in range(0,4):
            temp_array[i][j]=Round[i][j]
    # Thực hiện tính MixColumn
    for i in range(0,4):
        getValue1MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][0])))
        getValue2MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][1])))
        getValue3MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][2])))
        getValue4MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][3])))
        getValue1RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[0][2])))
        getValue2RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[1][2])))
        getValue3RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[2][2])))
        getValue4RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[3][2])))
        resultmuldiv_1=chiaDaThuc(nhanDaThuc(getValue1MixColumn,getValue1RoundColumn1))
        resultmuldiv_2=chiaDaThuc(nhanDaThuc(getValue2MixColumn,getValue2RoundColumn1))
        resultmuldiv_3=chiaDaThuc(nhanDaThuc(getValue3MixColumn,getValue3RoundColumn1))
        resultmuldiv_4=chiaDaThuc(nhanDaThuc(getValue4MixColumn,getValue4RoundColumn1))
        result8bit_and_reverse_1=reverse8bit(convert8bit(resultmuldiv_1))
        result8bit_and_reverse_2=reverse8bit(convert8bit(resultmuldiv_2))
        result8bit_and_reverse_3=reverse8bit(convert8bit(resultmuldiv_3))
        result8bit_and_reverse_4=reverse8bit(convert8bit(resultmuldiv_4))
        resultXor=xorValue(result8bit_and_reverse_1,result8bit_and_reverse_2,result8bit_and_reverse_3,result8bit_and_reverse_4)
        temp_array[i][2]=resultXor
    return temp_array


# Hàm tính Inverse MixColumn cột thứ 4
def Inverse_MixColumn4(Round,Matrix_MixColumn):
    # Tạo bản nháp của ma trận
    temp_array=[[ 0 for i in range(4) ] for j in range(4)]
    for i in range(0,4):
        for j in range(0,4):
            temp_array[i][j]=Round[i][j]
    # Thực hiện tính MixColumn
    for i in range(0,4):
        getValue1MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][0])))
        getValue2MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][1])))
        getValue3MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][2])))
        getValue4MixColumn=convert_to_array(reverse_he_so(convert_to_binary(Matrix_MixColumn[i][3])))
        getValue1RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[0][3])))
        getValue2RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[1][3])))
        getValue3RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[2][3])))
        getValue4RoundColumn1=convert_to_array(reverse_he_so(convert_to_binary(Round[3][3])))
        resultmuldiv_1=chiaDaThuc(nhanDaThuc(getValue1MixColumn,getValue1RoundColumn1))
        resultmuldiv_2=chiaDaThuc(nhanDaThuc(getValue2MixColumn,getValue2RoundColumn1))
        resultmuldiv_3=chiaDaThuc(nhanDaThuc(getValue3MixColumn,getValue3RoundColumn1))
        resultmuldiv_4=chiaDaThuc(nhanDaThuc(getValue4MixColumn,getValue4RoundColumn1))
        result8bit_and_reverse_1=reverse8bit(convert8bit(resultmuldiv_1))
        result8bit_and_reverse_2=reverse8bit(convert8bit(resultmuldiv_2))
        result8bit_and_reverse_3=reverse8bit(convert8bit(resultmuldiv_3))
        result8bit_and_reverse_4=reverse8bit(convert8bit(resultmuldiv_4))
        resultXor=xorValue(result8bit_and_reverse_1,result8bit_and_reverse_2,result8bit_and_reverse_3,result8bit_and_reverse_4)
        temp_array[i][3]=resultXor
    return temp_array
# ----------------------Kết thúc Các hàm tính từ vòng 1 đến vòng 10------------------------#

# Thực hiện Inverse từ vòng 1 đến vòng 10
# Khởi tạo thực hiện vòng

for j in range(0,4):
    for k in range(0,4):
        Round[j][k]=AddRoundKey[j][k]

index_KeyExpansion=36
for i in range(0,10):
    
    
    # Tính Inverse ShifRows
    # Tính Inverse ShifRows hàng thứ 2
    temp0=Round[1][0]
    temp1=Round[1][1]
    temp2=Round[1][2]
    temp3=Round[1][3]
    Round[1][0]=temp3
    Round[1][1]=temp0
    Round[1][2]=temp1
    Round[1][3]=temp2
    # Tính Inverse ShiftRows hàng thứ 3
    temp0=Round[2][0]
    temp1=Round[2][1]
    temp2=Round[2][2]
    temp3=Round[2][3]
    Round[2][0]=temp2
    Round[2][1]=temp3
    Round[2][2]=temp0
    Round[2][3]=temp1
    # Tính Inverse ShiftRows hàng thứ 4
    temp0=Round[3][0]
    temp1=Round[3][1]
    temp2=Round[3][2]
    temp3=Round[3][3]
    Round[3][0]=temp1
    Round[3][1]=temp2
    Round[3][2]=temp3
    Round[3][3]=temp0
    print
    # Tính Inverse SubByte
    
    for j in range(0,4):
        for k in range(0,4):
            temp=Round[j][k]
            # Tham chiếu SBox
            SubByte=Cal_Inverse_SubByte(temp,SBox_Inverse)
            Round[j][k]=SubByte
    
    if i!=9:
        # Tính AddRoundKey
        cipherKeyExpansion=""
        index_CipherKeyExpansion=0
        for j in range(index_KeyExpansion,index_KeyExpansion+4):
            cipherKeyExpansion+=KeyExpansion[j]

        index_KeyExpansion-=4
        # Lưu cipherKeyExpansion vào mảng để tính xor
        for j in range(0,4):
            for k in range(0,4):
                tachByte=cipherKeyExpansion[index_CipherKeyExpansion]+cipherKeyExpansion[index_CipherKeyExpansion+1]
                index_CipherKeyExpansion+=2
                CipherKeyExpansionArray[k][j]=tachByte
        
        # Thực hiện tính AddRoundKey
        for j in range(0,4):
            for k in range(0,4):
                valueRound="0x"+Round[j][k]
                valueCipherKeyExpansion="0x"+CipherKeyExpansionArray[j][k]
                xorValue_hex=hex(int(valueRound,16)^int(valueCipherKeyExpansion,16))
                getValue=xorValue_hex[2:]
                if len(getValue)<2:
                    getValue="0"+getValue
                AddRoundKey[j][k]=getValue
        
        # Gán lại cho mảng Round để thực hiện tính tiếp MixColumn Inverse
        for j in range(0,4):
            for k in range(0,4):
                Round[j][k]=AddRoundKey[j][k]
        
        # Tính Inverse MixColumn
    
        # Tính Inverse MixColumn cột thứ 1
        Round=Inverse_MixColumn1(Round,Matrix_MixColumn_Inverse) 
        # Tính Inverse MixColumn cột thứ 2
        Round=Inverse_MixColumn2(Round,Matrix_MixColumn_Inverse)
        # Tính Inverse MixColumn cột thứ 3
        Round=Inverse_MixColumn3(Round,Matrix_MixColumn_Inverse)
        # Tính Inverse MixColumn cột thứ 4
        Round=Inverse_MixColumn4(Round,Matrix_MixColumn_Inverse)
    else:
        
        
        # Tính AddRoundKey vòng cuối

        for i in range(0,4):
            for j in range(0,4):
                valueRound="0x"+Round[i][j]
                valueCipherKey="0x"+CipherKeyArray[i][j]
                xorValue_hex=hex(int(valueRound,16)^int(valueCipherKey,16))
                getValue=xorValue_hex[2:]
                if len(getValue)<2:
                    getValue="0"+getValue
                AddRoundKey[i][j]=getValue

# Hiển thị kết quả giải mã
print("Kết quả giả mã là:")
result_decrypt=""
for i in range(0,4):
    for j in range(0,4):
        result_decrypt+=AddRoundKey[j][i]

print(result_decrypt)
