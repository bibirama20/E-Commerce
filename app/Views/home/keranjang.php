<?= view('templates/header') ?>
<?= view('templates/sidebar') ?>

<div class="container mt-4">
    <h3>Keranjang Belanja</h3>

    <?php if (empty($keranjang)): ?>
        <div class="alert alert-warning">Keranjang kosong.</div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grandTotal = 0;
                foreach ($keranjang as $item):
                    // Menambahkan pengecekan apakah key 'harga' ada pada item
                    $harga = isset($item['harga']) ? $item['harga'] : 0;
                    $subtotal = $harga * $item['jumlah'];
                    $grandTotal += $subtotal;
                ?>
                    <tr>
                        <td><img src="/uploads/<?= esc($item['gambar']) ?>" height="60"></td>
                        <td><?= esc($item['judul']) ?></td>
                        <td>Rp<?= number_format($harga, 0, ',', '.') ?></td>
                        <td><?= $item['jumlah'] ?></td>
                        <td>Rp<?= number_format($subtotal, 0, ',', '.') ?></td>
                        <td>
                            <a href="/home/hapus-keranjang/<?= $item['id'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-end">Total</th>
                    <th colspan="2">Rp<?= number_format($grandTotal, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
        </table>
    <?php endif; ?>
</div>

<?= view('templates/footer') ?>
