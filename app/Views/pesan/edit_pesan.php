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
<form action="/pesan/update/<?= $pesan->nama ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama">Nama Pelanggan :</label>
        <input class="form-control" type="text" name="nama" value="<?= $pesan->nama ?>" required>
    </div>
    <div class="form-group">
        <label for="nama_produk">Menu :</label>
        <select name="nama_produk" id="nama_produk" class="form-control">
            <option value="">---Pilih Menu---</option>
            <?php foreach($produk as $np): ?>
                <option value="<?= $np->id_produk ?>" data-harga="<?= $np->harga ?>" <?= ($np->id_produk == $pesan->nama_produk) ? 'selected' : '' ?>>
                    <?= $np->nama_produk ?> 
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="harga">Harga :</label>
        <input class="form-control" type="number" name="harga" id="harga" value="<?= $pesan->harga ?>" required readonly>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah :</label>
        <input class="form-control" type="number" name="jumlah" id="jumlah" value="<?= $pesan->jumlah ?>" required>
    </div>
    <div class="form-group">
        <label for="t_harga">Total Harga :</label>
        <input class="form-control" type="number" name="t_harga" id="t_harga" value="<?= $pesan->t_harga ?>" required readonly>
    </div>
    <div>
        <input class="btn btn-success" type="submit" value="Update">
        <a href="<?= base_url('produk') ?>" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- Add this to your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        function updateTotalHarga() {
            var harga = $('#harga').val();
            var jumlah = $('#jumlah').val();
            var totalHarga = harga * jumlah;
            $('#t_harga').val(totalHarga);
        }

        $('#nama_produk, #jumlah').change(function () {
            var harga = $('#nama_produk').find(':selected').data('harga');
            $('#harga').val(harga);
            updateTotalHarga();
        });

        $('#jumlah').change(function () {
            updateTotalHarga();
        });

        // Trigger change event on page load
        $('#nama_produk, #jumlah').trigger('change');
    });
</script>
<?= $this->endSection('konten') ?>
