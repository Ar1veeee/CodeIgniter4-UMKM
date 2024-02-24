<?= $this->extend('templates/layout') ?>

<?= $this->section('judul') ?>
Silahkan Pesan Disini
<?= $this->endSection('judul') ?>

<?= $this->section('subJudul') ?>
Tambahkan Pesan Anda
<?= $this->endSection('subJudul') ?>

<?= $this->section('konten') ?>

<?php if (isset($validation)) { ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php } ?>

<form action="<?= site_url('pesan/create') ?>" method="post" autocomplete="off">
    <?= csrf_field() ?>
    <div class="card-body col-md=8">
        <div class="form-group">
            <label for="nama">Nama Pembeli</label>
            <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="form-group">
            <label for="nama_produk">Menu</label>
            <select name="nama_produk" id="nama_produk" class="form-control">
                <option value="">---Pilih Menu---</option>
                <?php foreach($produk as $np): ?>
                    <option value="<?= $np->id_produk ?>" data-harga="<?= $np->harga ?>">
                         <?= $np->nama_produk ?> 
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="text" name="harga" id="harga" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" id="jumlah" class="form-control">
        </div>
        <div class="form-group">
            <label for="t_harga">Total Harga</label>
            <input type="text" name="t_harga" id="t_harga" class="form-control" readonly>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Bayar</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
    </div>
</form>

<!-- Add this to your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#nama_produk, #jumlah').change(function () {
            var harga = $('#nama_produk').find(':selected').data('harga');
            var jumlah = $('#jumlah').val();
            var totalHarga = harga * jumlah;
            $('#harga').val(harga);
            $('#t_harga').val(totalHarga);
        });
    });
</script>

<?= $this->endSection('konten') ?>
