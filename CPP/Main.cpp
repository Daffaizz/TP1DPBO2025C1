#include "Petshop.cpp"

int main() {
    list<Petshop> inventory;
    Petshop shop;
    int Pilihan;

    // inventory.push_back(Petshop(1, "Kucing", "Hewan", "Rp. 100.000"));
    // inventory.push_back(Petshop(2, "Anjing", "Hewan", "Rp. 200.000"));
    // inventory.push_back(Petshop(3, "Ikan", "Hewan", "Rp. 50.000"));
    
    do {
        cout << "===============================\n";
        cout << "Pilih Opsi:\n";
        cout << "1. Tambah Item\n";
        cout << "2. Tampilkan Semua Item\n";
        cout << "3. Ubah Item\n";
        cout << "4. Hapus Item\n";
        cout << "5. Cari Item\n";
        cout << "6. Keluar\n";
        cout << "===============================\n";
        cout << "Pilih opsi: ";
        cin >> Pilihan;
        cin.ignore();
        
        if (Pilihan == 1) {
            shop.addProduk(inventory);
        } else if (Pilihan == 2) {
            shop.tampilkanProduk(inventory);
        } else if (Pilihan == 3) {
            shop.updateProduk(inventory);
        } else if (Pilihan == 4) {
            shop.deleteProduk(inventory);
        } else if (Pilihan == 5) {
            shop.searchProduk(inventory);
        } else if (Pilihan == 6) {
            cout << "Keluar\n";
        } else {
            cout << "Pilihan tidak valid\n";
        }

    } while (Pilihan != 6);

    return 0;
}
