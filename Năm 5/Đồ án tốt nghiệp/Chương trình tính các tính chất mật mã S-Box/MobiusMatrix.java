import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class MobiusMatrix {
	static int M_n[][] = { { 1, 1 }, { 0, 1 } };
//	Hàm này dùng để được gọi từ file khác
	public static int[][] getMobiusMatrix(int power) {
		for (int l = 2; l < power+1; l++) {
			int M_m[][] = new int[(int) Math.pow(2, l)][(int) Math.pow(2, l)];
			for (int k = 0; k <= (M_m.length / 2); k = k + (M_m.length / 2)) {
				for (int i = 0; i < M_n.length; i++) {
					for (int j = 0; j < M_n.length; j++) {
						if (k == 0) {
							M_m[i + k][j + k] = M_n[i][j];
						} else {
							M_m[i][j + k] = M_n[i][j];
						}
					}
				}
			}
			int temp = (M_m.length) / 2;
			for (int i = 0; i < M_n.length; i++) {
				for (int j = 0; j < M_n.length; j++) {
					M_m[temp + i][temp + j] = M_n[i][j];
				}
			}
			M_n=M_m;
//			System.out.println("Ma tran Mobius M_{2^"+l+"}:"+"\n");
			for (int i = 0; i < M_m.length; i++) {
				for (int j = 0; j < M_m.length; j++) {
//					System.out.print(M_m[i][j] + " ");
				}
//				System.out.println("\n");
			}
		}
		return M_n;
	}
	public static void main(String[] args) throws IOException {
		File file=new File("C:\\Users\\Admin\\eclipse-workspace\\CryptographyProperties\\src\\Result_MobiusMatrix.txt");
		FileWriter fw=new FileWriter(file);
		BufferedWriter bw=new BufferedWriter(fw);
//		int M_n[][] = { { 1, 1 }, { 0, 1 } };
		for (int l = 2; l < 9; l++) {
			int M_m[][] = new int[(int) Math.pow(2, l)][(int) Math.pow(2, l)];
			for (int k = 0; k <= (M_m.length / 2); k = k + (M_m.length / 2)) {
				for (int i = 0; i < M_n.length; i++) {
					for (int j = 0; j < M_n.length; j++) {
						if (k == 0) {
							M_m[i + k][j + k] = M_n[i][j];
						} else {
							M_m[i][j + k] = M_n[i][j];
						}
					}
				}
			}
			int temp = (M_m.length) / 2;
			for (int i = 0; i < M_n.length; i++) {
				for (int j = 0; j < M_n.length; j++) {
					M_m[temp + i][temp + j] = M_n[i][j];
				}
			}
			M_n=M_m;
			bw.write("Ma tran Mobius M_{2^"+l+"}:"+"\n");
//			System.out.println("Ma tran Mobius M_{2^"+l+"}:"+"\n");
			for (int i = 0; i < M_m.length; i++) {
				for (int j = 0; j < M_m.length; j++) {
//					System.out.print(M_m[i][j] + " ");
					bw.write(M_m[i][j] + " ");
				}
//				System.out.println("\n");
				bw.write("\n");
			}
		}
		bw.close();
	}
}
