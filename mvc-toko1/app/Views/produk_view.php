<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MVC-Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-transparent">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?action=index">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=produk">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=pelanggan">Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=transaksi">Transaksi</a>
                        </li>
                </div>
            </div>
        </nav>
        <hr>
        <h3>Daftar Produk</h3>
        <hr>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <a href="index.php?action=produk&subaction=tambah" class="btn btn-primary">+ Tambah Produk</a>
        </div>

        <!-- tabel  -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nomor = 1;
                foreach ($data as $dataBarang): ?>
                    <tr>
                        <th scope="row"><?php echo $nomor++; ?></th>
                        <td><?= $dataBarang['nama']; ?></td>
                        <td><?= $dataBarang['harga']; ?></td>
                        <td><?= $dataBarang['stok']; ?></td>
                        <td>
                            <a href="index.php?action=produk&subaction=edit&id=<?= $dataBarang['kode_barang']; ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="index.php?action=produk&subaction=hapus&id=<?= $dataBarang['kode_barang']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>