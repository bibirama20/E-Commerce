<?= view('templates/header') ?>
<?= view('templates/sidebar') ?>

<div class="container mt-4">
    <h3>Tambah Produk</h3>
    <form action="/admin/produk/store" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= view('templates/footer') ?>
