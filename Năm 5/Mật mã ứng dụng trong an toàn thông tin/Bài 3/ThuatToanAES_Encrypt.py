import numpy
import tabulate
# Khóa mở rộng đã tạo ở bài 2

KeyExpansion=["", "", "", "", "f0465f33", "1d892995", "152a9fed", "241bb883", "5d2ab305",
				"40a39a90", "5589057d", "7192bdfe", "165008a6", "56f39236", "037a974b", "72e82ab5", "85b5dde6",
				"d3464fd0", "d03cd89b", "a2d4f22e", "dd3cecdc", "0e7aa30c", "de467b97", "7c9289b9", "b29bbacc",
				"bce119c0", "62a76257", "1e35ebee", "647292be", "d8938b7e", "ba34e929", "a40102c7", "980554f7",
				"4096df89", "faa236a0", "5ea33467", "891dd1af", "c98b0e26", "33293886", "6d8a0ce1", "c1e32993",
				"086827b5", "3b411f33", "56cb13d2"]
# Tạo SBox và lưu vào mảng 2 chiều


SBox=[["63","7c","77","7b","f2","6b","6f","c5","30","01","67","2b","fe","d7","ab","76"],
      ["ca","82","c9","7d","fa","59","47","f0","ad","d4","a2","af","9c","a4","72","c0"],
      ["b7","fd","93","26","36","3f","f7","cc","34","a5","e5","f1","71","d8","31","15"],
      ["04","c7","23","c3","18","96","05","9a","07","12","80","e2","eb","27","b2","75"],
      ["09","83","2c","1a","1b","6e","5a","a0","52","3b","d6","b3","29","e3","2f","84"],
      ["53","d1","00","ed","20","fc","b1","5b","6a","cb","be","39","4a","4c","58","cf"],
      ["d0","ef","aa","fb","43","4d","33","85","45","f9","02","7f","50","3c","9f","a8"],
      ["51","a3","40","8f","92","9d","38","f5","bc","b6","da","21","10","ff","f3","d2"],
      ["cd","0c","13","ec","5f","97","44","17","c4","a7","7e","3d","64","5d","19","73"],
      ["60","81","4f","dc","22","2a","90","88","46","ee","b8","14","de","5e","0b","db"],
      ["e0","32","3a","0a","49","06","24","5c","c2","d3","ac","62","91","95","e4","79"],
      ["e7","c8","37","6d","8d","d5","4e","a9","6c","56","f4","ea","65","7a","ae","08"],
      ["ba","78","25","2e","1c","a6","b4","c6","e8","dd","74","1f","4b","bd","8b","8a"],
      ["70","3e","b5","66","48","03","f6","0e","61","35","57","b9","86","c1","1d","9e"],
      ["e1","f8","98","11","69","d9","8e","94","9b","1e","87","e9","ce","55","28","df"],
      ["8c","a1","89","0d","bf","e6","42","68","41","99","2d","0f","b0","54","bb","16"],
      ]

Matrix_MixColumn=[["02","03","01","01"],["01","02","03","01"],["01","01","02","03"],["03","01","01","02"]]


# PlainText = "a3c5080878a4ffd300ff3636285f0102"
PlainText = "a3c5080878a4ffd300ff3636285f0102"
CipherKey = "368ac0f4edcf76a608a3b6783131276e"

# Khai báo mảng 2 chiều giá trị mặc định bằng 0
# Round=[[0]*4] (Khai báo như này sẽ gán 1 giá trị đến nhiều hàng)
Round=[[ 0 for i in range(4) ] for j in range(4)]
AddRoundKey=[[ 0 for i in range(4) ] for j in range(4)]
CipherKeyArray=[[ 0 for i in range(4) ] for j in range(4)]
CipherKeyExpansionArray=[[ 0 for i in range(4) ] for j in range(4)]
index_PlainText = 0
index_CipherKey = 0

# Lưu PlainText vào mảng
for i in range(0,4):
    for j in range(0,4):
        tachByte=PlainText[index_PlainText]+PlainText[index_PlainText+1]
        index_PlainText+=2
        Round[j][i]=tachByte

# Lưu CipherKey vào mảng 
for i in range(0,4):
    for j in range(0,4):
        tachByte=CipherKey[index_CipherKey]+CipherKey[index_CipherKey+1]
        index_CipherKey+=2
        CipherKeyArray[j][i]=tachByte

# Tính AddRoundKey vòng 0

for i in range(0,4):
    for j in range(0,4):
        valueRound="0x"+Round[i][j]
        valueCipherKey="0x"+CipherKeyArray[i][j]
        xorValue_hex=hex(int(valueRound,16)^int(valueCipherKey,16))
        getValue=xorValue_hex[2:]
        if len(getValue)<2:
            getValue="0"+getValue
        AddRoundKey[i][j]=getValue





# Hàm tính SubByte
def Cal_SubByte(temp,SBox_thamchieu):
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
    result=SBox_thamchieu[int(tham_chieu_hang)][int(tham_chieu_cot)]
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

# Hàm tính MixColumn cột thứ 1
def MixColumn1(Round,Matrix_MixColumn):
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

# Hàm tính MixColumn cột thứ 2
def MixColumn2(Round,Matrix_MixColumn):
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

# Hàm tính MixColumn cột thứ 3
def MixColumn3(Round,Matrix_MixColumn):
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

# Hàm tính MixColumn cột thứ 4
def MixColumn4(Round,Matrix_MixColumn):
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

index_KeyExpansion=4
# Hiển thị ra màn hình quá trình thực hiện
# print("r\t"+"Bắt đầu vòng\t\t\t"+"After SubByte\t\t\t"+"After ShiftRows\t\t\t"+"After MixColumn\t\t\t"+"After AddRoundKey\t\t\t")
# Bắt đầu vòng 1 đến vòng 10
for i in range(0,10):
    # Khởi tạo thực hiện vòng

    for j in range(0,4):
        for k in range(0,4):
            Round[j][k]=AddRoundKey[j][k]
    # Lấy giá trị Bắt đầu vòng để hiển thị
    getValueBatDauVong=Round
    # Tính SubByte
    for j in range(0,4):
        for k in range(0,4):
            temp=Round[j][k]
            # Tham chiếu SBox
            SubByte=Cal_SubByte(temp,SBox)
            Round[j][k]=SubByte
    # Lấy giá trị SubByte để hiển thị
    getValueSubByte=Round
    # Tính ShiftRows
    # Tính shiftRows hàng thứ 2
    temp0=Round[1][0]
    temp1=Round[1][1]
    temp2=Round[1][2]
    temp3=Round[1][3]
    Round[1][0]=temp1
    Round[1][1]=temp2
    Round[1][2]=temp3
    Round[1][3]=temp0
    # Tính shiftRows hàng thứ 3
    temp0=Round[2][0]
    temp1=Round[2][1]
    temp2=Round[2][2]
    temp3=Round[2][3]
    Round[2][0]=temp2
    Round[2][1]=temp3
    Round[2][2]=temp0
    Round[2][3]=temp1
    # Tính shiftRows hàng thứ 4
    temp0=Round[3][0]
    temp1=Round[3][1]
    temp2=Round[3][2]
    temp3=Round[3][3]
    Round[3][0]=temp3
    Round[3][1]=temp0
    Round[3][2]=temp1
    Round[3][3]=temp2

    # Lấy giá trị ShiftRows để hiển thị
    getValueShiftRows=Round
    # Tính MixColumn
    if i!=9: 
        # Tính MixColumn cột thứ 1
        Round=MixColumn1(Round,Matrix_MixColumn) 
        # Tính MixColumn cột thứ 2
        Round=MixColumn2(Round,Matrix_MixColumn)
        # Tính MixColumn cột thứ 3
        Round=MixColumn3(Round,Matrix_MixColumn)
        # Tính MixColumn cột thứ 4
        Round=MixColumn4(Round,Matrix_MixColumn)
    
    # Lấy giá trị MixColumn để hiển thị
    getValueMixColumn=Round
    # Tính AddRoundKey
    cipherKeyExpansion=""
    index_CipherKeyExpansion=0
    for j in range(index_KeyExpansion,index_KeyExpansion+4):
        cipherKeyExpansion+=KeyExpansion[j]
    
    index_KeyExpansion+=4

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
    

    # Lấy giá trị AddRoundKey để hiển thị
    getValueAddRoundKey=AddRoundKey
    
    

# Hiển thị kết quả mã hóa
print("Kết quả mã hóa là:")
result_encrypt=""
for i in range(0,4):
    for j in range(0,4):
        result_encrypt+=AddRoundKey[j][i]

print(result_encrypt)


