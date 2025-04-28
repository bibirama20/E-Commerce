<?= view('templates/header') ?>
<?= view('templates/sidebar') ?>

<div class="container mt-4">
    <h3>Semua Produk</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($products as $produk): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="/uploads/<?= esc($produk['gambar']) ?>" class="card-img-top" style="object-fit:cover; height:200px;">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($produk['judul']) ?></h5>
                        <p class="card-text"><strong>Harga:</strong> Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>
                        <p class="card-text"><?= esc($produk['keterangan']) ?></p>
                        <a href="/home/tambah-ke-keranjang/<?= $produk['id'] ?>" 
                           class="btn btn-sm" 
                           style="background-color: #2575fc; color: white;">+ Keranjang</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= view('templates/footer') ?>
