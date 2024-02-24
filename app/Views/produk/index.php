<?=$this->extend('templates/layout')?>

<?=$this->section('judul')?>
Cemal - Cemil
<?=$this->endSection('judul')?>

<?=$this->section('subJudul')?>
Daftar Menu Makanan
<?=$this->endSection('subJudul')?>

<?=$this->section('konten')?>
<a href="<?= site_url('produk/add') ?>" class="btn btn-primary">
    <i class="fas fa-plus"></i> Tambah
</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Stok</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($produk as $k) : ?>
            
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><img src="<?=base_url('uploads/' . $k->file)?>" width="200px"></td>
                <td><?= $k->nama_produk ?></td>
                <td><?= $k->stok ?></td>
                <td><?= $k->harga ?></td>
                <td><?= $k->deskripsi ?></td>
                <td>
                    <a href="<?= site_url("produk/edit/{$k->id_produk}") ?>" class="btn btn-xs btn-warning">
                        <i class="fa fa-edit"></i> Update
                    </a>
                    <a href="<?= site_url("produk/delete/{$k->id_produk}") ?>" class="btn btn-xs btn-danger">
                        <i class="fa fa-trash"></i> Delete
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?=$this->endSection('konten')?>
