<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$email = $_POST['email'];
$pass = $_POST['pass'];
$name = $_POST['name'];

 
// menginput data ke database
mysqli_query($koneksi,"insert into user_login values('','$email','$pass','$name')");
 
// mengalihkan halaman kembali ke index.php
header("location:tables.php");
 
?>