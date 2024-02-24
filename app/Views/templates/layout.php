<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CEMAL CEMIL</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display
=fallback">
<!-- Font Awesome -->

<link rel="stylesheet" href="<?=base_url('assets')?>/plugins/fontawesome-
free/css/all.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
<!-- Left navbar links -->
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
class="fas fa-bars"></i></a>
</li>
</ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
<!-- Brand Logo -->
<a href="<?=base_url()?>" class="brand-link">
<img src="<?=base_url('assets')?>/dist/img/cemil.png" alt="AdminLTE Logo"
class="brand-image  elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">Cemal - Cemil</span>
</a>
<!-- Sidebar -->
<div class="sidebar">
<!-- Sidebar user (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">

<img src="<?=base_url('assets')?>/dist/img/admin.png" class="img-
circle elevation-2" alt="User Image">

</div>
<div class="info">
<a href="<?=base_url()?>" class="d-block">Admin</a>
</div>
</div>
<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
role="menu" data-accordion="false">
<!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
<li class="nav-header">PILIHAN</li>
<li class="nav-item">
<a href="/produk" class="nav-link">
<i class="nav-icon fas fa-columns"></i>
<p>
Menu
</p>
</a>
</li>
<li class="nav-item">
    <a href="/pesan/add" class="nav-link">
    <i class="nav-icon fas fa-columns"></i>
        <p>
            Pesan
        </p>
    </a>
</li>
<li class="nav-item">
    <a href="/pesan" class="nav-link">
    <i class="nav-icon fas fa-columns"></i>
        <p>
            Transaksi
        </p>
    </a>
</li>

</ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><?=$this->renderSection('judul')?></h1>
</div>
</div>
</div><!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
<!-- Default box -->
<div class="card">
<div class="card-header">
<h3 class="card-title"><?=$this->renderSection('subJudul')?></h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse"
title="Collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove"
title="Remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>
<div class="card-body">
<?=$this->renderSection('konten')?>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
<div class="float-right d-none d-sm-block">
<b>Version</b> 3.2.0
</div>
<strong>Copyright &copy; <?=date('Y')?> Alief Arifin M</strong> All rights reserved.
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="<?=base_url('assets')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script
src="<?=base_url('assets')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets')?>/dist/js/adminlte.min.js"></script>
</body>
</html>