<!-- dinda membuat cari buku.php -->
<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Buku</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>


<?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<h5>Hasil pencarian : ".$cari."</h5>";
}
?>
<br>

<table class="table table-striped table-hover">
<div class="container mx-auto mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Judul Buku</th>
                    <th>Kota</th>
                    <th>Penerbit</th>
                    <th>Stock</th>
                    <th>Aksi</th>
                </tr>
            </thead>
    <?php
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($conn, "SELECT * FROM buku WHERE judul like '%".$cari."%'"); 
    }
    else{
        $data = mysqli_query($conn, "SELECT * from buku"); 
    
    }   
while($d = mysqli_fetch_array($data)){
?>
<tr>
    <td><?php echo $d['id_buku']; ?></td>
    <td>
    <img src= "assets/cover/<?php echo $d['cover']; ?>" class= "img-thumbnail" alt=""
        style="width: 100px;">
    </td>    
    <td><?php echo $d['penulis']; ?></td>
    <td><?php echo $d['tahun']; ?></td>
    <td><?php echo $d['judul']; ?></td>
    <td><?php echo $d['kota']; ?></td>
    <td><?php echo $d['penerbit']; ?></td>
    <td><?php echo $d['stok'];  ?></td>
    <td><a href="peminjaman.php?id_buku=<?php echo $d['id_buku']; ?>" class="btn btn-primary">Pinjam</a>
    <a href="edit_buku.php?id_buku=<?php echo $d['id_buku']; ?>" class="btn btn-warning">Edit</a>
    <a href="delete.php?id_buku=<?php echo $d['id_buku']; ?>" class="btn btn-danger">Hapus</a>
</td>

</tr>
<?php 
}
?>