<!-- dinda membuat delete siswa.php -->
<?php
include 'config.php';
$nis = $_GET['nis'];
$delete= mysqli_query($conn, "DELETE FROM siswa WHERE nis=$nis");

if($delete){
    echo "<script>window.location.href='data_siswa.php'</script>";
} else {
    echo "<script>alert('Hapus gagal')</script>";
}
?>