# Thuật toán

>**Input**: Hai số nguyên dương a, b (a $\geq$ b)

>**Output**: d = gcd(a, b) và số nguyên x, y thỏa mãn ax + by = d

1. If b = 0 then d $\leftarrow$ a, x $\leftarrow$ 1, y $\leftarrow$ 0 and Return(d, x, y).
2. $x_2 \leftarrow 1$, $x_1 \leftarrow 0$, $y_2 \leftarrow 0$, $y_1 \leftarrow 1$
3. While b > 0 do\
    3.1. $q \leftarrow$ a div b, $r \leftarrow$ a mod b, $x \leftarrow x_2 - qx_1$, $y \leftarrow y_2 - qy_1$\
    3.2. $x_2 \leftarrow x_1$, $x_1 \leftarrow x$, $y_2 \leftarrow y_1$, $y_1 \leftarrow y$, $a \leftarrow b$, $b \leftarrow r$
4. $d \leftarrow a$, $x \leftarrow x_2$, $y \leftarrow y_2$
5. Return(d, x, y)

# Ví dụ

>**Input**: a = 1759, b = 550

### Bảng diễn giải thuật toán
| q | r | x | y | a | b | $x_2$ | $x_1$ | $y_2$ | $y_1$ |
| :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: | :---: |
|  |  |  |  | 1759 | 550 | 1 | 0 | 0 | 1 |
| 3 | 109 | 1 | -3 | 550 | 109 | 0 | 1 | 1 | -3 |
| 5 | 5 | -5 | 16 | 109 | 5 | 1 | -5 | -3 | 16 |
| 21 | 4 | 106 | -339 | 5 | 4 | -5 | 106 | 16 | -339 |
| 1 | 1 | -111 | 335 | 4 | 1 | 106 | -111 | -339 | 355 |
| 4 | 0 | 550 | -1759 | **1** | **0** | **-111** | 550 | **355** | -1759 |

$\implies$ 1759x + 550y = 1

Hay $550^{-1} \bmod 1759 = 355$

&emsp;&ensp;&thinsp; $1759^{-1} \bmod 550 = -111 = 439$

### Giải thích $1759^{-1} \bmod 550 = 439$ ?

Ta có:

> $1759^{-1} \bmod 550 = \frac{1}{1759} \bmod 550$

Giải sử:

> $\frac{1}{1759} \bmod 550 = x$

Chuyển vế suy ra tìm x sao cho:

> $1 \bmod 550 = 1759x$

Tức là tìm x sao cho 1759x mod 550 bằng 1 hay:

> 1759x $\equiv 1 \bmod 550$

Suy ra x = 439 vì:

> $(1759 . 439) \bmod 550 = 1$

### Giải thích bằng cách khác

Ta có:

> $1759^{-1} \bmod 550 = -111$

Tức là:

>$-111 \bmod 550 = ?$

Ta thực hiện phép chia -111 cho 550, khi chia 1 số âm cho 1 số dương kết quả là **1 số âm ***x***** nào đó chứ **không phải bằng 0** như chia thông thường, sau đó thực hiện phép chia thông thường sao cho: **(-111) - (550 . x) > 0, x là nhỏ nhất**

Vậy -111 / 550 sẽ được thương là **-1** $\implies$ (-111) - (550 . (-1)) = 439 > 0, và đó cũng là kết quả cuối cùng
