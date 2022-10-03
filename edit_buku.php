<!-- dinda membuat edit siswa.php -->
<?php
include 'config.php';

$id = $_GET['id_buku'];
$ambil = mysqli_query($conn, "SELECT * FROM buku WHERE Id_buku='$id'");
while($data = mysqli_fetch_array($ambil)){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
		<h1 class="text-center">Edit Buku</h1>
		<form action="" method="post" enctype="multipart/form-data">
        <form>
            <div class="mb-3">
            <label for="nis" class="form-label">ID</label>
            <input type="number" name="id" class="form-control" id="nis" value="<?= $data['id_buku'] ?>">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Penulis</label>
            <input type="text" name="penulis" class="form-control" id="penulis" value="<?= $data['penulis'] ?>">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Tahun</label>
            <input type="text" name="tahun" class="form-control" id="tahun" value="<?= $data['tahun'] ?>">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Judul</label>
            <input type="text" name="judul" class="form-control" id="judul" value="<?= $data['judul'] ?>">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Kota</label>
            <input type="text" name="kota" class="form-control" id="kota" value="<?= $data['kota'] ?>">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Penerbit</label>
            <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $data['penerbit'] ?>">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Cover</label>
            <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $data['penerbit'] ?>">
         </div>
         <div class="mb-3">
            <label for="nama" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" id="stok" value="<?= $data['stok'] ?>">
         </div>
         
         <div class="text-end">
			<a href="home.php" type="button" class="btn btn-danger"> Kembali </a>
			<button type="submit" name="submit" class="btn btn-success">Submit</button>
		</div>

<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
}
?>
<?php


if (isset($_POST['submit'])) {
    $id_buku = $_POST['id'];
	$penulis = $_POST['penulis'];
	$tahun = $_POST['tahun'];
	$judul = $_POST['judul'];
	$kota = $_POST['kota'];
	$penerbit = $_POST['penerbit'];
    $cover = $_POST['penerbit'];
    $stok = $_POST['stok'];

	$query = mysqli_query($conn, "UPDATE buku SET penulis='$penulis', tahun='$tahun', judul='$judul', kota='$kota', penerbit='$penerbit', stok='$stok' WHERE id_buku='$id_buku'");

	echo "<script>alert('Data telah diupdate');
	document.location='home.php'</script>";
}

?>