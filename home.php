<?php

include "config.php";
session_start();
if(!$_SESSION['nama']){
  header("Location: login_admin.php");
}

?>

<!-- dinda -->
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
              <b><a class="nav-link active" active aria-current="page" href="#">Home</a></b>
              </li>
              <li class="nav-item">
                <b><a class="nav-link" href="data_siswa.php" >Siswa</a></b>
              </li>
              <li class="nav-item">
                <b><a class="nav-link" href="data_peminjaman.php" >Peminjaman</a></b>
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
        <div class="container mt-3 card p-5 shadow ">
        <h3 class="text-center">DAFTAR BUKU</h3>
        <a href="create_buku.php" class="btn btn-primary">Tambah Buku</a>
        <div class="container mx-auto mt-4">
          <form class="d-flex" action="cari_buku.php" method="get">
              <input class="form-control me-2" type="text" placeholder="cari buku" name="cari">
              <input type="submit" value="Cari" class="btn btn-success">
          </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Judul Buku</th>
                    <th>Kota</th>
                    <th>Penerbit</th>
                    <th>Stock</th>
                    <th>Pinjam Buku</th>
                    <th>Aksi</th>

                </tr>
            </thead>
            <tbody>

            <?php

            $ambil = mysqli_query($conn, "SELECT * FROM buku");
            while ($data = mysqli_fetch_array($ambil)) {
                
            ?>
            
            <tr>
                <td><?= $data['id_buku'] ?></td>
                <td>
                <img src= "assets/cover/<?= $data['cover'] ?>" class= "img-thumbnail" alt=""
                    style="width: 100px;">
                </td>
                <td><?= $data['penulis'] ?></td>
                <td><?= $data['tahun'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td><?= $data['kota'] ?></td>
                <td><?= $data['penerbit'] ?></td>
                <td><?= $data['stok'];  ?></td>
                <td><a href="peminjaman.php?id_buku=<?= $data['id_buku'] ?>" class="btn btn-primary">Pinjam</a></td>
                <td><a href="edit_buku.php?id_buku=<?= $data['id_buku'] ?>" class="btn btn-warning">Edit</a>
                <td><a href="delete.php?id_buku=<?= $data['id_buku'] ?>" class="btn btn-danger">Hapus</a></td>
            </tr>
            
            <?php
            }
            ?>
          
            </tbody>
        </table>
    </div>
        </div>
    </div>
        
</body>
</html>