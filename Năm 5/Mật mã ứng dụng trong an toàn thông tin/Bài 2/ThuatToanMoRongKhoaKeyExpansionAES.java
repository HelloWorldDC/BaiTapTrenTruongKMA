import java.math.BigInteger;
import java.util.Scanner;

public class ThuatToanMoRongKhoaKeyExpansionAES {
	public static String Result_Wi(String AfterXORwithRconWord, String wi) {
		BigInteger biAfterXORwithRconWord = new BigInteger(AfterXORwithRconWord, 16);
		BigInteger biwi = new BigInteger(wi, 16);
		BigInteger resultXor = biAfterXORwithRconWord.xor(biwi);
		String resultFinal = resultXor.toString(16);
		if(resultFinal.length()<8) {
			resultFinal="0"+resultFinal;
		}
		return resultFinal;
	}
	public static String AfterXORwithRcon(String AfterSubWord, String Rcon) {
		BigInteger biAfterSubWord = new BigInteger(AfterSubWord, 16);
		BigInteger biRcon = new BigInteger(Rcon, 16);
		BigInteger resultXor = biAfterSubWord.xor(biRcon);
		String resultFinal = resultXor.toString(16);
		return resultFinal;
	}
	public static String AfterSubWord(String AfterRotWord,String SBox_thamchieu[][]) {
		String getAfterRotWord=AfterRotWord;
		String getSBox[][]=SBox_thamchieu;
		String result="";
		for (int i = 0; i < getAfterRotWord.length(); i=i+2) {
			String tham_chieu_Hang_SBox=String.valueOf(getAfterRotWord.charAt(i));
			String tham_chieu_Cot_SBox=String.valueOf(getAfterRotWord.charAt(i+1));
//			Phân tích tham chiếu hàng
			switch (tham_chieu_Hang_SBox) {
			case "a":
				tham_chieu_Hang_SBox="10";
				break;
			case "b":
				tham_chieu_Hang_SBox="11";
				break;
			case "c":
				tham_chieu_Hang_SBox="12";
				break;
			case "d":
				tham_chieu_Hang_SBox="13";
				break;
			case "e":
				tham_chieu_Hang_SBox="14";
				break;
			case "f":
				tham_chieu_Hang_SBox="15";
				break;
			}
//			Phân tích tham chiếu cột
			switch (tham_chieu_Cot_SBox) {
			case "a":
				tham_chieu_Cot_SBox="10";
				break;
			case "b":
				tham_chieu_Cot_SBox="11";
				break;
			case "c":
				tham_chieu_Cot_SBox="12";
				break;
			case "d":
				tham_chieu_Cot_SBox="13";
				break;
			case "e":
				tham_chieu_Cot_SBox="14";
				break;
			case "f":
				tham_chieu_Cot_SBox="15";
				break;
			}
//			Gán giá trị tham chiếu được
			result+=getSBox[Integer.valueOf(tham_chieu_Hang_SBox)][Integer.valueOf(tham_chieu_Cot_SBox)];
			
			
		}
		return result;
	}
	public static String AfterRotWord(String temp) {
		String getTemp=temp;
		String tachPhanDau=String.valueOf(getTemp.charAt(0))+String.valueOf(getTemp.charAt(1));
		String tachPhanSau="";
		for (int i = 2; i < getTemp.length(); i++) {
			tachPhanSau+=getTemp.charAt(i);
		}
		String result=tachPhanSau+tachPhanDau;
		return result;
	}
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		String RC[]= {"","01000000","02000000","04000000","08000000","10000000","20000000","40000000","80000000","1b000000","36000000"};
		String SBox_temp[]= {"63","7c","77","7b","f2","6b","6f","c5","30","01","67","2b","fe","d7","ab","76",
						"ca","82","c9","7d","fa","59","47","f0","ad","d4","a2","af","9c","a4","72","c0",
						"b7","fd","93","26","36","3f","f7","cc","34","a5","e5","f1","71","d8","31","15",
						"04","c7","23","c3","18","96","05","9a","07","12","80","e2","eb","27","b2","75",
						"09","83","2c","1a","1b","6e","5a","a0","52","3b","d6","b3","29","e3","2f","84",
						"53","d1","00","ed","20","fc","b1","5b","6a","cb","be","39","4a","4c","58","cf",
						"d0","ef","aa","fb","43","4d","33","85","45","f9","02","7f","50","3c","9f","a8",
						"51","a3","40","8f","92","9d","38","f5","bc","b6","da","21","10","ff","f3","d2",
						"cd","0c","13","ec","5f","97","44","17","c4","a7","7e","3d","64","5d","19","73",
						"60","81","4f","dc","22","2a","90","88","46","ee","b8","14","de","5e","0b","db",
						"e0","32","3a","0a","49","06","24","5c","c2","d3","ac","62","91","95","e4","79",
						"e7","c8","37","6d","8d","d5","4e","a9","6c","56","f4","ea","65","7a","ae","08",
						"ba","78","25","2e","1c","a6","b4","c6","e8","dd","74","1f","4b","bd","8b","8a",
						"70","3e","b5","66","48","03","f6","0e","61","35","57","b9","86","c1","1d","9e",
						"e1","f8","98","11","69","d9","8e","94","9b","1e","87","e9","ce","55","28","df",
						"8c","a1","89","0d","bf","e6","42","68","41","99","2d","0f","b0","54","bb","16",};
		String SBox[][]=new String[16][16];
		int index=0;
		for (int i = 0; i < SBox.length; i++) {
			for (int j = 0; j < SBox.length; j++) {
				SBox[i][j]=SBox_temp[index];
				index=index+1;
			}
		}
//		Nk=4
		int Nk=4;
		String KeyK="368ac0f4edcf76a608a3b6783131276e";
		String w[]=new String[44];
		w[0]="368ac0f4";
		w[1]="edcf76a6";
		w[2]="08a3b678";
		w[3]="3131276e";
		String temp[]=new String[44];
		temp[0]="368ac0f4";
		temp[1]="edcf76a6";
		temp[2]="08a3b678";
		temp[3]="3131276e";
		String AfterRotWord[]=new String[44];
		String AfterSubWord[]=new String[44];
		String Rcon[]=new String[44];
		String AfterXORwithRcon[]=new String[44];
		for (int i = 4; i <= 43; i++) {
			if(i%4==0) {
//				gán Temp
				temp[i]=w[i-1];
//				Tính AfterRotWord
				AfterRotWord[i]=AfterRotWord(temp[i]);
//				Tính AfterSubWord
				AfterSubWord[i]=AfterSubWord(AfterRotWord[i],SBox);
//				Lưu vào mảng Rcon mục đích để hiển thị
				Rcon[i]=RC[i/Nk];
//				Tính AfterXORwithRconWord
				AfterXORwithRcon[i]=AfterXORwithRcon(AfterSubWord[i],Rcon[i]);
//				Tính w[i]
				w[i]=Result_Wi(AfterXORwithRcon[i],w[i-Nk]);
			}
			else {
//				gán Temp
				temp[i]=w[i-1];
//				Tính w[i]
				w[i]=Result_Wi(temp[i],w[i-Nk]);
			}
		}
//		Hiển thị ra màn hình 
		System.out.print("i\t"+"temp\t\t"+"AfterRotWord\t"+"AfterSubWord\t"+"Rcon[i/Nk]\t"+"AfterXORwithRcon\t"+"w[i]=temp xor w[i-Nk]\t");
		System.out.println();
		System.out.println();
		for (int i = 4; i <= 43; i++) {
			if(i%4==0) {
				System.out.println(i+"\t"+temp[i]+"\t"+AfterRotWord[i]+"\t"+AfterSubWord[i]+"\t"+Rcon[i]+"\t"+AfterXORwithRcon[i]+"\t\t"+w[i]+"\t");
				System.out.println("--------------------------------------------------------------------------------------------------------------------------");
			}
			else {
				System.out.println(i+"\t"+temp[i]+"\t\t\t\t\t\t\t\t\t\t"+w[i]+"\t");
				System.out.println("--------------------------------------------------------------------------------------------------------------------------");
			}
		}
	}

}
