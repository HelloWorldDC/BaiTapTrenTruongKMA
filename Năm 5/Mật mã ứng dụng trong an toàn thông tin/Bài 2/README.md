# Giải thích thuật toán mở rộng khóa AES (Key Expansion)
### Ví dụ
***Input***: 
- Khóa K = 36 8a c0 f4 ed cf 76 a6 08 a3 b6 78 31 31 27 6e
- Nk = 4
- Bốn từ đầu tiên: w[0] = 368ac0f4, w[1]=edcf76a6, w[2]=08a3b678, w[3]=3131276e (Được lấy từ Khóa K, mỗi từ 4 byte)

***Output***:
- Tính w[i] (4 $\leq$ i $\leq$ 43)

### Bảng diễn giải thuật toán
| i | temp | After RotWord | After SubWord | Rcon[i/Nk] | After XOR with Rcon | w[i] = temp $\oplus$ w[i - Nk] |
| --- | --- | :---: | :---: | :---: | :---: | :---: |
| 4 | 3131276e | 31276e31 | c7cc9fc7 | 01000000 | c6cc9fc7 | f0465f33 |
| 5 | f0465f33 |  |  |  |  | 1d892995 |
| 6 | 1d892995 |  |  |  |  | 152a9fed |
| 7 | 152a9fed |  |  |  |  | 241bb883 |
| 8 | 241bb883 | 1bb88324 | af6cec36 | 02000000 | ad6cec36 | 5d2ab305 |

### Giải thích các phép toán
- **Phép toán RotWord**: Là phép dịch byte sang trái 1 lần, ở i thứ 4 ta có temp = 31***31***276e, sau khi thực hiện phép toán RotWord ta có kết quả là  ***31***276e31
- **Phép toán SubWord**: Là phép tham chiếu đến bảng S-Box, ví dụ ở i thứ 4 sau khi thực hiện phép RotWord ta tham chiếu byte đầu tiên là `31` ta sẽ tìm đến ***hàng 3*** ***cột 1*** của bảng S-Box sẽ có kết quả là `c7`
- **Rcon**: Là 1 bảng ta có thể tham chiếu đến mà không cần phải tính toán lại

### Bảng Rcon
[link](#Bảng-Rcon)
