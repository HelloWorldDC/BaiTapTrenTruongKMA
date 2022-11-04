# Kiến thức liên quan

### Định nghĩa thặng dư bậc hai và bất thặng dư bậc hai:
- Cho a $\in$ ${Z_n}^*$ , a được gọi là thặng dư bậc hai theo modulo n (hay bình phương modulo n) nếu $\exists$ $x$ $\in$ ${Z_n}^\*$: $\boldsymbol{x^2 \equiv a \bmod n}$. Nếu không tồn tại x như vậy thì a được gọi là bất thặng dư bậc hai $\bmod$ n.
- Tập tất cả các thặng dư bậc hai modulo n được KH: $Q_n$.
- Tập tất cả các bất thặng dư bậc hai modulo n được KH: $\bar{Q_n}$.

# Ký hiệu Legendre và Jacobi
### Định nghĩa KH Legendre
- p là số nguyên tố lẻ, a là số nguyên, KH Legendre $\left(\frac{a}{p}\right)$ được xác định như sau:

$$
\left(\frac{a}{p}\right) =
  \begin{cases}
    0       & \quad p\mid a \text{ (p là ước số của a)}\\
    1  & \quad a \in Q_p\\
    -1 & \quad a \in \bar{Q_n}
  \end{cases}
$$

### Định nghĩa KH Jacobi
- Cho n $\geq$ 3 là các số nguyên lẻ có phân tích:

$$
n = {p_1}^{e_1}.{p_2}^{e_2}...{p_k}^{e_k}
$$

Khi đó KH Jacobi $\left(\frac{a}{n}\right)$ được định nghĩa là:

$$
\left(\frac{a}{n}\right) = {\left(\frac{a}{p_1}\right)}^{e_1} . {\left(\frac{a}{p_2}\right)}^{e_2} ... {\left(\frac{a}{p_k}\right)}^{e_k} 
$$

Ta thấy rằng nếu n là số nguyên tố thì KH Jacobi chính là kí hiệu Legendre

### Tính chất Jacobi

**Tính chất 1**

Nếu n là số nguyên lẻ và $m_1 \equiv m_2 \bmod n$ thì : 

$$
\left(\frac{m_1}{n}\right) \equiv \left(\frac{m_2}{n}\right)
$$

**Tính chất 2** [^1]

Nếu n là số nguyên lẻ thì:

$$
\left(\frac{2}{n}\right) =
  \begin{cases}
    1       & \quad \text{nếu n} \equiv \pm 1 \bmod 8\\
    -1  & \quad \text{nếu n} \equiv \pm 3 \bmod 8
  \end{cases}
$$

**Tính chất 3**
- Nếu n là số nguyên lẻ thì: [^1]

$$
\left(\frac{m_1 . m_2}{n}\right) \equiv \left(\frac{m_1}{n}\right) \left(\frac{m_2}{n}\right)
$$

- Đặc biệt nếu m = $2^k$ . t (t là số lẻ) thì:

$$
\left(\frac{m}{n}\right) \equiv \left(\frac{2}{n}\right)^k \left(\frac{t}{n}\right)
$$

**Tính chất 4**

Giả sử m và n là số nguyên lẻ thì:

$$
\left(\frac{m}{n}\right) =
  \begin{cases}
    - \left(\frac{n}{m}\right)       & \quad \text{nếu m, n} \equiv \pm 3 \bmod 4\\
    \left(\frac{n}{m}\right)
  \end{cases}
$$

**Công thức thay thế tính chất 2 được sử dụng trong Code**

$$
\left(\frac{2}{m}\right) = (-1)^{\left(\frac{m^2 - 1}{8}\right)} &emsp;(*)
$$

**Ví dụ**

Tính kí hiệu Jacobi:
- a) $\left(\frac{7411}{9283}\right)$
- b) $\left(\frac{6278}{9975}\right)$

Giải tay:

- a) $\left(\frac{7411}{9283}\right)$ $\mathop = \limits^{(4)}$ $-\left(\frac{9283}{7411}\right)$ $\mathop = \limits^{(1)}$ $-\left(\frac{1872}{7411}\right)$ $\mathop = \limits^{(3)}$ $-\left(\frac{2}{7411}\right)$ . $\left(\frac{117}{7411}\right)$ $\mathop = \limits^{(2)}$ $-(1)^4$ . $\left(\frac{117}{7411}\right)$ $\mathop = \limits^{(4)}$ $-\left(\frac{7411}{117}\right)$ $\mathop = \limits^{(1)}$ $-\left(\frac{40}{117}\right)$ $\mathop = \limits^{(3)}$ $-\left(\frac{2}{117}\right)^3$ . $\left(\frac{5}{117}\right)$ = $-(-1)^3$ . $\left(\frac{5}{117}\right)$ = $\left(\frac{117}{5}\right)$ = $\left(\frac{2}{5}\right)$ = -1

- b) $\left(\frac{6278}{9975}\right)$ = $\left(\frac{6278}{3}\right)$ . $\left(\frac{6278}{2}\right)^2$ . $\left(\frac{6278}{7}\right)$ . $\left(\frac{6278}{19}\right)$ = $\left(\frac{2}{3}\right)$ . $\left(\frac{3}{5}\right)^2$ . $\left(\frac{6}{7}\right)$ . $\left(\frac{8}{19}\right)$ = -(1) . $\left(\frac{5}{3}\right)^2$ . $\left(\frac{2}{7}\right)$ . $\left(\frac{3}{7}\right)$ . $\left(\frac{2}{19}\right)^3$ = -(-1)

Giải tay theo công thức thay thế tính chất 2:

- a) $\left(\frac{7411}{9283}\right)$ 
$\mathop = \limits^{(4)}$ 
$-\left(\frac{9283}{7411}\right)$ 
$\mathop = \limits^{(1)}$ 
$-\left(\frac{1872}{7411}\right)$ 
$\mathop = \limits^{(3)}$ 
$-\left(\frac{936}{7411}\right)$ . $\left(\frac{2}{7411}\right)$ 
$\mathop = \limits^{(*)}$ 
$-\left(\frac{936}{7411}\right)$ . $(-1)$ 
= $\left(\frac{936}{7411}\right)$ 
$\mathop = \limits^{(3)}$ 
$\left(\frac{468}{7411}\right)$ . $\left(\frac{2}{7411}\right)$ 
$\mathop = \limits^\*$ 
$\left(\frac{468}{7411}\right)$ . $(-1)$ 
= $-\left(\frac{468}{7411}\right)$ 
$\mathop = \limits^{(3)}$ 
$-\left(\frac{234}{7411}\right)$ . $\left(\frac{2}{7411}\right)$ 
$\mathop = \limits^\*$ 
$-\left(\frac{234}{7411}\right)$ . $(-1)$ 
$\mathop = \limits^\*$ 
$\left(\frac{234}{7411}\right)$ 
$\mathop = \limits^{(3)}$ 
$\left(\frac{117}{7411}\right)$ . $\left(\frac{2}{7411}\right)$ 
$\mathop = \limits^\*$ 
$\left(\frac{117}{7411}\right)$ . $(-1)$ 
$\mathop = \limits^\*$ 
$-\left(\frac{117}{7411}\right)$ 
$\mathop = \limits^{(4)}$ 
$-\left(\frac{7411}{117}\right)$ 
$\mathop = \limits^{(1)}$ 
$-\left(\frac{40}{117}\right)$ 
$\mathop = \limits^{(3)}$ 
$-\left(\frac{20}{117}\right)$ . $\left(\frac{2}{117}\right)$ 
$\mathop = \limits^\*$ 
$-\left(\frac{20}{117}\right)$ . $(-1)$ 
= $\left(\frac{20}{117}\right)$ 
$\mathop = \limits^{(3)}$ 
$\left(\frac{10}{117}\right)$ . $\left(\frac{2}{117}\right)$ 
$\mathop = \limits^\*$ 
$\left(\frac{10}{117}\right)$. $(-1)$ 
= $-\left(\frac{10}{117}\right)$ 
$\mathop = \limits^{(3)}$ 
$-\left(\frac{5}{117}\right)$ . $\left(\frac{2}{117}\right)$ 
$\mathop = \limits^\*$ 
$-\left(\frac{5}{117}\right)$ . $(-1)$ 
= $\left(\frac{5}{117}\right)$ 
$\mathop = \limits^{(4}$ 
$\left(\frac{117}{5}\right)$ 
$\mathop = \limits^{(1}$ 
$\left(\frac{2}{5}\right)$ 
$\mathop = \limits^\*$ 
= $-1$

- b) $\left(\frac{6278}{9975}\right)$ 
$\mathop = \limits^{(3)}$ 
$\left(\frac{3139}{9975}\right)$ . $\left(\frac{2}{9975}\right)$ 
$\mathop = \limits^{(*)}$ 
$-\left(\frac{3139}{9975}\right)$ . $(1)$ 
= $\left(\frac{3139}{9975}\right)$
$\mathop = \limits^{(4)}$ 
$-\left(\frac{9975}{3139}\right)$ 
$\mathop = \limits^{(1)}$ 
$-\left(\frac{558}{3139}\right)$ 
$\mathop = \limits^{(3)}$ 
$-\left(\frac{279}{3139}\right)$ . $\left(\frac{2}{3139}\right)$ 
$\mathop = \limits^\*$ 
$-\left(\frac{279}{3139}\right)$ . $(-1)$ 
= $\left(\frac{279}{3139}\right)$
$\mathop = \limits^{(4)}$ 
$-\left(\frac{3139}{279}\right)$ 
$\mathop = \limits^{(1)}$ 
$-\left(\frac{70}{279}\right)$
$\mathop = \limits^{(3)}$
$-\left(\frac{35}{279}\right)$ . $\left(\frac{2}{279}\right)$
$\mathop = \limits^\*$
$-\left(\frac{35}{279}\right)$ . $(1)$
= $-\left(\frac{35}{279}\right)$
$\mathop = \limits^{(4)}$
$\left(\frac{279}{35}\right)$
$\mathop = \limits^{(1)}$
$\left(\frac{34}{35}\right)$
$\mathop = \limits^{(3)}$
$\left(\frac{17}{35}\right)$ . $\left(\frac{2}{35}\right)$
$\mathop = \limits^\*$
$\left(\frac{17}{35}\right)$ . $(-1)$
= $-\left(\frac{17}{35}\right)$
$\mathop = \limits^{(4)}$
$-\left(\frac{35}{17}\right)$
$\mathop = \limits^{(1)}$
$-\left(\frac{1}{17}\right)$ [^2]
= $-1$

[^1]: Ở bài Code trên không sử dụng 2 tính chất này
[^2]: Quy ước $\left(\frac{1}{n}\right) = 1$ và $\left(\frac{0}{n}\right) = 0$
