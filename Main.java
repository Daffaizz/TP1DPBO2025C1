import java.util.ArrayList;
import java.util.Iterator;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        ArrayList<Petshop> inventory = new ArrayList<>();
        Scanner scanner = new Scanner(System.in);
        int pilihan;
        
        do {
            System.out.println("===============================");
            System.out.println("Pilih Opsi:");
            System.out.println("1. Tambah Item");
            System.out.println("2. Tampilkan Semua Item");
            System.out.println("3. Ubah Item");
            System.out.println("4. Hapus Item");
            System.out.println("5. Cari Item");
            System.out.println("969. Keluar");
            System.out.println("===============================");
            System.out.print("Pilih opsi: ");
            pilihan = scanner.nextInt();
            scanner.nextLine();

            switch (pilihan) {
                case 1:
                    Petshop.addProduk(inventory, scanner);
                    break;
                case 2:
                    Petshop.tampilkanProduk(inventory);
                    break;
                case 3:
                    Petshop.updateProduk(inventory, scanner);
                    break;
                case 4:
                    Petshop.deleteProduk(inventory, scanner);
                    break;
                case 5:
                    Petshop.searchProduk(inventory, scanner);
                    break;
                case 969:
                    System.out.println("Terima Kasih Sudah Berkunjung");
                    break;
                default:
                    System.out.println("Pilihan tidak valid");
                    break;
            }
        } while (pilihan != 969);
        
        scanner.close();
    }
}
