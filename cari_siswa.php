<!-- dinda membuat cari siswa.php -->
<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container mx-auto mt-4">
<table class="table table-striped table-hover">
<?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<h5>Hasil pencarian : ".$cari."</h5>";
}
?>
<br>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Kelas</th>
                </tr>
            </thead>
    <?php
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $data = mysqli_query($conn, "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas where nama_siswa like '%".$cari."%'"); 
    }
    else{
        $data = mysqli_query($conn, "SELECT * from siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas"); 
    
    }   
while($d = mysqli_fetch_array($data)){
?>
<tr>
    <td><?php echo $d['nis']; ?></td>
    <td><?php echo $d['nama_siswa']; ?></td>
    <td><?php echo $d['jenis_kelamin']; ?></td>
    <td><?php echo $d['alamat']; ?></td>
    <td><?php echo $d['nama_kelas']; ?></td>
</tr>
<?php 
}
?>