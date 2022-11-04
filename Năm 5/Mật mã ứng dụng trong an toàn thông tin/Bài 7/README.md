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
