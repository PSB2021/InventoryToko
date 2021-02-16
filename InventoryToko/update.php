<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$merek = $_POST['merek'];
$jumlah = $_POST['jumlah'];
$tempat = $_POST['tempat'];
 
// update data ke database
mysqli_query($koneksi,"update gudang set nama='$nama', merek='$merek', jumlah='$jumlah', tempat='$tempat' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
header("location:tables.php");
 
?>