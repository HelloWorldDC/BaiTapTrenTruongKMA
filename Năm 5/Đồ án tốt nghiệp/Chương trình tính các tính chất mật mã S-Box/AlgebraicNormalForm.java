import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class AlgebraicNormalForm {
	static String hexa[] = { "0000", "0001", "0010", "0011", "0100", "0101", "0110", "0111", "1000", "1001", "1010",
			"1011", "1100", "1101", "1110", "1111" };

	public static String checkhexa(String temp) {
		String result = "";
		for (int i = 0; i < temp.length(); i++) {
			if (String.valueOf(temp.charAt(i)).equals("a")) {
				result += hexa[10];
			} else if (String.valueOf(temp.charAt(i)).equals("b")) {
				result += hexa[11];
			} else if (String.valueOf(temp.charAt(i)).equals("c")) {
				result += hexa[12];
			} else if (String.valueOf(temp.charAt(i)).equals("d")) {
				result += hexa[13];
			} else if (String.valueOf(temp.charAt(i)).equals("e")) {
				result += hexa[14];
			} else if (String.valueOf(temp.charAt(i)).equals("f")) {
				result += hexa[15];
			} else {
				result += hexa[Integer.valueOf(String.valueOf((temp.charAt(i))))];
			}
		}
		return result;
	}
	public static String checkBin(String s) {
		String result = s;
		while (result.length() < 8) {
			result = "0" + result;
		}
		return result;
	}
//	Cho Sbox 4 bit test
//	public static String checkBin(String s) {
//		String result = s;
//		while (result.length() < 4) {
//			result = "0" + result;
//		}
//		return result;
//	}
	public static void shiftRight(String[] arr) {
		String temp = arr[255];
		for (int i = 254; i >= 0; i--) {
			arr[i + 1] = arr[i];
		}
		arr[0] = temp;
	}
	public static void main(String[] args) throws IOException {
//		Khai báo để in giống biểu thức trong toán học
		String SubScript[]= {"\u2080","\u2081","\u2082","\u2083","\u2084","\u2085","\u2086","\u2087","\u2088"};
		int getMobiusMatrix[][]=MobiusMatrix.getMobiusMatrix(8);
		String Element[]=new String[256];
//		String Element[]=new String[16];//		Cho Sbox 4 bit test
		for (int i = 0; i < Element.length; i++) {
			Element[i]=checkBin(Integer.toBinaryString(i));
		}
		String monomial[]=new String[256];
//		String monomial[]=new String[16];//		Cho Sbox 4 bit test
		monomial[0]="1";
		for (int i = 1; i < Element.length; i++) {
			String temp="";
			for (int j = 7; j >= 0; j--) {
				if(String.valueOf(Element[i].charAt(j)).equals("1")) {
//					temp+="x"+String.valueOf(7-j);
					temp+="x"+SubScript[7-j];
				}
			}
			monomial[i]=temp;
		}
//		Cho Sbox 4 bit test
//		for (int i = 1; i < Element.length; i++) {
//			String temp="";
//			for (int j = 3; j >= 0; j--) {
//				if(String.valueOf(Element[i].charAt(j)).equals("1")) {
////					temp+="x"+String.valueOf(7-j);
//					temp+="x"+SubScript[3-j];
//				}
//			}
//			monomial[i]=temp;
//		}
		File file=new File("C:\\Users\\Admin\\eclipse-workspace\\CryptographyProperties\\src\\Result_Algebraic_Degree.txt");
		FileWriter fw=new FileWriter(file);
		BufferedWriter bw=new BufferedWriter(fw);
		String SBox[] = {"bb", "16","63", "7c", "77", "7b", "f2", "6b", "6f", "c5", "30", "01", "67", "2b", "fe", "d7", "ab",
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
				"54"   };
//		String SBox[]= {"c","5","6","b","9","0","a","d","3","e","f","8","4","7","1","2"}; //Cho Sbox 4 bit test
//		for (int m = 1; m < 256; m++) {
//		shiftRight(SBox);
		
		int SBoxMatrix[][]=new int[8][256];
		for (int i = 0; i < SBox.length; i++) {
			String getElementBin=checkhexa(SBox[i]);
			for (int j = 0; j < 8; j++) {
				SBoxMatrix[7-j][i]=Integer.valueOf(String.valueOf(getElementBin.charAt(j)));
			}
		}
//		Cho Sbox 4 bit test
//		int SBoxMatrix[][]=new int[4][16];
//		for (int i = 0; i < SBox.length; i++) {
//			String getElementBin=checkhexa(SBox[i]);
//			for (int j = 0; j < 4; j++) {
//				SBoxMatrix[3-j][i]=Integer.valueOf(String.valueOf(getElementBin.charAt(j)));
//			}
//		}
		int tichMatrix[][]=new int[8][256];
		for (int i = 0; i < 8; i++) { // Số hàng
			for (int j = 0; j < 256; j++) { // Lặp lại 256 đối với AES SBox
				int sum=0;
				for (int j2 = 0; j2 < 256; j2++) {
//					Nhân 2 ma trận nên Cột của ma trận SBox và Hàng của Ma trận Mobius thay đổi theo j2 256 lần
					sum+=(SBoxMatrix[i][j2]*getMobiusMatrix[j2][j]);
				}
				tichMatrix[i][j]=sum%2;
			}
		}
//		In bậc đại số
		int algebraic_degree=0;
		for (int i = 0; i < 8; i++) {
			for (int j = 0; j < 256; j++) {
				if(tichMatrix[i][j]==1) {
					String getmononial=monomial[j];
					if(getmononial.length()>1) {
						if(((getmononial.length())/2)>algebraic_degree) {
							algebraic_degree=(getmononial.length())/2;
						}
					}
					else {
						if((getmononial.length())>algebraic_degree) {
							algebraic_degree=getmononial.length();
						}
					}
				}
			}
		}
		System.out.println(algebraic_degree);
		bw.write(algebraic_degree+"\n");
//		}
		bw.close();
//		Cho Sbox 4 bit test
//		int tichMatrix[][]=new int[4][16];
//		for (int i = 0; i < 4; i++) { // Số hàng
//			for (int j = 0; j < 16; j++) { // Lặp lại 256 đối với AES SBox
//				int sum=0;
//				for (int j2 = 0; j2 < 16; j2++) {
////					Nhân 2 ma trận nên Cột của ma trận SBox và Hàng của Ma trận Mobius thay đổi theo j2 256 lần
//					sum+=(SBoxMatrix[i][j2]*getMobiusMatrix[j2][j]);
//				}
//				tichMatrix[i][j]=sum%2;
//			}
//		}
//		In ra ma trận cuối cùng
//		for (int i = 0; i < tichMatrix.length; i++) {
//			for (int j = 0; j < 256; j++) {
//				System.out.print(tichMatrix[i][j]+" ");
//			}
//			System.out.println("\n");
//		}
//		System.out.println("Dạng chuẩn đại số của S-Box là:");
//		for (int i = 0; i < 8; i++) {
//			System.out.print("y"+SubScript[i+1]+"=");
//			String temp="";
//			for (int j = 0; j < 256; j++) {
//				if(tichMatrix[i][j]==1) {
//					temp+=monomial[j]+"\u2A01";
//				}
//			}
//			temp=temp.substring(0, temp.length()-1);
//			System.out.println(temp);
//			System.out.println("\n");
//		}
//		Cho Sbox 4 bit test
//		System.out.println("Dạng chuẩn đại số của S-Box là:");
//		for (int i = 0; i < 4; i++) {
//			System.out.print("y"+SubScript[i+1]+"=");
//			String temp="";
//			for (int j = 0; j < 16; j++) {
//				if(tichMatrix[i][j]==1) {
//					temp+=monomial[j]+"\u2A01";
//				}
//			}
//			temp=temp.substring(0, temp.length()-1);
//			System.out.println(temp);
//			System.out.println("\n");
//		}
	}
}
