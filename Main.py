from Petshop import Petshop

def main():
    inventory = []
    while True:
        print("===============================")
        print("Pilih Opsi:")
        print("1. Tambah Item")
        print("2. Tampilkan Semua Item")
        print("3. Ubah Item")
        print("4. Hapus Item")
        print("5. Cari Item")
        print("6. Keluar")
        print("===============================")
        pilihan = input("Pilih opsi: ")

        if pilihan == "1":
            Petshop.add_produk(inventory)
        elif pilihan == "2":
            Petshop.tampilkan_produk(inventory)
        elif pilihan == "3":
            Petshop.update_produk(inventory)
        elif pilihan == "4":
            Petshop.delete_produk(inventory)
        elif pilihan == "5":
            Petshop.search_produk(inventory)
        elif pilihan == "6":
            print("Keluar")
            break
        else:
            print("Pilihan tidak valid")

if __name__ == "__main__":
    main()