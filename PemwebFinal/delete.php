<?php
if ( isset($_GET["id"])) {


$servername = "localhost";
$username = "root" ;
$password = "" ;
$database = "pemwebfinal" ;
 // Membuat Koneksi
$connection = new mysqli($servername, $username, $password, $database);

$id = $_GET["id"];
$sql = "DELETE FROM pengguna WHERE id=$id";
$connection->query($sql);

}

header("location: /PemwebFinal/index.php");
exit;
?>