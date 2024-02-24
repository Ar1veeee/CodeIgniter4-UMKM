<?=$this->extend('templates/layout')?>

<?=$this->section('judul')?>
Cemal - Cemil
<?=$this->endSection('judul')?>

<?=$this->section('subJudul')?>
Data Transaksi Penjualan
<?=$this->endSection('subJudul')?>

<?=$this->section('konten')?>
<a href="/produk/index" class="btn btn-primary"><i class="fas fa-plus"></i> Tambahkan Menu</a>
<?php
$namamenu = [];
$hargamenu = [];
foreach($produk as $value){
  $namamenu[$value->id_produk] = $value->nama_produk; 
  $hargamenu[$value->id_produk] = $value->harga; 
}
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Pesanan</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Harga</th>
      <th scope="col">Total Harga</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($pesan as $b){ ?>
    <tr>
      <th scope="row"><?=$b->nama ?></th>
      <td><?=$namamenu[$b->nama_produk] ?></td>
      <td><?=$hargamenu[$b->nama_produk] ?></td>
      <td><?=$b->jumlah ?></td>
      <td><?=$b->t_harga ?></td>
      <td>
        <a href="<?=site_url("pesan/edit/".$b->nama)?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Update</a>
        <a href="<?=site_url("pesan/delete/".$b->nama)?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>
<?=$this->endSection('konten')?>
