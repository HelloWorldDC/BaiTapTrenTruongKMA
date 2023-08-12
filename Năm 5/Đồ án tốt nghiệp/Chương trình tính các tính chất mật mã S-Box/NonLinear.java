import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class NonLinearV2 {
	public static String checkBin(String s) {
		String result = s;
		while (result.length() < 8) {
			result = "0" + result;
		}
		return result;
	}
	public static int inner_product(int i, int i1) {
		String getBinvalue_i=checkBin(Integer.toBinaryString(i));
		String getBinvalue_i1=checkBin(Integer.toBinaryString(i1));
		int sum=0;
		for (int j = 0; j < 8; j++) {
			sum+=Integer.valueOf(String.valueOf(getBinvalue_i.charAt(j)))*Integer.valueOf(String.valueOf(getBinvalue_i1.charAt(j)));
		}
		return sum%2;
		
	}
	public static String XorBinary(String x, String s) {
		String result = "";
		if (x.length() != s.length()) {
			result = "Chieu dai 2 chuoi khong bang nhau";
		} else {
			for (int i = 0; i < x.length(); i++) {
				if (String.valueOf(x.charAt(i)).equals(String.valueOf(s.charAt(i)))) {
					result += 0;
				} else
					result += 1;
			}
		}
		return result;
	}
	public static void shiftRight(String[] arr) {
		String temp = arr[255];
		for (int i = 254; i >= 0; i--) {
			arr[i + 1] = arr[i];
		}
		arr[0] = temp;
	}
	public static void main(String[] args) throws IOException {
		File file=new File("C:\\Users\\Admin\\eclipse-workspace\\CryptographyProperties\\src\\Result_Nonlinear.txt");
		FileWriter fw=new FileWriter(file);
		BufferedWriter bw=new BufferedWriter(fw);
		String SBox[] = {"63", "7c", "77", "7b", "f2", "6b", "6f", "c5", "30", "01", "67", "2b", "fe", "d7", "ab",
				"76", "ca", "82", "c9", "7d", "fa", "59", "47", "f0", "ad", "d4", "a2", "af", "9c", "a4", "72", "c0",
				"b7", "fd", "93", "26", "36", "3f", "f7", "cc", "34", "a5", "e5", "f1", "71", "d8", "31", "15", "04",
				"c7", "23", "c3", "18", "96", "05", "9a", "07", "12", "80", "e2", "eb", "27", "b2", "75", "09", "83",
				"2c", "1a", "1b", "6e", "5a", "a0", "52", "3b", "d6", "b3", "29", "e3", "2f", "84", "53", "d1", "00",
				"ed", "20", "fc", "b1", "5b", "6a", "cb", "be", "39", "4a", "4c", "58", "cf", "d0", "ef", "aa", "fb",
				"43", "4d", "33", "85", "45", "f9", "02", "7f", "50", "3c", "9f", "a8", "51", "a3", "40", "8f", "92",
				"9d", "38", "f5", "bc", "b6", "da", "21", "10", "ff", "f3", "d2", "cd", "0c", "13", "ec", "5f", "97",
				"44", "17", "c4", "a7", "7e", "3d", "64", "5d", "19", "73", "60", "81", "4f", "dc", "22", "2a", "90",
				"88", "46", "ee", "b8", "14", "de", "5e", "0b", "db", "e0", "32", "3a", "0a", "49", "06", "24", "5c",
				"c2", "d3", "ac", "62", "91", "95", "e4", "79", "e7", "c8", "37", "6d", "8d", "d5", "4e", "a9", "6c",
				"56", "f4", "ea", "65", "7a", "ae", "08", "ba", "78", "25", "2e", "1c", "a6", "b4", "c6", "e8", "dd",
				"74", "1f", "4b", "bd", "8b", "8a", "70", "3e", "b5", "66", "48", "03", "f6", "0e", "61", "35", "57",
				"b9", "86", "c1", "1d", "9e", "e1", "f8", "98", "11", "69", "d9", "8e", "94", "9b", "1e", "87", "e9",
				"ce", "55", "28", "df", "8c", "a1", "89", "0d", "bf", "e6", "42", "68", "41", "99", "2d", "0f", "b0",
				"54", "bb", "16" };
//		for (int m = 1; m < 256; m++) {
//		shiftRight(SBox);
//		Tính toán Walsh-Hadamard Transform
		int WalshHadamard[][]=new int[256][256];
		for (int i = 0; i < SBox.length; i++) {
			for (int j = 0; j < SBox.length; j++) {
				int sum=0;
				for (int j2 = 0; j2 < SBox.length; j2++) {
//					Tính beta * S(x)
					int result_left_side=inner_product(j,Integer.parseInt(SBox[j2],16));
//					Tính alpha * x
					int result_right_side=inner_product(i,j2);
//					Tính (beta * S(x)) XOR (alpha * x)
					int result_XOR=Integer.parseInt(XorBinary(checkBin(Integer.toBinaryString(result_left_side)),checkBin(Integer.toBinaryString(result_right_side))),2);
//					Tính mũ (-1)^(beta * S(x)) XOR (alpha * x)
					double element_power=Math.pow((-1), result_XOR);
//					double element_power=Math.pow((-1), result_LamdaXfx);
					int converttoInt=(int)element_power;
//					Tính tổng
					sum+=converttoInt;
				}
				WalshHadamard[i][j]=sum;
			}
		}
		
//		Kết thúc tính toán Walsh-Hadamard Transform
//		Tính Non-linear
		int max=0;
		for (int i = 0; i < WalshHadamard.length; i++) {
			for (int j = 1; j < WalshHadamard.length; j++) {
				int convertAbs=Math.abs(WalshHadamard[i][j]);
				if(convertAbs>max&&i!=0&&j!=0) {
					max=convertAbs;
				}
			}
		}
//		Kết thúc tính Non-linear
		int nonlinear=128-(max/2);
		bw.write(nonlinear+"\n");
//		System.out.println(m+":"+nonlinear);
		System.out.println(nonlinear);
//		}
		bw.close();
	}
}
