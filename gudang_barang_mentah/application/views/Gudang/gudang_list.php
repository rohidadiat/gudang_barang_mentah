<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang</title>
</head>
<body>
    <h1>Barang</h1>
    <a href="<?=site_url('Welcome')?>">Home</a>
    <p>barang</p>
    <?=$this->session->flashdata('msg')?> 
    <a href="<?=site_url('barang/add');?>">Add Pemasukan Barang</a>
    <table border= "1">
        <tr>
			<th>No.</th>
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Satuan Barang</th>
			<th>Action</th>
        </tr>
		<?php $i=1; foreach($gudang as $data) {?>
        <tr>
			<td><?=$i++?></td>
            <td><?=$data->id_barang?></td>
            <td><?=$data->nama_barang?></td>
            <td><?=$data->stok_barang?></td>
            <td><?=$data->satuan_barang?></td>
			<td><a href="<?=site_url('permintaan_pembelian/add/'.$data->id_barang)?>">Tambah Stok</a></td>
        </tr>
		<?php } ?>
    </table>
</body>
</html>
