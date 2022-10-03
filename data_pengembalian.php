<!-- dinda membuat data pengembalian.php -->
<?php
session_start();
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/book-icon.png" alt="Logo" width="30" height="24">
    </a>
          <a class="navbar-brand" href="#">Perpustakaan 7</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <b><a class="nav-link" active aria-current="page" href="home.php">Home</a></b>
              </li>
              <li class="nav-item">
                <b><a class="nav-link" href="data_siswa.php" >Siswa</a></b>
              </li>
              <li class="nav-item">
                <b><a class="nav-link active" href="data_peminjaman.php" >Peminjaman</a></b>
              </li>
              <li class="nav-item">
                <b><a class="nav-link" href="data_pengembalian.php">Pengembalian</a></b>
              </li>
              <li class="nav-item">
                <div class="id=button"></div>
              <a href="logout.php" class="btn btn-primary text-white" style="font-weight:600; width: 100px;">Log Out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container card p-3 mt-2">
		<h1 class="text-center">Pengembalian</h1>

		<form action="" method="post" enctype="multipart/form-data">
					<div class="mb-3">
            <label class="form-label">ID Peminjaman</label>
            <select class="form-select" name="id_pinjam">
            <?php
            $sql = mysqli_query($conn, "SELECT * FROM peminjaman ");
            while ($data = mysqli_fetch_array($sql)){
            ?>
            <option value="<?= $data['id_peminjaman']?>"><?= $data['id_peminjaman']?></option>;
            <?php if ($data['id_peminjaman'] == $data['id_peminjaman']){
                echo "selected"; } 
                ?>
            <?php
            } ?>
            </select>
				</div>
				<div class="mb-3">
					<label for="" class="form-label">Tanggal Pengembalian</label>
					<input type="date" class="form-control" name="kembali" value="<?php echo $data['kembali'] ?>"></input>				
				</div>
        <div class="mb-3">
					<label for="" class="form-label">Buku Ada</label>
					<input type="number" class="form-control" name="ada" value="<?php echo $data['ada'] ?>"></input>				
				</div>
        <div class="mb-3">
					<label for="" class="form-label">Buku Hilang</label>
					<input type="number" class="form-control" name="hilang" value="<?php echo $data['hilang'] ?>"></input>				
				</div>	
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $id_pinjam = $_POST['id_pinjam'];
  $kembali = $_POST['kembali'];
  $ada = $_POST['ada'];
  $hilang = $_POST['hilang'];

  $q1 = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id_peminjaman='$id_pinjam'");
  $r = mysqli_fetch_assoc($q1);
  $tgl_asli = $r['tanggal_pengembalian'];
  $diff = date_diff(date_create($tgl_asli), date_create($kembali));
  $hari = $diff->format('%a');
  $denda = $hari * 1000;

  $tambahkembali = mysqli_query($conn, "INSERT INTO pengembalian (id_peminjaman, tanggal_pengembalian, denda) VALUES ('$id_pinjam', '$kembali', '$denda')");
  if ($tambahkembali) {
    $last_id = mysqli_insert_id($conn);
    $q2 = mysqli_query($conn, "INSERT INTO detail_pengembalian (id_pengembalian, ada, hilang) VALUES ('$last_id', '$ada', '$hilang')");
    if ($q2) {
      echo "<script>alert('Berhasil mengembalikan buku.')</script>";
      echo "<script>alert window.location.href = 'data_pengembalian.php' </script>";
    }
  }
}

?>