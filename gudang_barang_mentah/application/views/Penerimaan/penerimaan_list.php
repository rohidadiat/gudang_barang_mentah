<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerimaan</title>
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
          <li class="breadcrumb-item active" aria-current="page">Penerimaan Barang</li>
        </ol>
    </nav>

    
    <!-- From -->
    <div class="col px-5 mx-4 justify-content-center rounded shadow p-3 mb-5 bg-body-tertiary">
      <h2 style="text-align: center;" class="text-secondary"><i class="fa-solid fa-inbox"></i> List Penerimaan</h2>
      <hr class="my-4">
      <?= $this->session->flashdata('msg') ?>
      
        <div class="navbar">
          <div class="col-md-3 navbar">
            <button class="btn btn-success"><a href="<?= site_url('penerimaan/add'); ?>" class="text-white" style="text-decoration: none;"><i class="fa-solid fa-plus"></i> Add</a></button>
          </div>

          <!-- filter tampilan -->
          <!-- <div class="col-md-2 navbar justify-content-center">
						<div class="input-group">
							<span class="input-group-text">Filter By</span>
							<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
							<ul class="dropdown-menu dropdown-menu-end">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#">Separated link</a></li>
							</ul>
						</div>
          </div> -->

          <!-- buat nampilkan berapa list
          <div class="col-md navbar justify-content-center">
						<form action="" method="post">
						<div class="input-group">
							<span class="input-group-text">Show</span>
								<input class="form-control" type="number" name="show"  placeholder="..." aria-label="Search"> 
							<span class="input-group-text">item per page</span>
						</div>
						</form>
          </div> -->

          <!-- Navbar -->
          <div class="col-md-3 navbar-right">
            <form class="d-flex" action="<?= site_url('penerimaan/search'); ?>" method="post">
							<div class="input-group">
								<span class="input-group-text">Search</span>
                <input class="form-control" name="keyword" type="text" placeholder="Search" aria-label="Search" autocomplete="off">
								<input type="submit" class="btn btn-outline-success" name="submit" value="Search" id="button-addon2">
							</div>
            </form>
          </div>
        </div>

        <!-- menampilkan data -->
        <table class="table table-striped table-bordered">
        <thead>
            <tr class="table-dark" align="center">
                <th>No.</th>
                <th>Id Penerimaan</th>
                <th>Nama Barang</th>
                <th>Stok Diterima</th>
                <th>Satuan Stok</th>
                <th>Tanggal Penerimaan</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php foreach ($penerimaan as $data) { ?>
            <tr>
                <td align="center" style="font-weight: bold;"><?=$i++?></td>
                <td><?=$data->id_penerimaan?></td>
                <td><?=$data->nama_barang?></td>
                <td><?=$data->stok_diterima?></td>
                <td><?=$data->satuan_stok?></td>
                <td><?=$data->tanggal_penerimaan?></td>
            </tr>
        <?php } ?>    
        </tbody>
    </table>

    <?=$this->pagination->create_links();?>

  </div>
  <script src="https://kit.fontawesome.com/50d0739a45.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>

