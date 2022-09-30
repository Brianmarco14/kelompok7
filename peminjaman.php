<?php
include 'config.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
		<h1 class="text-center">Peminjaman</h1>

		<form action="" method="post" enctype="multipart/form-data">
			<table class="table table-striped">
				<tbody>
				<tr>
						<td>NIS</td>
						<td><input type="text" class="form-control" name="nis" placeholder="Masukkan NIS" required></input></td>
					</tr>
					<tr>
						<td>Petugas</td>
						<td><input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip'] ?>"></input></td>
					</tr>
				<?php
					$id_buku = $_GET['id_buku'];
					$ambil = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku = $id_buku");
					while($data = mysqli_fetch_assoc($ambil)) {
				?>
                    <tr>
						<td>Cover</td>
						<td><img src="assets/cover/<?php echo $data['cover'] ?>" class= "img-thumbnail" alt="" style="width: 200px;"></td>
					</tr>
					<tr>
						<td>Kode Buku</td>
						<td><input type="text" class="form-control" name="kode_buku" value="<?php echo $data['id_buku'] ?>" disabled></input></td>
					</tr>
					<tr>
					<td>Judul</td>
					<td><input type="text" class="form-control" name="kode_buku" value="<?php echo $data['judul'] ?>" disabled></input></td>
					</td>
					</tr>
						<td>Total</td>
						<td><input type="number" class="form-control" name="stok" value="<?php echo $data['stok'] ?>" disabled></input></td>
					</tr>
					<?php
						}
					?>
					<tr>
						<td>Tanggal Peminjaman</td>
						<td><input type="date" class="form-control" name="pinjam"></input></td>
					</tr>
					<tr>
					<td>Tanggal Pengembalian</td>
						<td><input type="date" class="form-control" name="kembali"></input></td>
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
	$nis = $_POST['nis'];
	$nip = $_POST['nip'];
	$pinjam = $_POST['pinjam'];
	$kembali = $_POST['kembali'];


	$query_insert = mysqli_query($conn, "INSERT INTO peminjaman(id_siswa, id_petugas, tanggal_peminjaman, tanggal_pengembalian)
	VALUES ('$nis','$nip', '$pinjam', '$kembali')");

	echo "<script>alert('Data telah disimpan');window.location.href='home.php'</script>";
}

?>