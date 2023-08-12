
public class StrictAvalancheCriterion {
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

	public static void shiftRight(String[] arr) {
		String temp = arr[255];
		for (int i = 254; i >= 0; i--) {
			arr[i + 1] = arr[i];
		}
		arr[0] = temp;
	}

	public static void main(String[] args) {
//		Bảng S-Box tiêu chuẩn của AES
		String SBox[] = { "63", "7c", "77", "7b", "f2", "6b", "6f", "c5", "30", "01", "67", "2b", "fe", "d7", "ab",
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
//		String SBox[]= {"41","99","2d","0f","b0","54","bb","16","63","7c","77","7b","f2","6b","6f","c5",
//				"30","01","67","2b","fe","d7","ab","76","ca","82","c9","7d","fa","59","47","f0",
//				"ad","d4","a2","af","9c","a4","72","c0","b7","fd","93","26","36","3f","f7","cc",
//				"34","a5","e5","f1","71","d8","31","15","04","c7","23","c3","18","96","05","9a",
//				"07","12","80","e2","eb","27","b2","75","09","83","2c","1a","1b","6e","5a","a0",
//				"52","3b","d6","b3","29","e3","2f","84","53","d1","00","ed","20","fc","b1","5b",
//				"6a","cb","be","39","4a","4c","58","cf","d0","ef","aa","fb","43","4d","33","85",
//				"45","f9","02","7f","50","3c","9f","a8","51","a3","40","8f","92","9d","38","f5",
//				"bc","b6","da","21","10","ff","f3","d2","cd","0c","13","ec","5f","97","44","17",
//				"c4","a7","7e","3d","64","5d","19","73","60","81","4f","dc","22","2a","90","88",
//				"46","ee","b8","14","de","5e","0b","db","e0","32","3a","0a","49","06","24","5c",
//				"c2","d3","ac","62","91","95","e4","79","e7","c8","37","6d","8d","d5","4e","a9",
//				"6c","56","f4","ea","65","7a","ae","08","ba","78","25","2e","1c","a6","b4","c6",
//				"e8","dd","74","1f","4b","bd","8b","8a","70","3e","b5","66","48","03","f6","0e",
//				"61","35","57","b9","86","c1","1d","9e","e1","f8","98","11","69","d9","8e","94",
//				"9b","1e","87","e9","ce","55","28","df","8c","a1","89","0d","bf","e6","42","68"};
		String alpha[] = { "00000001", "00000010", "00000100", "00001000", "00010000", "00100000", "01000000",
				"10000000" };
//		for (int m = 1; m < 256; m++) { // Chạy 255 lần tương ứng với dịch 1 đến 255 sang phải để kiểm tra tiêu chí SAC cho từng S-Box, xóa dòng này nếu chỉ cần kiểm tra 1 S-Box
		
//		shiftRight(SBox); // Dịch sang phải 1 vị trí, xóa dòng này nếu chỉ kiểm tra 1 S-Box

//		Thuật toán kiểm tra tiêu chí SAC

		float average_value = 0;
		float min_value=1;
		float max_value=0;
		for (int l = 0; l < alpha.length; l++) {

			float sum[] = { 0, 0, 0, 0, 0, 0, 0, 0 };
			for (int i = 0; i < 256; i++) {
				String fx = checkhexa(SBox[i]);
				String x = Integer.toBinaryString(i);
				while (x.length() < 8) {
					x = "0" + x;
				}
				String s = alpha[l];
				String result_xor = XorBinary(x, s);
				String fxs = checkhexa(SBox[Integer.parseInt(result_xor, 2)]);
				String result_final_binary = XorBinary(fx, fxs);
				for (int j = 0; j < sum.length; j++) {
					sum[j] += Integer.valueOf(String.valueOf(result_final_binary.charAt(j)));
				}
			}
			for (int k = 0; k < sum.length; k++) {
				sum[k]=sum[k]/256;
//				Tìm giá trị min
				if(sum[k]<=min_value) {
					min_value=sum[k];
				}
//				Tìm giá trị max
				if(sum[k]>=max_value) {
					max_value=sum[k];
				}
				System.out.print(sum[k] + " "); // In ra tiêu chí SAC của S-Box
				average_value += sum[k];
			}
			System.out.println("\n");
		}
		System.out.println("Giá trị min: "+min_value);
		System.out.println("Giá trị max: "+max_value);
		System.out.println("Giá trị trung bình: " + average_value / 64);

//		Kết thúc thuật toán kiểm tra tiêu chí SAC

//		}// Xóa dòng này nếu chỉ kiểm tra 1 S-Box
	}
}
