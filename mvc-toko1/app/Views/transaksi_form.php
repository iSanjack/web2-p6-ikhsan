<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-4">
    <h2>Tambah Transaksi</h2>
    <hr>

    <a href="index.php?action=transaksi" class="btn btn-warning mb-3">Kembali</a>

    <form method="POST" action="index.php?action=transaksi&subaction=simpan">
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">Pelanggan</label>
            <select class="form-select" id="id_pelanggan" name="id_pelanggan" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php foreach ($pelanggan as $p): ?>
                    <option value="<?= $p['id_pelanggan']; ?>"><?= htmlspecialchars($p['nama']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Jumlah Beli</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($barang as $b): ?>
                    <tr>
                        <td><?= htmlspecialchars($b['nama']); ?></td>
                        <td><?= number_format($b['harga'], 0, ',', '.'); ?></td>
                        <td><?= $b['stok']; ?></td>
                        <td>
                            <input type="number" class="form-control" 
                                name="barang[<?= $b['kode_barang']; ?>]" 
                                value="0" 
                                min="0" 
                                max="<?= $b['stok']; ?>">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </form>
</div>

</body>

</html>