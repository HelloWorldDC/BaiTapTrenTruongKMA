import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;

public class DifferentialUniformity {
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

	public static String checkBin(String s) {
		String result = s;
		while (result.length() < 8) {
			result = "0" + result;
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
		File file=new File("C:\\Users\\Admin\\eclipse-workspace\\CryptographyProperties\\src\\Result_DU.txt");
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
//		String SBox[] = { "a8","08","26","38","24","10","16","d1","9b","60","58","a2","61","aa","c6","82",
//				"0b","36","37","5b","b6","39","9c","9f","c9","97","7e","7c","9a","19","4f","b8",
//				"f6","8c","64","dc","40","88","76","90","14","d6","da","db","0d","0e","7b","3b",
//				"21","b2","73","7d","2b","ff","3c","f3","33","f9","22","17","e8","89","af","e4",
//				"5c","86","91","68","a3","e7","0f","cb","9d","b9","6e","2c","d4","e9","ae","84",
//				"1a","b5","fe","23","01","30","e6","1d","95","29","55","ce","6a","71","c4","96",
//				"6c","f5","5a","70","ef","2f","94","48","b0","4b","7f","77","2a","a1","69","ab",
//				"ca","a4","ad","f1","b7","dd","57","a7","51","12","87","6d","de","ee","d7","42",
//				"1f","a6","0c","92","11","15","fc","80","b1","45","28","4e","31","47","6f","ec",
//				"e2","34","c1","44","03","35","50","04","cc","0a","ea","8b","e0","1b","d9","ba",
//				"b4","3a","7a","c0","65","54","83","07","43","81","bc","1e","f8","32","b3","ed",
//				"99","3e","5d","2e","f4","e3","93","3d","a9","e1","18","a5","52","3f","66","05",
//				"c3","6b","20","d2","d8","d5","bd","25","63","56","fb","8a","4a","e5","8e","27",
//				"df","d3","4c","8f","bb","02","98","85","59","f2","be","ac","74","f7","bf","79",
//				"49","72","5f","9e","8d","4d","53","5e","cf","13","c2","eb","46","c7","fa","41",
//				"67","d0","fd","09","1c","a0","c8","2d","06","78","cd","f0","75","62","c5","00" };
//		for (int m = 1; m < 256; m++) {
//			
//		shiftRight(SBox);
		String save_to_file="";
		int checkmax=0;
		for (int k = 0; k < 256; k++) {
			for (int j = 0; j < 256; j++) {
				int count = 0;
				for (int i = 0; i < SBox.length; i++) {
//					x XOR Delta X
					String result_xXORDeltaX = XorBinary(checkBin(Integer.toBinaryString(i)), checkBin(Integer.toBinaryString(k)));
					int convertToInt = Integer.parseInt(result_xXORDeltaX, 2);
//					Kết quả Sbox(x XOR Delta X), viết tắt "x XOR Delta X" là xXDX 
					String result_SBox_xXDX = checkhexa(SBox[convertToInt]);
//					Kết quả Sbox(x)
					String result_SBox_x = checkhexa(SBox[i]);
//					Kết quả cuối cùng
					String result_final = XorBinary(result_SBox_x, result_SBox_xXDX);
					if (result_final.equals(checkBin(Integer.toBinaryString(j)))) {
						count += 1;
					}
				}
				if(count>checkmax&&k!=0&&j!=0) {
					checkmax=count;
				}
//				save_to_file+=count+" ";
//				System.out.print(count + " ");
			}
//			save_to_file+="\n";
//			System.out.println("\n");
		}
		System.out.println(checkmax);
		bw.write(checkmax+"\n");
//		}
		bw.close();
//		bw.write(save_to_file); // In ra bảng Difference Distribution Table
	}
}
