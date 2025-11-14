<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <h3><?= isset($data) ? 'Edit Produk' : 'Tambah Produk'; ?></h3>
        <hr>

        <form method="POST" action="index.php?action=produk&subaction=<?= isset($data) ? 'update' : 'simpan'; ?>">
            <?php if (isset($data)): ?>
                <input type="hidden" name="id" value="<?= $data['kode_barang']; ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?? ''; ?>" required>
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" step="0.01" name="harga" class="form-control" value="<?= $data['harga'] ?? ''; ?>"
                    required>
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?? ''; ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="index.php?action=produk" class="btn btn-secondary">Kembali</a>
        </form>

    </div>

</body>

</html>