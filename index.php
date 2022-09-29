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
    <div class="login-wrapper d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="input-wrapper p-4 w-25 bg-secondary rounded-4 bg-opacity-25">
            <form action="" method="POST">
                <h2 class="text-center">Login Siswa</h2>
                <div class="my-4">
                    <label for="" class="form-label">NIS</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="username">
                </div>
                <div class="text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <p>Bukan siswa? </p><a href="#">Login sebagi admin</a>
        </div>
    </div>

</body>
</html>