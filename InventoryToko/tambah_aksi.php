<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$name = $_POST['name'];
$merek = $_POST['merek'];
$jumlah = $_POST['jumlah'];
$tempat = $_POST['tempat'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into gudang values('','$name','$merek','$jumlah','$tempat')");
 
// mengalihkan halaman kembali ke index.php
header("location:tables.php");
 
?>