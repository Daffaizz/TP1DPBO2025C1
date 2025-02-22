<?php

class Petshop {
    private $id;
    private $name;
    private $kategori;
    private $harga;
    private $foto;

    public function __construct($id, $name, $kategori, $harga, $foto) {
        $this->id = $id;
        $this->name = $name;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->foto = $foto;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getKategori() {
        return $this->kategori;
    }
    public function setKategori($kategori) {
        $this->kategori = $kategori;
    }
    public function getHarga() {
        return $this->harga;
    }
    public function setHarga($harga) {
        $this->harga = $harga;
    }
    public function getFoto() {
        return $this->foto;
    }
    public function setFoto($foto) {
        $this->foto = $foto;
    }
}

?>