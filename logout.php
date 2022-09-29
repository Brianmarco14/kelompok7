<!-- marco membuat fungsi logout -->
<?php 
session_start();
session_destroy();
header("Location: login_siswa.php");
?>