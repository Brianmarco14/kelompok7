<?php
include 'config.php';

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
						<td>Cover</td>
						<td><input type="text" class="form-control" name="cover" required></input></td>
					</tr>
					<tr>
						<td>Kode Buku</td>
						<td><input type="text" class="form-control" name="kode_buku" placeholder="Masukkan Kode Buku" required></input></td>
					</tr>
                    <div>
						<td>Judul</td>
						<td><select class="" name="judul"></td>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM buku");
                    while ($data = mysqli_fetch_array($sql)){
                    ?>
                    <option value="<?= $data['id_buku']?>"><?= $data['judul']?></option>;
                    <?php if ($data['id_buku'] == $data['judul']){
                        echo "selected"; } 
                        ?>
                        <?php
                    } ?>
            </select>
                </div>
					<tr>
						<td>NIS</td>
						<td><input type="text" class="form-control" name="NIS" placeholder="Masukkan NIS Siswa" required></input></td>
					</tr>
					<tr>
						<td>Petugas</td>
						<td><input type="text" class="form-control" name="petugas" placeholder="Masukkan Nama Petugas" required></input></td>
					</tr>
					<tr>
						<td>Total</td>
						<td><input type="number" class="form-control" name="total" placeholder="Masukkan Total Buku" required></input></td>
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
	$kode_buku = $_POST['kode_buku'];
	$judul = $_POST['judul'];
	$NIS = $_POST['NIS'];
	$petugas = $_POST['petugas'];
    $total = $_POST['total'];

	$query_insert = mysqli_query($conn, "INSERT INTO buku(penulis, tahun, judul, kota, penerbit, cover, stok)
	VALUES ('$penulis','$tahun', '$judul', '$kota', '$penerbit', '$file', '$stok')");

	echo "<script>alert('Data telah disimpan');
	document.location='home.php'</script>";
}

?>