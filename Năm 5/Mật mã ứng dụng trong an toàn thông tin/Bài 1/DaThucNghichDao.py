import numpy

# Đa thức g(x)= 1+ x+ x^3 + x^4 + x^8
gx=(1,1,0,1,1,0,0,0,1)
ax=[]

print("Nhập các hệ số của đa thức cần tìm từ bậc thấp đến bậc cao:")
# Ví dụ nhập x^6 + x^5 + x + 1 thì nhập 1100011
heso=input()
for value in heso:
    ax.append(int(value))

t=[]
r=[]
def DaThucNghichDao(ax,gx):
    t.append(0)
    t.append(1)
    r.append(gx)
    r.append(ax)
    i=1
    while len(r[i])!=-1:
        thuong=ChiaDaThuc(r[i-1],r[i])
        r.append(TruDaThucMangR(r[i-1],thuong,r[i]))
        ChieuDaiMangR=len(r)
        if len(r[ChieuDaiMangR-1])==1:
            if int(r[ChieuDaiMangR-1])==0:
                break
        t.append(TruDaThucMangT(t[i-1],thuong,t[i]))
        i=i+1
    PhanTuCuoiCungMang=len(r)
    Bac=len(r[PhanTuCuoiCungMang-1])
    if Bac==1:
        if r[PhanTuCuoiCungMang-1]==0:
            return t[len(t)-1]
        else:
            return "Không tìm thấy đa thức nghịch đảo"


def ChiaDaThuc(DaThucChia,DaThucBiChia):
    resultThuong,resultPhanDu=numpy.polynomial.polynomial.polydiv(DaThucChia,DaThucBiChia)
    index=0;
    for truyxuat in resultThuong:
        # Chia sẽ âm mà thực hiện các phép toán trên trường GF(2^8) thì cần không âm nên dùng hàm abs để thành giá trị dương
        resultThuong[index]=abs(truyxuat)
        if truyxuat>1:
            # Trường GF(2^8) chỉ nhận 2 giá trị 0 hoặc 1 nên cần mod cho 2
            resultThuong[index]=truyxuat%2
        index=index+1
    return resultThuong

def TruDaThucMangR(PhanTuTruocMangR,Thuong,PhanTuSauMangR):
    ResultTichMangR=TichMangR(Thuong,PhanTuSauMangR)
    ResultTruMangR=numpy.polynomial.polynomial.polysub(PhanTuTruocMangR,ResultTichMangR)
    index=0;
    for truyxuat in ResultTruMangR:
        ResultTruMangR[index]=abs(truyxuat)
        index=index+1
    return ResultTruMangR

def TichMangR(PhanTu1,PhanTu2):
    resultTich=numpy.polynomial.polynomial.polymul(PhanTu1,PhanTu2)
    index=0
    for truyxuat in resultTich:
        if truyxuat>1:
            resultTich[index]=truyxuat%2
        index=index+1
    return resultTich

def TruDaThucMangT(PhanTuTruocMangT,Thuong,PhanTuSauMangT):
    ResultTichMangT=TichMangT(Thuong,PhanTuSauMangT)
    ResultTruMangT=numpy.polynomial.polynomial.polysub(PhanTuTruocMangT,ResultTichMangT)
    index=0;
    for truyxuat in ResultTruMangT:
        ResultTruMangT[index]=abs(truyxuat)
        index=index+1
    return ResultTruMangT

def TichMangT(PhanTu1,PhanTu2):
    resultTich=numpy.polynomial.polynomial.polymul(PhanTu1,PhanTu2)
    index=0
    for truyxuat in resultTich:
        if truyxuat>1:
            resultTich[index]=truyxuat%2
        index=index+1
    return resultTich



# Tính đa thức Nghịch đảo
resultIs=DaThucNghichDao(ax,gx)
# Cụ thể hóa kết quả
print("Kết quả là:")
print(resultIs)
print("Biểu diễn cụ là:")
BieuDienDaThucNghichDao=""
index=0
for truyxuat in resultIs:
    if index==0:
        if truyxuat==1:
            BieuDienDaThucNghichDao+="1 + "
    elif index==1:
        if truyxuat==1:
            BieuDienDaThucNghichDao+="x + "
    else:
        if truyxuat==1:
            if index==len(resultIs)-1:
                BieuDienDaThucNghichDao+=" x^"+str(index)
            else:
                BieuDienDaThucNghichDao+=" x^"+str(index)+" +"
    index=index+1
print(BieuDienDaThucNghichDao)