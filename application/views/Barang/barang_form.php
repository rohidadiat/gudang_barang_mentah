<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
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
          <li class="breadcrumb-item"><a href="<?=site_url('barang')?>" class="text-secondary" style="text-decoration:none;"><i class="fa-solid fa-store"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Form Barang</li>
        </ol>
    </nav>


    <?php
	$id='';
	$nama='';
	$jenis='';
	$warna='';
	$stok='';
	$satuan='';
	if(isset($barang)){
        $id=$barang->id_barang;
		$nama=$barang->nama_barang;
        $jenis=$barang->jenis_barang;
        $warna=$barang->warna_barang;
		$stok=$barang->stok_barang;
		$satuan=$barang->satuan_barang;
	}
	?>
    <div class="container text-center">
    <div class="row">
        <div class="col-md-3"></div>
	<!-- Form -->
    <div class="col px-5 mx-4 justify-content-center rounded shadow p-3 mb-5 bg-body-tertiary">
        <h2 style="text-align: center;" class="text-secondary pt-3"><i class="fa-solid fa-store"></i> Form Barang</h2>
        <hr class="my-4">
        
        <!-- From -->
        <form class="d-flex row g-3" action="" method="post">
            <div class="input-group row my-2 justify-content-center">
                <div class="col">
                    <label for="" class="form-label h5 text-secondary mt-1">Id Barang</label>
                </div>
                <div class="col">
                    <input class="form-control" name="id_barang" value="<?=$id?>" type="text" placeholder="Id Barang" required>
                </div>
            </div>
            <div class="input-group row my-2 justify-content-center">
                <div class="col">
                    <label for="" class="form-label h5 text-secondary mt-1">Nama Barang</label>
                </div>
                <div class="col">
                    <input class="form-control" name="nama_barang" value="<?=$nama?>" type="text" placeholder="nama Barang" required>
                </div>
            </div>
            <div class="input-group row my-2 justify-content-center">
                <div class="col">
                    <label for="" class="form-label h5 text-secondary mt-1">Jenis Barang</label>
                </div>
                <div class="col">
                    <select name="jenis_barang" class="form-select" aria-label="Default select example" required>
						<option <?=$jenis?'selected':''?>><?=$jenis?"$jenis":'-- Pilih Jenis --'?></option>
                        <option value="Kain">Kain</option>
                        <option value="Kancing">Kancing</option>
                        <option value="Reselting">Reselting</option>
                        <option value="Benang">Benang</option>
                    </select>
                </div>
            </div>
            <div class="input-group row my-2 justify-content-center">
                <div class="col">
                    <label for="" class="form-label h5 text-secondary mt-1">Warna Barang</label>
                </div>
                <div class="col">
                    <select name="warna_barang" class="form-select" aria-label="Default select example" required>
						<option <?=$warna?'selected':''?>><?=$warna?"$warna":'-- Pilih Warna --'?></option>
                        <option value="Merah">Merah</option>
                        <option value="Kuning">Kuning</option>
                        <option value="Hijau">Hijau</option>
                        <option value="Biru">Biru</option>
                        <option value="Ungu">Ungu</option>
                    </select>
                </div>
            </div>
            <div class="input-group row my-2 justify-content-center">
                <div class="col">
                    <label for="" class="form-label h5 text-secondary mt-1">Stok Barang</label>
                </div>
                <div class="col">
                    <input class="form-control" name="stok_barang" value="<?=$stok?>" type="number" placeholder="Stok Barang" required>
                </div>
            </div>
            <div class="input-group row my-2 justify-content-center">
                <div class="col">
                    <label for="" class="form-label h5 text-secondary mt-1">Satuan Barang</label>
                </div>
                <div class="col">
                    <select name="satuan_barang" class="form-select" aria-label="Default select example" required>
						<option <?=$satuan?'selected':''?>><?=$satuan?"$satuan":'-- Pilih Satuan --'?></option>
                        <option value="Pcs">Pcs</option>
                        <option value="Roll">Roll</option>
                        <option value="Dus">Dus</option>
                        <option value="Kodi">Kodi</option>
                        <option value="Pack">Pack</option>
                    </select>
                </div>
            </div>

            <!-- Button -->
            <div class="input-group row my-2 justify-content-center pb-3">
                <div class="col" style="text-align: right;">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
                </div>
                <div class="col" style="text-align: left;">
                    <a href="<?=site_url('barang')?>"><input type="button" class="btn btn-secondary" value="Batal"></a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-3"></div>
    </div>
</div>
	<script src="https://kit.fontawesome.com/50d0739a45.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
