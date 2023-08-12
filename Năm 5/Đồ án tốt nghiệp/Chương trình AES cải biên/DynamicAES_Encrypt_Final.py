import numpy
# Tạo SBox và lưu vào mảng 2 chiều

def Cal_AfterRotWord(temp):
    getTemp=temp
    tachPhanDau=getTemp[0]+getTemp[1]
    tachPhanSau=""
    for i in range(2,len(getTemp)):
        tachPhanSau=tachPhanSau+getTemp[i]
    result=tachPhanSau+tachPhanDau
    return result

def Cal_AfterSubWord(tempAfterRotWord, SBox_thamchieu):
    getAfterRotWord=tempAfterRotWord
    getSBox=SBox_thamchieu
    result=""
    for i in range(0,len(getAfterRotWord),2):
        tham_chieu_Hang_SBox=getAfterRotWord[i]
        tham_chieu_Cot_SBox=getAfterRotWord[i+1]
        # Phân tích tham chiếu hàng
        if tham_chieu_Hang_SBox=="a":
            tham_chieu_Hang_SBox="10"
        elif tham_chieu_Hang_SBox=="b":
            tham_chieu_Hang_SBox="11"
        elif tham_chieu_Hang_SBox=="c":
            tham_chieu_Hang_SBox="12"
        elif tham_chieu_Hang_SBox=="d":
            tham_chieu_Hang_SBox="13"
        elif tham_chieu_Hang_SBox=="e":
            tham_chieu_Hang_SBox="14"
        elif tham_chieu_Hang_SBox=="f":
            tham_chieu_Hang_SBox="15"
        # Phân tích tham chiếu cột
        if tham_chieu_Cot_SBox=="a":
            tham_chieu_Cot_SBox="10"
        elif tham_chieu_Cot_SBox=="b":
            tham_chieu_Cot_SBox="11"
        elif tham_chieu_Cot_SBox=="c":
            tham_chieu_Cot_SBox="12"
        elif tham_chieu_Cot_SBox=="d":
            tham_chieu_Cot_SBox="13"
        elif tham_chieu_Cot_SBox=="e":
            tham_chieu_Cot_SBox="14"
        elif tham_chieu_Cot_SBox=="f":
            tham_chieu_Cot_SBox="15"
        result=result+getSBox[int(tham_chieu_Hang_SBox)][int(tham_chieu_Cot_SBox)]
    return result

def Cal_AfterXORwithRcon(tempAfterSubWord,tempRcon):
    resultFinal=int(tempAfterSubWord,16)^int(tempRcon,16)
    resultFinal=hex(resultFinal)[2:]
    return resultFinal

def Result_Wi(AfterXORwithRcon, tempwi):
    resultFinal=int(AfterXORwithRcon,16)^int(tempwi,16)
    resultFinal=hex(resultFinal)[2:]
    if len(resultFinal)<8:
        for i in range(0,8-len(resultFinal)):
            resultFinal="0"+resultFinal
    return resultFinal


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


# readfile_plaintext = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Data Test\\Final\\Plaintext.txt", "r",encoding='utf-8')
# readfile_keycipher = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Data Test\\Final\\Key_for_Case3.txt", "r",encoding='utf-8')
# # writefile_ciphertext = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Data Test\\Final\\Ciphertext_Original_AES.txt", "a",encoding='utf-8')
# # writefile_ciphertext = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Data Test\\Final\\Ciphertext_Original_AES_Case2(Hex).txt", "a",encoding='utf-8')
# writefile_ciphertext = open("C:\\Users\\Admin\\Downloads\\Đồ án tốt nghiệp\\Code đồ án\\Data Test\\Final\\Ciphertext_Original_AES_Case3(Hex).txt", "a",encoding='utf-8')
# for i in range(0,1000):
#     get_plaintext=readfile_plaintext.readline().strip()
#     get_cipherkey=readfile_keycipher.readline().strip()
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
PlainText = "00112233445566778899aabbccddeef9"
# CipherKey = "368ac0f4edcf76a608a3b6783131276e"
# CipherKey = "486f63207669656e204b544d4d414354" #Case1
#CipherKey = "00000000000000000000000000000000" # Case2
CipherKey = "000102030405060708090a0b0c0d0e0f" # Case3
# Khóa dùng để dịch vòng
Kr = "09080706050403020100"
# Lưu khóa dịch vòng vào mảng
Array_Kr=[ 0 for i in range(10) ]
index_Kr=0;
for i in range(0,10):
    Array_Kr[i]=Kr[index_Kr]+Kr[index_Kr+1]
    index_Kr+=2
# Kết thúc lưu khóa dịch vòng vào mảng
#Tính Key Expansion từ khóa


RC=["","01000000","02000000","04000000","08000000","10000000","20000000","40000000","80000000","1b000000","36000000"]
Nk=4
#Khai báo mảng key expansion
w=[0 for i in range(44)]
#Khai báo mảng tạm
temp=[0 for i in range(44)]

w[0]=CipherKey[0:8]
w[1]=CipherKey[8:16]
w[2]=CipherKey[16:24]
w[3]=CipherKey[24:]

temp[0]=CipherKey[0:8]
temp[1]=CipherKey[8:16]
temp[2]=CipherKey[16:24]
temp[3]=CipherKey[24:]

#Khai báo mảng AfterRotWord, AfterSubWord, Rcon, AfterXORwithRcon

AfterRotWord=[0 for i in range(44)]
AfterSubWord=[0 for i in range(44)]
Rcon=[0 for i in range(44)]
AfterXORwithRcon=[0 for i in range(44)]




for i in range(4,44):
    if i%4==0:
        # gán Temp
        temp[i]=w[i-1]
        # Tính AfterRotWord
        AfterRotWord[i]=Cal_AfterRotWord(temp[i])
        # Tính AfterSubWord
        AfterSubWord[i]=Cal_AfterSubWord(AfterRotWord[i],SBox)
        # Lưu vào mảng Rcon mục đích để hiển thị
        Rcon[i]=RC[int(i/Nk)]
        # Tính AfterXORwithRconWord
        AfterXORwithRcon[i]=Cal_AfterXORwithRcon(AfterSubWord[i],Rcon[i])
        # Tính w[i]
        w[i]=Result_Wi(AfterXORwithRcon[i],w[i-Nk])
    else:
        # gán Temp
        temp[i]=w[i-1]
        # Tính w[i]
        w[i]=Result_Wi(temp[i],w[i-Nk])


# Key Expansion hoàn thiện gán vào biến KeyExpansion
KeyExpansion=w

#Kết thúc Tính Key Expansion từ khóa


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
    # Chuyển byte sang thập phân
    byteToDemical=int(Array_Kr[i],16)
    # Dịch vòng S-Box
    SBox_temp=numpy.roll(SBox,byteToDemical)
    for j in range(0,4):
        for k in range(0,4):
            temp=Round[j][k]
            # Tham chiếu SBox
            SubByte=Cal_SubByte(temp,SBox_temp)
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
# writefile_ciphertext.write(result_encrypt)
# writefile_ciphertext.write("\n")

