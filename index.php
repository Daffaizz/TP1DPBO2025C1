<?php
include 'Petshop.php';
session_start();

$uploadDir = "uploads/";

// Pastikan folder uploads ada
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Inisialisasi session untuk menyimpan produk
if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}

// Tambah Produk
if (isset($_POST['add'])) {
    $id = count($_SESSION['products']) + 1;
    $name = $_POST['name'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Upload foto jika ada
    $foto = "";
    if (!empty($_FILES["foto"]["name"])) {
        $foto = $uploadDir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    }

    $product = new Petshop($id, $name, $kategori, $harga, $foto);
    $_SESSION['products'][] = $product;

    header("Location: index.php");
}

// Edit Produk
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    foreach ($_SESSION['products'] as &$product) {
        if ($product->getId() == $id) {
            $product->setName($_POST['name']);
            $product->setKategori($_POST['kategori']);
            $product->setHarga($_POST['harga']);

            // Jika upload foto baru, ganti yang lama
            if (!empty($_FILES["foto"]["name"])) {
                $foto = $uploadDir . basename($_FILES["foto"]["name"]);
                move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
                $product->setFoto($foto);
            }
        }
    }

    header("Location: index.php");
}

// Hapus Produk
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    foreach ($_SESSION['products'] as $key => $product) {
        if ($product->getId() == $id) {
            unset($_SESSION['products'][$key]);
        }
    }

    // Reindex array setelah penghapusan
    $_SESSION['products'] = array_values($_SESSION['products']);

    header("Location: index.php");
}

// Ambil data produk
$products = $_SESSION['products'];
$editProduct = null;
if (isset($_GET['edit'])) {
    foreach ($products as $product) {
        if ($product->getId() == $_GET['edit']) {
            $editProduct = $product;
        }
    }
}

// Fitur Search
$searchQuery = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : "";
if ($searchQuery !== "") {
    $products = array_filter($_SESSION['products'], function ($product) use ($searchQuery) {
        return strpos(strtolower($product->getName()), $searchQuery) !== false ||
               strpos(strtolower($product->getKategori()), $searchQuery) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 30px;
        }
        .table img {
            border-radius: 8px;
        }
        .btn {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Daftar Produk Dapis Petshop</h2>

    <!-- Form Search -->
    <form method="get" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="<?= htmlspecialchars($searchQuery); ?>">
            <button type="submit" class="btn btn-primary">Cari</button>
            <a href="index.php" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <table class="table table-striped table-bordered text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)) : ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada produk ditemukan</td>
                </tr>
            <?php else : ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?= $product->getId(); ?></td>
                        <td><?= $product->getName(); ?></td>
                        <td><?= $product->getKategori(); ?></td>
                        <td><?= $product->getHarga(); ?></td>
                        <td>
                            <?php if (!empty($product->getFoto())) : ?>
                                <img src="<?= $product->getFoto(); ?>" width="100" class="img-thumbnail">
                            <?php else : ?>
                                <span class="text-muted">Tidak ada gambar</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="index.php?edit=<?= $product->getId(); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?delete=<?= $product->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Form Tambah/Edit Produk -->
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><?= isset($editProduct) ? "Edit Produk" : "Tambah Produk"; ?></h4>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <?php if (isset($editProduct)) : ?>
                    <input type="hidden" name="id" value="<?= $editProduct->getId(); ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="<?= $editProduct ? $editProduct->getName() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="kategori" class="form-control" value="<?= $editProduct ? $editProduct->getKategori() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?= $editProduct ? $editProduct->getHarga() : ''; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Produk</label>
                    <input type="file" name="foto" class="form-control">
                    <?php if ($editProduct && !empty($editProduct->getFoto())) : ?>
                        <img src="<?= $editProduct->getFoto(); ?>" width="100" class="img-thumbnail mt-2">
                    <?php endif; ?>
                </div>

                <button type="submit" name="<?= isset($editProduct) ? 'edit' : 'add'; ?>" class="btn btn-success">
                    <?= isset($editProduct) ? "Update" : "Tambah"; ?>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
