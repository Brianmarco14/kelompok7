<!-- marco membuat delete.php -->
<?php
include 'config.php';
$id_buku = $_GET['id_buku'];
$delete= mysqli_query($conn, "DELETE FROM buku WHERE id_buku=$id_buku");

if($delete){
    echo "<script>window.location.href='home.php'</script>";
} else {
    echo "<script>alert('data gagal')</script>";
}
?>