<!-- dinda membuat edit siswa.php -->
<?php
include 'config.php';

$id = $_GET['nis'];
$ambil = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$id'");
while($data = mysqli_fetch_array($ambil)){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container">
		<h1 class="text-center">Edit Siswa</h1>
		<form action="" method="post" enctype="multipart/form-data">
        <form>
            <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" name="nis" class="form-control" id="nis" value="<?= $data['nis'] ?>">
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $data['nama_siswa'] ?>">
         </div>
         <div class="mb-3">
         <label for="jenis_kelamin">Jenis Kelamin</label>
         <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="L" 
            <?php if($data['jenis_kelamin']=='L') echo 'checked'?>>
            <label for="">Laki-laki</label>
        </div>
        <div class="form-check mb-2">
        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="P" 
        <?php if($data['jenis_kelamin']=='P') echo 'checked'?>>
        <label for="">Perempuan</label>
    </div>

         <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $data['alamat']?>">
         </div>
         <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select class="form-control" name="nama_kelas">
            <?php
            // echo "<option value=$data[id_kelas]>$data[nama_kelas]</option>";
            $sql = mysqli_query($conn, "SELECT * FROM kelas");
            while($ulang = mysqli_fetch_array($sql)){
                if ($ulang['id_kelas'] == $data ['id_kelas']) { ?>
                <option selected value="<?=$ulang['id_kelas']?>"><?=$ulang['nama_kelas']?></option>
            <?php } ?>
            <option value="<?= $ulang['id_kelas']?>"><?= $ulang['nama_kelas']?></option>
            <?php } ?>
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
}
?>
<?php


if (isset($_POST['submit'])) {
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$alamat = $_POST['alamat'];
	$kelas = $_POST['nama_kelas'];

	$query = mysqli_query($conn, "UPDATE siswa SET nis='$nis', nama_siswa='$nama', jenis_kelamin='$jenis_kelamin', alamat='$alamat', id_kelas='$kelas' WHERE nis='$id'");

	echo "<script>alert('Data telah diupdate');
	document.location='data_siswa.php'</script>";
}

?>