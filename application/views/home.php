<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gudang Barang Mentah</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="col">
      <div class="row">a</div>
    </div>

    <!-- Menu -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid px-4">
            <a href="" class="navbar-brand h1 text-secondary pt-3">GUDANG BARANG MENTAH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header">
                <h2 class="text-secondary">Gudang Barang Mentah</h2>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav flex-wrap ms-md-auto">
                  <li class="nav-item"><a href="<?=base_url()?>" class="nav-link fs-5"><i class="fa-solid fa-house-chimney"></i> Beranda</a></li>
                  <li class="nav-item"><a href="<?=site_url('barang')?>" class="nav-link fs-5"><i class="fa-solid fa-store"></i> Barang</a></li>
                  <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle fs-5" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-solid fa-folder"></i> Permintaan</a>
                      <ul class="dropdown-menu">
                          <li><a href="<?=site_url('permintaan_pembelian')?>" class="dropdown-item">Permintaan Pembelian</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a href="<?=site_url('permintaan_barang_mentah')?>" class="dropdown-item">Permintaan Barang Mentah</a></li>
                      </ul>
                  </li>
                  <li class="nav-item"><a href="<?=site_url('penerimaan')?>" class="nav-link fs-5"><i class="fa-solid fa-inbox"></i> Penerimaan</a></li>
                  <li class="nav-item"><a href="<?=site_url('pengiriman')?>" class="nav-link fs-5"><i class="fa-solid fa-truck"></i> Pengiriman</a></li>
                </ul>
              </div>
            </div>
        </div>
    </nav>
		
    <!-- site position -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb py-2 px-2 my-3 mx-3 shadow-sm p-3 mb-5 bg-body-tertiary rounded">
          <li class="breadcrumb-item"><a href="<?=base_url()?>" class="text-secondary" style="text-decoration:none;"><i class="fa-solid fa-house-chimney"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Permintaan Barang Mentah</li>
        </ol>
    </nav>
    <div class="col px-5 mx-4 justify-content-center rounded shadow p-3 mb-5 bg-body-tertiary">
			<h2 style="text-align: center;" class="text-secondary">Gudang Barang Mentah</h2>
      <hr class="my-4">
			<ul>
				<li><a href="<?=site_url('barang')?>">Barang</a></li>
				<li><a href="">Gudang</a></li>
				<li><a href="<?=site_url('permintaan_pembelian')?>">Permintaan Pembelian</a></li>
				<li><a href="<?=site_url('penerimaan')?>">Penerimaan Barang</a></li>
				<li><a href="<?=site_url('pengiriman')?>">Pengiriman Barang</a></li>
				<li><a href="<?=site_url('permintaan_barang_mentah')?>">Permintaan Barang</a></li>
			</ul>
		</div>
<script src="https://kit.fontawesome.com/50d0739a45.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
