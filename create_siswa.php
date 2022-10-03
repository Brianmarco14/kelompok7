<!-- dinda membuat create siswa.php -->
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

<div class="container">
		<h1 class="text-center">Tambah Siswa</h1>
		<form action="" method="post" enctype="multipart/form-data">
        <form>
            <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" name="nis" class="form-control" id="nis" aria-describedby="nis">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama">
         </div>
         <div class="mb-3">
         <label for="jenis_kelamin">Jenis Kelamin</label>
         <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L">
            <label class="form-check-label" for="flexRadioDefault1"> Laki-laki</label>
        </div>
        <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P">
        <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
    </div>

         <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat">
         </div>
         <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select class="form-select" name="id_kelas">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM kelas ");
            while ($data = mysqli_fetch_array($sql)){
            ?>
            <option value="<?= $data['id_kelas']?>"><?= $data['nama_kelas']?></option>;
            <?php if ($data['id_kelas'] == $data['nama_kelas']){
                echo "selected"; } 
                ?>
            <?php
            } ?>
            </select>
        </div>
         
         <div class="text-end">
			<a href="data_siswa.php" type="button" class="btn btn-danger"> Kembali </a>
			<button type="submit" name="submit" class="btn btn-success">Submit</button>
		</div>

<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php


if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$id_kelas = $_POST['id_kelas'];

	$query_insert = mysqli_query($conn, "INSERT INTO siswa(nis, nama_siswa, jenis_kelamin, alamat, id_kelas)
	VALUES ('$nis','$nama', '$jenis_kelamin', '$alamat', '$id_kelas')");

	echo "<script>alert('Data telah disimpan');
	document.location='data_siswa.php'</script>";
}

?>