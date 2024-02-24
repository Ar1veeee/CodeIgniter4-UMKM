<?= $this->extend('templates/layout') ?>

<?= $this->section('judul') ?>
Produk
<?= $this->endSection('judul') ?>

<?= $this->section('subJudul') ?>
Form Produk
<?= $this->endSection('subJudul') ?>

<?= $this->section('konten') ?>
<?php if (isset($validation)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php } ?>
<form action="/produk/update/<?= $produk->id_produk ?>" method="post" enctype="multipart/form-data">
    <!-- Existing product information fields -->
    <div class="form-group">
        <label for="nama_produk">Nama Produk :</label>
        <input class="form-control" type="text" name="nama_produk" value="<?= $produk->nama_produk ?>" required>
    </div>
    <div class="form-group">
        <label for="stok">Stok :</label>
        <input class="form-control" type="number" name="stok" value="<?= $produk->stok ?>" required>
    </div>
    <div class="form-group">
        <label for="harga">Harga :</label>
        <input class="form-control" type="text" name="harga" value="<?= $produk->harga ?>" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi :</label>
        <input class="form-control" type="text" name="deskripsi" value="<?= $produk->deskripsi ?>" required>
    </div>

    <!-- Current file display -->
    <div class="form-group">
        <label for="currentFile">Current File:</label>
        <?php if (!empty($produk->file)) : ?>
            <img src="<?= base_url('uploads/' . $produk->file) ?>" alt="Current File">
        <?php else : ?>
            <p>No file uploaded.</p>
        <?php endif; ?>
    </div>

    <!-- File upload field -->
    <div class="form-group">
        <label for="file">Upload New File</label>
        <input type="file" name="file" id="file">
    </div>

    <!-- Submit button -->
    <div>
        <input class="btn btn-success" type="submit" value="Update">
        <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</form>
<?= $this->endSection('konten') ?>
