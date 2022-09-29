<?php
include 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
		<h1 class="text-center">Tambah Buku</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-striped">
				<tbody>
					<tr>
						<td>Penulis</td>
						<td><input type="text" class="form-control" name="penulis" placeholder="Masukkan Nama Penulis" required></input></td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td><input type="number" class="form-control" name="tahun" placeholder="Masukkan Tahun Buku" required></input></td>
					</tr>
					<tr>
						<td>Judul</td>
						<td><input type="text" class="form-control" name="judul" placeholder="Masukkan Judul Buku" required></input></td>
					</tr>
					<tr>
						<td>Kota</td>
						<td><input type="text" class="form-control" name="kota" placeholder="Masukkan Kota" required></input></td>
					</tr>
					<tr>
						<td>Penerbit</td>
						<td><input type="text" class="form-control" name="penerbit" placeholder="Masukkan Penerbit" required></input></td>
					</tr>
					<tr>
						<td>Cover Buku</td>
						<td><input type="file" class="form-control" name="cover" required></input></td>
					</tr>
					<tr>
						<td>Stok</td>
						<td><input type="number" class="form-control" name="stok" placeholder="Masukkan Jumlah Buku" required></input></td>
					</tr>
				</tbody>
			</table>
			<div class="text-end">
			<a href="home.php" type="button" class="btn btn-danger"> Kembali </a>
			<button type="submit" name="submit" class="btn btn-success">Submit</button>
		</div>
		</form>
	</div>


<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php


if (isset($_POST['submit'])) {
	$penulis = $_POST['penulis'];
	$tahun = $_POST['tahun'];
	$judul = $_POST['judul'];
	$kota = $_POST['kota'];
	$penerbit = $_POST['penerbit'];
    $file = $_FILES['cover']['name'];
    $tmp_name = $_FILES['cover']['tmp_name'];
    $upload = move_uploaded_file($tmp_name, 'assets/cover/'.$file);

	$stok = $_POST['stok'];

	$query_insert = mysqli_query($conn, "INSERT INTO buku(penulis, tahun, judul, kota, penerbit, cover, stok)
	VALUES ('$penulis','$tahun', '$judul', '$kota', '$penerbit', '$file', '$stok')");

	echo "<script>alert('Data telah disimpan');
	document.location='home.php'</script>";
}

?>