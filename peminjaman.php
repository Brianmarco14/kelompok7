<?php
include 'config.php';
session_start();

$id_buku = $_GET['id_buku'];
	$ambil = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku';");
	while($data = mysqli_fetch_assoc($ambil)) {
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

<div class="container card p-3 mt-2">
		<h1 class="text-center">Peminjaman</h1>

		<form action="" method="post" enctype="multipart/form-data">
				<div class="mb-3">
					<label for="" class="form-label">Cover</label>
					<img src="assets/cover/<?php echo $data['cover'] ?>" class= "img-thumbnail" alt="" style="width: 100px;">
            	</div>
				<div class="mb-3">
					<label for="" class="form-label">Kode Buku</label>
					<input type="text" class="form-control" name="id_buku" value="<?php echo $data['id_buku'] ?>"></input>            	
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Judul</label>
					<input type="text" class="form-control" name="judul" value="<?php echo $data['judul'] ?>"></input>				
				</div>
				<div class="mb-3">
					<label for="" class="form-label">NIS</label>
					<input type="text" class="form-control" name="nis" placeholder="Masukkan NIS" required></input>				
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Petugas</label>
					<input type="text" class="form-control" name="nip" value="<?= $_SESSION['nip'] ?>"></input>
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Total</label>
					<input type="number" class="form-control" name="total" ></input>				
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Tanggal Peminjaman</label>
					<input type="date" class="form-control" value="" name="pinjam"></input>				
				</div>
			<div class="text-end">
			<a href="home.php" type="button" class="btn btn-danger"> Kembali </a>
			<button type="submit" name="submit" type="button" class="btn btn-success"> Submit </button>
			<!-- <button type="submit" name="submit" class="btn btn-success">Submit</button> -->
		</div>
		</form>
	</div>


<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php }
?>

<?php
if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nip = $_POST['nip'];	
	$buku = $_POST['id_buku'];
	$pinjam = $_POST['pinjam'];
	$kembali = date('Y-m-d', strtotime('+7 days', strtotime($pinjam)));
	$total = $_POST ['total'];

	$q1 = mysqli_query($conn, "SELECT * FROM buku WHERE id_buku='$id_buku'");
	$r = mysqli_fetch_assoc($q1);
	$stok = $r['stok'];

	$sisa = $stok - $total;
	if ($stok < $total) {
		echo "<script>alert('stock tidak cukup');</script>";

	} else {
		$tambahpinjam = mysqli_query($conn, "INSERT INTO peminjaman (id_siswa, id_petugas, id_buku, tanggal_peminjaman, tanggal_pengembalian) VALUES ('$nis', '$nip', '$id_buku', '$pinjam', '$kembali')");
		if ($tambahpinjam) {
			$que = mysqli_query($conn, "UPDATE buku SET stok='$sisa' WHERE id_buku='$id_buku'");
			echo "<script>alert('berhasil meminjam buku');</script>";
			echo "<script>window.location.href = 'detail_peminjaman.php'</script>";

		}
	}
}

?>