import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.util.Scanner;

public class Jacobi {
//	Hàm tính toán 2/m=(-1)^((m^2-1)/8)
	public static int Calculator2onm(int m) {
		double convert=m;
		int cal=(int)Math.pow(-1,(Math.pow(convert, 2)-1)/8);
		return cal;
	}
	public static void main(String[] args) throws FileNotFoundException {
		Scanner sc = new Scanner(System.in);
		int mang_dau_am_hoac_duong[] = new int[1];
		System.out.print("Nhập số a: ");
		int a = sc.nextInt();
		System.out.print("Nhập số n: ");
		int n = sc.nextInt();

		if (n % 2 == 0) {
			System.out.println("Không tồn tại ký hiệu Jacobi");
		} else {
// 			Lặp đến khi a = 1 hoặc a = 0 tức 1/n hoặc 0/n thì dừng
			while (a != 1 && a != 0) {
				if (a % 2 != 0 && n % 2 != 0) {
					if (a % 4 == 3 && n % 4 == 3 && a < n) {
						int temp = a;
						a = n;
						n = temp;
						if (mang_dau_am_hoac_duong[0] == 1) {
							mang_dau_am_hoac_duong[0] = 0;
						} else {
							mang_dau_am_hoac_duong[0] = 1;
						}
					} else if (a >= n) {
						a = a % n;
					} else if ((a % 4 != 3 || n % 4 != 3) && a < n) {
						int temp = a;
						a = n;
						n = temp;
					}
				}
				if (a % 2 == 0) {
						a = a / 2;
						int result=Calculator2onm(n);
						if(result==-1) {
							if (mang_dau_am_hoac_duong[0] == 1) {
								mang_dau_am_hoac_duong[0] = 0;
							}else {
								mang_dau_am_hoac_duong[0] = 1;
							}
						}
				}

			}
			if (mang_dau_am_hoac_duong[0] == 1) {
				System.out.println(-a);
			} else {
				System.out.println(a);
			}
		}

	}
}
