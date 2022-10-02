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
    <title>Detail Peminjaman</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container card p-3 mt-2">
		<h1 class="text-center">Detail Peminjaman</h1>
		
		<form action="" method="post" enctype="multipart/form-data">
				<?php
					$ambil = mysqli_query($conn, "SELECT * FROM  detail_peminjam RIGHT JOIN peminjaman ON detail_peminjam.id_peminjam=peminjaman.id_peminjaman RIGHT JOIN siswa ON peminjaman.id_siswa=siswa.nis RIGHT JOIN kelas ON siswa.id_kelas=kelas.id_kelas LEFT JOIN buku ON detail_peminjam.id_buku=buku.id_buku ORDER BY peminjaman.id_peminjaman DESC LIMIT 1;");
					while($data = mysqli_fetch_assoc($ambil)) {
				?>
				<div class="mb-3">
					<label for="" class="form-label">id</label>
					<input type="text" class="form-control" name="id" value="<?php echo $data['id_peminjaman'] ?>" disabled></input>            	
				</div>
				<div class="mb-3">
					<label for="" class="form-label">NIS</label>
					<input type="text" class="form-control" name="nis" value="<?php echo $data['nis'] ?>" disabled></input>            	
				</div>
				<div class="mb-3">
					<label for="" class="form-label">nama</label>
					<input type="text" class="form-control" name="nama" value="<?php echo $data['nama'] ?>" disabled></input>            	
				</div>
				<div class="mb-3">
					<label for="" class="form-label">kelas</label>
					<input type="text" class="form-control" name="kelas" value="<?php echo $data['nama_kelas'] ?>" disabled></input>            	
				</div>
				<div class="mb-3">
					<label for="" class="form-label">tanggal_peminjaman</label>
					<input type="text" class="form-control" name="kelas" value="<?php echo $data['tanggal_peminjaman'] ?>" disabled></input>            	
				</div>
				<div class="mb-3">
					<label for="" class="form-label">tanggal_pengembalian</label>
					<input type="text" class="form-control" name="kelas" value="<?php echo $data['tanggal_pengembalian'] ?>" disabled></input>            	
				</div>
				 <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Cover</th>
                    <th>Judul Buku</th>
                    <th>Qty</th>
                </tr>
            </thead>
            <tbody>    
            <tr>
                <td><?= $data['id_buku'] ?></td>
                <td>
                <img src= "assets/cover/<?= $data['cover'] ?>" class= "img-thumbnail" alt=""
                    style="width: 100px;">
                </td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['stok'] ?></td>
			</tr>
            
            <?php
            }
            ?>
            </tbody>
        </table>
		<div class="text-end">
			<a href="home.php" type="button" class="btn btn-danger"> Batal </a>
			<button type="submit" name="submit" class="btn btn-success">Submit</button>
		</div>
		</form>
	</div>


<script src="assets/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
