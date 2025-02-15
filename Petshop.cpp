#include <iostream>
#include <list>
#include <string>

using namespace std;

class Petshop {
    private:
        int id;
        string name;
        string kategori;
        string harga;
    
    public:
        Petshop() {
            id = 0;
            name = "";
            kategori = "";
            harga = "";
        }
    
        Petshop(int id, string name, string kategori, string harga) {
            this->id = id;
            this->name = name;
            this->kategori = kategori;
            this->harga = harga;
        }
    
        void setId(int id) {
            this->id = id;
        }
    
        int getId() {
            return id;
        }
    
        void setName(string name) {
            this->name = name;
        }
    
        string getName() {
            return name;
        }
    
        void setKategori(string kategori) {
            this->kategori = kategori;
        }
    
        string getKategori() {
            return kategori;
        }
    
        void setHarga(string harga) {
            this->harga = harga;
        }
    
        string getHarga() {
            return harga;
        }

        ~Petshop() {
        }
    
        void addProduk(list<Petshop> &inventory) {
            Petshop produk;
            cout << "Menambahkan Produk\n";
            cout << "Masukkan ID: "; cin >> produk.id;
            cout << "Masukkan Nama: "; cin >> produk.name;
            cout << "Masukkan Kategori: "; cin >> produk.kategori;
            cout << "Masukkan Harga: "; cin >> produk.harga;

            produk.setId(produk.id);
            produk.setName(produk.name);
            produk.setKategori(produk.kategori);
            produk.setHarga(produk.harga);
            inventory.push_back(produk);

            cout << "Produk berhasil ditambahkan.\n";
        }
    
        void tampilkanProduk(list<Petshop> &inventory) {
            cout << "Menampilkan Produk\n";
            for (Petshop &produk : inventory) {
                cout << "ID: " << produk.getId() << endl;
                cout << "Nama: " << produk.getName() << endl;
                cout << "Kategori: " << produk.getKategori() << endl;
                cout << "Harga: " << produk.getHarga() << endl;
                cout << "===============================\n";
            }
        }
    
        void updateProduk(list<Petshop> &inventory) {
            int id;
            cout << "Masukkan ID produk yang ingin diubah: "; cin >> id;
            for (Petshop &produk : inventory) {
                if (produk.getId() == id) {
                    cout << "Masukkan Nama baru: "; cin >> produk.name;
                    cout << "Masukkan Kategori baru: "; cin >> produk.kategori;
                    cout << "Masukkan Harga baru: "; cin >> produk.harga;
                }
            }
            cout << "Update produk berhasil.\n";
        }
    
        void deleteProduk(list<Petshop> &inventory) {
            int id;
            cout << "Masukkan ID produk yang ingin dihapus: "; cin >> id;
            for (list<Petshop>::iterator it = inventory.begin(); it != inventory.end(); ++it) {
                if (it->id == id) {
                    inventory.erase(it);
                    cout << "Item dengan ID " << id << " berhasil dihapus.\n";
                    return;
                }
            }
            cout << "Item dengan ID " << id << " tidak ditemukan.\n";
        }
    
        void searchProduk(list<Petshop> &inventory) {
            int id;
            cout << "Masukkan ID produk yang dicari: "; cin >> id;
            for (Petshop &produk : inventory) {
                if (produk.getId() == id) {
                    cout << "ID: " << produk.getId() << endl;
                    cout << "Nama: " << produk.getName() << endl;
                    cout << "Kategori: " << produk.getKategori() << endl;
                    cout << "Harga: " << produk.getHarga() << endl;
                    return;
                }
            }
            cout << "Item dengan ID " << id << " tidak ditemukan.\n";
        }
};