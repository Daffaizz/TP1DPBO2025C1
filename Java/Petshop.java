import java.util.ArrayList;
import java.util.Iterator;
import java.util.Scanner;

class Petshop {
    private int id;
    private String name;
    private String kategori;
    private String harga;

    public Petshop() {
        this.id = 0;
        this.name = "";
        this.kategori = "";
        this.harga = "";
    }

    public Petshop(int id, String name, String kategori, String harga) {
        this.id = id;
        this.name = name;
        this.kategori = kategori;
        this.harga = harga;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getKategori() {
        return kategori;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public static void addProduk(ArrayList<Petshop> inventory, Scanner scanner) {
        System.out.println("Menambahkan Produk");
        System.out.print("Masukkan ID: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        System.out.print("Masukkan Nama: ");
        String name = scanner.nextLine();
        System.out.print("Masukkan Kategori: ");
        String kategori = scanner.nextLine();
        System.out.print("Masukkan Harga: ");
        String harga = scanner.nextLine();

        inventory.add(new Petshop(id, name, kategori, harga));
        System.out.println("Produk berhasil ditambahkan.");
    }

    public static void tampilkanProduk(ArrayList<Petshop> inventory) {
        System.out.println("Menampilkan Produk");
        for (Petshop produk : inventory) {
            System.out.println("ID: " + produk.getId());
            System.out.println("Nama: " + produk.getName());
            System.out.println("Kategori: " + produk.getKategori());
            System.out.println("Harga: " + produk.getHarga());
            System.out.println("===============================");
        }
    }

    public static void updateProduk(ArrayList<Petshop> inventory, Scanner scanner) {
        System.out.print("Masukkan ID produk yang ingin diubah: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        
        for (Petshop produk : inventory) {
            if (produk.getId() == id) {
                System.out.print("Masukkan Nama baru: ");
                produk.setName(scanner.nextLine());
                System.out.print("Masukkan Kategori baru: ");
                produk.setKategori(scanner.nextLine());
                System.out.print("Masukkan Harga baru: ");
                produk.setHarga(scanner.nextLine());
                System.out.println("Update produk berhasil.");
                return;
            }
        }
        System.out.println("Item dengan ID " + id + " tidak ditemukan.");
    }

    public static void deleteProduk(ArrayList<Petshop> inventory, Scanner scanner) {
        System.out.print("Masukkan ID produk yang ingin dihapus: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        
        Iterator<Petshop> iterator = inventory.iterator();
        while (iterator.hasNext()) {
            if (iterator.next().getId() == id) {
                iterator.remove();
                System.out.println("Item dengan ID " + id + " berhasil dihapus.");
                return;
            }
        }
        System.out.println("Item dengan ID " + id + " tidak ditemukan.");
    }

    public static void searchProduk(ArrayList<Petshop> inventory, Scanner scanner) {
        System.out.print("Masukkan ID produk yang dicari: ");
        int id = scanner.nextInt();
        scanner.nextLine();
        
        for (Petshop produk : inventory) {
            if (produk.getId() == id) {
                System.out.println("ID: " + produk.getId());
                System.out.println("Nama: " + produk.getName());
                System.out.println("Kategori: " + produk.getKategori());
                System.out.println("Harga: " + produk.getHarga());
                return;
            }
        }
        System.out.println("Item dengan ID " + id + " tidak ditemukan.");
    }
}
