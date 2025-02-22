# TP1DPBO2025C1
# Janji
Saya Daffa Faiz Restu Oktavian dengan NIM 2309013 mengerjakan Tugas Praktikum 1 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
# Desain Program
Program ini terdiri dari satu kelas utama, yaitu petshop, yang berfungsi untuk menyimpan dan mengelola data produk. Kelas ini memiliki beberapa atribut, yaitu id sebagai identifikasi unik setiap produk, nama untuk menyimpan nama produk, kategori untuk menentukan jenis produk, harga sebagai informasi harga, dan foto untuk menyimpan gambar produk (khusus php). Metode yang tersedia dalam kelas ini meliputi setId(id), setNama(nama), setKategori(kategori), setHarga(harga), dan setFoto(foto) untuk mengubah atribut produk, serta getId(), getNama(), getKategori(), getHarga(), dan getFoto() untuk mengambil data produk. Selain itu, terdapat metode tampilkanProduk() yang digunakan untuk menampilkan daftar produk dalam bentuk tabel atau daftar agar pengguna dapat melihat informasi produk dengan lebih mudah.
# Alur Program  
1. Menambah Produk – Pengguna memasukkan data produk seperti Nama, Kategori, Harga, dan Foto melalui input. Program kemudian menentukan ID produk baru berdasarkan jumlah produk yang ada, menyimpan informasi ke dalam ArrayList, dan jika ada foto, akan menyimpannya ke dalam folder uploads/. Setelah data berhasil disimpan, produk baru akan muncul dalam daftar produk yang tersedia.  
2. Menampilkan Produk – Program menampilkan daftar produk yang telah ditambahkan dalam bentuk tabel atau list dengan informasi seperti ID, Nama, Kategori, Harga, dan Foto. Jika produk memiliki foto, program akan menampilkannya dari folder uploads/. Fitur ini memudahkan pengguna untuk melihat semua produk yang tersedia secara terstruktur.  
3. Mengedit Produk – Pengguna memilih produk berdasarkan ID, lalu program menampilkan data produk lama yang dapat diperbarui oleh pengguna. Setelah memasukkan data baru, program memperbarui informasi dalam ArrayList. Jika pengguna mengunggah foto baru, maka foto lama akan diganti dengan yang baru, memastikan produk memiliki informasi terbaru.  
4. Menghapus Produk – Pengguna memilih ID produk yang ingin dihapus, lalu program mencari produk tersebut dalam ArrayList dan menghapusnya. Jika produk memiliki file foto yang tersimpan di uploads/, maka foto tersebut juga dapat dihapus untuk menghemat penyimpanan.  
5. Mencari Produk – Pengguna dapat mencari produk dengan mengetikkan kata kunci yang sesuai dengan nama atau kategori produk. Program akan melakukan pencarian dalam ArrayList dan menampilkan daftar produk yang sesuai dengan kata kunci yang dimasukkan, membantu pengguna menemukan produk dengan lebih cepat dan efisien.
6. Keluar - Keluar dari Program jika user memilih (6/969), program berhenti.
# Dukumentasi
![Screenshot Program](CPP/Screenshot%202025-02-15%20203349.png)
![Screenshot Program](CPP/Screenshot%202025-02-15%20203415.png)
