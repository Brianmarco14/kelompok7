<!-- marco menyambung dengan config -->
<?php

include 'config.php';
session_start();

if(isset($_POST['login'])){
    $nis = $_POST['nis'];

    $query =mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis'");
    $data = mysqli_fetch_assoc($query);

        $_SESSION['nis'] = $data['nis'];
        if($nis == $data['nis']){
            echo "<script>window.location.href='siswa_home.php'</script>";
        } else{
            echo "<script>alert('Nomor Induk Siswa belum terdaftar!')</script>";
        }
};
?>

<!-- dinda -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<nav class="navbar fixed-top  navbar-expand-lg bg-light">
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
          </div>
        </div>
      </nav>
    <div class="login-wrapper d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="input-wrapper p-4 w-25 bg-secondary rounded-4 bg-opacity-25 shadow">
            <form action="" method="POST">
                <h2 class="text-center">Login Siswa</h2>
                <div class="my-4">
                    <label for="" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="nis" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </form>
            <p>Bukan siswa? </p><a href="login_admin.php">Login sebagai admin</a>
        </div>
    </div>

</body>
</html>