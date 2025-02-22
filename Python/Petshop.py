class Petshop:
    def __init__(self, id=0, name="", kategori="", harga=""):
        self.id = id
        self.name = name
        self.kategori = kategori
        self.harga = harga

    @staticmethod
    def add_produk(inventory):
        print("Menambahkan Produk")
        id = int(input("Masukkan ID: "))
        name = input("Masukkan Nama: ")
        kategori = input("Masukkan Kategori: ")
        harga = input("Masukkan Harga: ")
        inventory.append(Petshop(id, name, kategori, harga))
        print("Produk berhasil ditambahkan.")

    @staticmethod
    def tampilkan_produk(inventory):
        print("Menampilkan Produk")
        for produk in inventory:
            print(f"ID: {produk.id}\nNama: {produk.name}\nKategori: {produk.kategori}\nHarga: {produk.harga}")
            print("===============================")

    @staticmethod
    def update_produk(inventory):
        id = int(input("Masukkan ID produk yang ingin diubah: "))
        for produk in inventory:
            if produk.id == id:
                produk.name = input("Masukkan Nama baru: ")
                produk.kategori = input("Masukkan Kategori baru: ")
                produk.harga = input("Masukkan Harga baru: ")
                print("Update produk berhasil.")
                return
        print(f"Item dengan ID {id} tidak ditemukan.")

    @staticmethod
    def delete_produk(inventory):
        id = int(input("Masukkan ID produk yang ingin dihapus: "))
        for produk in inventory:
            if produk.id == id:
                inventory.remove(produk)
                print(f"Item dengan ID {id} berhasil dihapus.")
                return
        print(f"Item dengan ID {id} tidak ditemukan.")

    @staticmethod
    def search_produk(inventory):
        id = int(input("Masukkan ID produk yang dicari: "))
        for produk in inventory:
            if produk.id == id:
                print(f"ID: {produk.id}\nNama: {produk.name}\nKategori: {produk.kategori}\nHarga: {produk.harga}")
                return
        print(f"Item dengan ID {id} tidak ditemukan.")
