# Đầu vào, đầu ra
>**Input**: a(x), g(x)

>**Output**: $a^{-1}$(x) thỏa mãn $a^{-1}$(x).a(x) mod g(x) = 1

# Ví dụ bài toán
>**Input**: a(x) = $x^6 + x^4 + x + 1$; g(x) = $x^8 + x^4 + x^3 + x +1$

>**Output**: $a^{-1}$(x) = $x^7 + x^6 + x^3 + x$
# Thuật toán

**function** inverse(a,p)\
&nbsp;&nbsp;&nbsp;&nbsp;t[-1] := 0; t[0] := 1;\
&nbsp;&nbsp;&nbsp;&nbsp;r[-1] := p; r[0] := a; i=0;\
&nbsp;&nbsp;&nbsp;&nbsp;**while** r[i] $\neq$ 0\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;quotient := r[i-1] **div** r[i]\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;r[i+1] := r[i-1] - quotient * r[i]\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;t[i+1] := t[i-1] - quotient * t[i]\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i = i+1;\
&nbsp;&nbsp;&nbsp;&nbsp;**if** degree(r) > 0 then\
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**return** "Either p is not irreducible or a is a multiple of p"\
&nbsp;&nbsp;&nbsp;&nbsp;**return** t

# Bảng diễn giải thuật toán
| step | quotient | r, newr | t, newt |
| ---- | -------- | ------- | ------- |
|      |          | p = $x^8 + x^4 + x^3 + x +1$ | 0 |
|      |          | a = $x^6 + x^4 + x + 1$ | 1 |
| 1 | $x^2 + 1$ | $x^2 = p - a(x^2 + 1)$ | $x^2 + 1 = 0 - 1(x^2 + 1)$ |
| 2 | $x^4 + x^2$ | $x + 1 = a - x^2(x^4 + x^2)$ | $x^6 + x^2 + 1 = 1 - (x^4 + x^2)(x^2 + 1)$ |
| 3 | x + 1 | $1 = x^2 - (x + 1)(x + 1)$ | $x^7 + x^6 + x^3 + x = (x^2 + 1) - (x + 1)(x^6 + x^2 + 1)$ |
| 4 | x + 1 | $0 = (x + 1) - 1(x + 1)$ | |

# Kết luận
Từ đó ta có nghịch đảo của a = $x^6 + x^4 + x + 1$ là $a^{-1} = x^7 + x^6 + x^3 +x$
