import java.util.Scanner;

public class ThuatToanEuclideMoRong {
	public static void main(String[] args) {
		Scanner sc=new Scanner(System.in);
		int d,x,y,x2=1,x1=0,y2=0,y1=1,q,r;
		System.out.print("Mời nhập số a:");
		int a=sc.nextInt();
		System.out.print("Mời nhập số b:");
		int b=sc.nextInt();
		if(b==0) {
			d=a;
			x=1;
			y=0;
			System.out.println("d="+d+"\n"+"x="+x+"\n"+"y="+y);
		}
		else {
			while(b>0) {
				q=a/b;
				r=a-q*b;
				x=x2-q*x1;
				y=y2-q*y1;
				a=b;
				b=r;
				x2=x1;
				x1=x;
				y2=y1;
				y1=y;
			}
			d=a;
			x=x2;
			y=y2;
			System.out.println("d="+d+"\n"+"x="+x+"\n"+"y="+y);
		}
	}
}
