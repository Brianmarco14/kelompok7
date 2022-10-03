<!-- dinda membuat data siswa.php -->
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
        <div class="container mt-3">
        <h3 class="text-center">DATA PEMINJAMAN</h3>
        <div class="container mx-auto mt-4">
            <form class="d-flex" action="cari_siswa.php" method="get">
                <input class="form-control me-2" type="text" placeholder="cari data" name="cari">
                <input type="submit" value="Cari" class="btn btn-success">
    </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID Peminjaman</th>
                    <th>Nama Siswa</th>
                    <th>Nama Petugas</th>
                    <th>Judul Buku</th>
                    <th>cover</th>
                    <th>Jumlah</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>

            <?php

            $ambil = mysqli_query($conn, "SELECT * FROM detail_peminjam RIGHT JOIN peminjaman ON id_peminjam = peminjaman.id_peminjaman RIGHT JOIN buku ON peminjaman.id_buku = buku.id_buku RIGHT JOIN siswa ON peminjaman.id_siswa = siswa.nis RIGHT JOIN petugas ON peminjaman.id_petugas=petugas.nip ORDER BY peminjaman.id_peminjaman ASC ;");
            while ($data = mysqli_fetch_array($ambil)) {
                
            ?>
            
            <tr>
                <td><?= $data['id_peminjaman'] ?></td>
                <td><?= $data['nama_siswa'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['judul'] ?></td>
                <td>
                <img src= "assets/cover/<?= $data['cover'] ?>" class= "img-thumbnail" alt=""
                    style="width: 100px;">
                </td>
                <td><?= $data['kuantitas'] ?></td>
                <td><?= $data['tanggal_peminjaman'] ?></td>
                <td><?= $data['tanggal_pengembalian'] ?></td>
                <td><?= $data['status'] ?></td>
                
    
    <!-- $q1 = mysqli_query($conn, "SELECT * FROM peminjaman");

    $date = date('Y-m-d');
    // echo $date;
    $tgl = mysqli_fetch_assoc($q1);
    $tgl_k = strtotime($tgl['tanggal_pengembalian']);
    $tgl_s = strtotime($date);
    $status = $tgl['status'];
      if ($tgl_s > $tgl_k) {
       echo $tgl['status'];      -->
      <!-- // } else {
      //   $tgl['status'];
      }
    // elseif ($tgl_s > $tgl_k) {
    //     echo "Telat";
    // }else{
    //     echo "dipinjam";
    // }     -->
    

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