<?=$this->extend('templates/layout')?>

<?=$this->section('judul')?>
Produk
<?=$this->endSection('judul')?>

<?=$this->section('subJudul')?>
Form Produk
<?=$this->endSection('subJudul')?>

<?=$this->section('konten')?>
<?php if(isset($validation)) { ?>
    <div class="alert alert-danger" role="alert">
        <?=$validation->listErrors()?>
    </div>
<?php } ?>

<form action="<?=site_url('produk/insert')?>" method="post" autocomplete="off" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="card-body col-md-8">
        <div class="form-group">
            <label for="nama_produk">Nama Makanan</label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= old('nama_produk') ?>">
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="<?= old('stok') ?>">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?= old('harga') ?>">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= old('deskripsi') ?>">
        </div>
        <div class="form-group">
            <label for="file">Upload File</label>
            <input type="file" name="file" id="file" class="form-control" value="<?= old('file') ?>">
        </div>
        <div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>
</form>
<?=$this->endSection('konten')?>
