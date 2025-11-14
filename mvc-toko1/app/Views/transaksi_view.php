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
            <div class="container-fluid"> <a class="navbar-brand" href="index.php?action=index">Home</a> <button
                    class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"> <a class="nav-link" href="index.php?action=produk">Produk</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="index.php?action=pelanggan">Pelanggan</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="index.php?action=transaksi">Transaksi</a> </li>
                </div>
            </div>
        </nav>
        <hr>
        <h3>Transaksi Penjualan</h3>
        <hr>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <a href="index.php?action=transaksi&subaction=tambah" class="btn btn-primary">+ Tambah Transaksi</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>ID Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data)): ?>
                    <?php $nomor = 1; ?>
                    <?php foreach ($data as $transaksi): ?>
                        <tr>
                            <td><?= $nomor++; ?></td>
                            <td><?= $transaksi['kode_barang']; ?></td>
                            <td><?= $transaksi['id_pelanggan']; ?></td>
                            <td><?= $transaksi['jumlah']; ?></td>
                            <td><?= $transaksi['total_harga']; ?></td>
                            <td>
                                <a href="index.php?action=detail_transaksi&id=<?= $transaksi['id_transaksi']; ?>"
                                    class="btn btn-warning btn-sm">Detail Transaksi</a>
                                <a href="index.php?action=transaksi&subaction=hapus&id=<?= $transaksi['id_transaksi']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>