<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Transaksi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sedikit styling supaya tabel tidak terlalu penuh dan teks rapi */
    .detail-card { max-width: 900px; margin: 0 auto; }
    .item-block { margin-bottom: .75rem; }
    .item-block + hr { margin: .5rem 0; }
    .td-label { width: 220px; font-weight: 600; }
  </style>
</head>

<body>
  <div class="container mt-4">
    <div class="detail-card">
      <h2 class="mb-3">Detail Transaksi</h2>

      <a href="index.php?action=transaksi" class="btn btn-warning mb-3">Kembali</a>

      <div class="card shadow-sm">
        <div class="card-body">
          <table class="table table-bordered mb-0">
            <tr>
              <th class="td-label">Nama Pelanggan</th>
              <td>
                <?= htmlentities($data['nama'] ?? $data['nama_pelanggan'] ?? '—'); ?>
              </td>
            </tr>

            <tr>
              <th class="td-label align-top">Nama Barang</th>
              <td>
                <?php
                // jika data barang tunggal ada di $data
                if (!empty($data['nama_barang'])):
                ?>
                  <div class="item-block">
                    <strong><?= htmlentities($data['nama_barang']); ?></strong><br>
                    Harga Satuan: <?= number_format($data['harga_barang'] ?? $data['harga'] ?? 0, 0, ',', '.'); ?><br>
                    Jumlah: <?= (int)($data['jumlah'] ?? 0); ?><br>
                    Subtotal: <?= number_format($data['total_harga'] ?? 0, 0, ',', '.'); ?>
                  </div>
                <?php
                // jika ada daftar barang (mis. $detailBarang array), tampilkan semuanya
                elseif (!empty($detailBarang) && is_array($detailBarang)):
                  foreach ($detailBarang as $idx => $b):
                ?>
                    <div class="item-block">
                      <strong><?= htmlentities($b['nama_barang'] ?? $b['nama']); ?></strong><br>
                      Harga Satuan: <?= number_format($b['harga'] ?? 0, 0, ',', '.'); ?><br>
                      Jumlah: <?= (int)($b['jumlah'] ?? 0); ?><br>
                      Subtotal: <?= number_format($b['subtotal'] ?? ($b['jumlah'] * ($b['harga'] ?? 0)), 0, ',', '.'); ?>
                    </div>
                    <?php if ($idx !== array_key_last($detailBarang)): ?><hr><?php endif; ?>
                <?php
                  endforeach;
                else:
                ?>
                  <span class="text-muted">Tidak ada detail barang.</span>
                <?php endif; ?>
              </td>
            </tr>

            <tr>
              <th class="td-label">Total</th>
              <td>
                <strong>
                  <?= number_format($data['total_harga'] ?? $data['total'] ?? 0, 0, ',', '.'); ?>
                </strong>
              </td>
            </tr>
          </table>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
