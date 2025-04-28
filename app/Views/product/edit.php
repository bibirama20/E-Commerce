<?= view('templates/header') ?>
<?= view('templates/sidebar') ?>

<div class="container mt-4">
    <h3>Edit Produk</h3>
    <form action="/admin/produk/update/<?= $produk['id'] ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" value="<?= esc($produk['judul']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required><?= esc($produk['keterangan']) ?></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar Baru (opsional)</label>
            <input type="file" name="gambar" class="form-control">
            <p>Gambar sekarang: <img src="/uploads/<?= $produk['gambar'] ?>" height="80"></p>
        </div>
        <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" value="<?= esc($produk['harga']) ?>" class="form-control" required>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>

<?= view('templates/footer') ?>
