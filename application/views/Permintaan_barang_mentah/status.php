<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerimaan Barang</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <?php
        $id_permintaan_barang='';
        $id_barang='';
        $stok_barang='';
        $satuan_barang='';
        $status='';

        if(isset($barang_mentah)){
            $id_permintaan_barang=$barang_mentah->id_permintaan_barang;
            $id_barang=$barang_mentah->id_barang;
            $stok_barang=$barang_mentah->stok_barang;
            $satuan_barang=$barang_mentah->satuan_barang;
            $status=$barang_mentah->status; 
        }
    ?>

    <h2>Perubahan Status Permintaan Barang Mentah</h2>
    <hr>
    <form action="" method="post">
        <table>
            <tr>
                <td>ID Permintaan Barang </td>
                <td>
                    <input type="text" name="id_permintaan_barang" value="<?=$id_permintaan_barang?>" disabled>
                </td>
            </tr>
            <tr>
                <td>ID Barang</td>
                <td>
                    <input type="text" name="id_permintaan_barang" value="<?=$id_barang?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td>
                    <input type="number" name="stok_diminta" value="<?=$stok_barang?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Satuan</td>
                <td>
                    <input type="text" name="satuan_stok" value="<?=$satuan_barang?>" disabled>
                </td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                <input type="radio" id="" name="status" value="0"<?=$status=='0'?'checked':''?> redirect>Pending
                <input type="radio" id="" name="status" value="1"<?=$status=='1'?'checked':''?> redirect>Accepted
                <input type="radio" id="" name="status" value="2"<?=$status=='2'?'checked':''?> redirect>Rejected
                </td>
            </tr>
            </table>
            
            <input type="submit" name="submit" class="btn btn-primary" value="Simpan"></input>
            <a href="<?=site_url('permintaan_barang_mentah')?>"><input type="button" class="btn btn-primary" value="Batal"></a>
    </form>    
    
    <script src="https://kit.fontawesome.com/50d0739a45.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
