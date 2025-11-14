<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h3><?= isset($data) ? 'Edit Pelanggan' : 'Tambah Pelanggan' ?></h3>
    <form method="post" action="index.php?action=pelanggan&subaction=<?= isset($data) ? 'update' : 'simpan' ?>">

        <?php if (isset($data)): ?>
            <input type="hidden" name="id" value="<?= $data['id_pelanggan'] ?>">
        <?php endif; ?>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?? '' ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php?action=pelanggan&subaction=daftarPelanggan" class="btn btn-secondary">Kembali</a>

    </form>
</div>
</body>
</html>
