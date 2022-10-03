<!-- marco membuat history.php -->
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
              <b><a class="nav-link active aria-current="page" href="#">Home</a></b>
              </li>
              <li class="nav-item">
                <b><a class="nav-link" href="history.php" >History</a></b>
              </li>
              <li class="nav-item">
                <div class="id=button"></div>
                <a href="logout.php" class="btn btn-primary text-white" style="font-weight:600; width: 100px;">Log Out</a>
              </li>
          </div>
        </div>
      </nav>
        <div class="container mt-3">
        <h3 class="text-center">DAFTAR BUKU</h3>
        <div class="container mx-auto mt-4">
            <form class="d-flex" action="cari.php" method="get">
                <input class="form-control me-2" type="text" placeholder="cari buku" name="cari">
                <input type="submit" value="Cari" class="btn btn-success">
    </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Judul Buku</th>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                        <?php
                            $no=0;
                            $id = $_SESSION['nis'];
                            // history tinggal merubah di sql history
                            $history = mysqli_query($conn, "SELECT * From buku b join detail_peminjam p ON b.id_buku = p.id_buku JOIN peminjaman j ON p.id_peminjam=j.id_peminjaman WHERE j.id_siswa = '$id'");
                            while($data = mysqli_fetch_assoc($history)){
                            mysqli_query($conn, "SELECT * From buku b join detail_peminjam p ON b.id_buku = p.id_buku JOIN peminjaman j ON p.id_peminjam=j.id_peminjaman WHERE j.id_siswa = '$id'") or die(mysqli_error());
                            $no++;
                ?>
                <tr>
                    <td class="text-center" scope="row"><?=$no?></td>
                    <td>
                      <img class="img-thumbnail" src="assets/cover/<?=$data['cover']?>" style="width: 50px;">
                    </td>
                    <td><?=$data['judul']?></td>
                    <td><?=$data['id_peminjaman']?></td>
                    <td><?=$data['tanggal_pengembalian']?></td>
                    <td>
                        <?php
                            $q1 = mysqli_query($conn, "SELECT * FROM peminjaman");

                            $date = date('Y-m-d');
                            // echo $date;
                            $tgl = mysqli_fetch_assoc($q1);
                            $tgl_k = strtotime($tgl['tanggal_pengembalian']);
                            $tgl_s = strtotime($date);
                            // belum bisa jalan statusnya
                            if ($tgl_s > $tgl_k) {
                                echo "dipinjam";
                            } else{
                                echo "telat";                        
                            }
                        ?>
                    </td>
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