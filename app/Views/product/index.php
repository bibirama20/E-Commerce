<?= view('templates/header') ?>
<?= view('templates/sidebar') ?>

<div class="container mt-4">
    <h3>Daftar Produk</h3>
    <a href="/admin/produk/create" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <div class="row">
        <?php foreach ($products as $produk): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="/uploads/<?= esc($produk['gambar']) ?>" class="card-img-top" height="200" style="object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($produk['judul']) ?></h5>
                        <p class="card-text"><strong>Harga:</strong> Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>
                        <p class="card-text"><?= esc($produk['keterangan']) ?></p>
                        <a href="/admin/produk/edit/<?= $produk['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/admin/produk/delete/<?= $produk['id'] ?>" onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= view('templates/footer') ?>
