<?php
include 'koneksi.php';
$id = $_GET['id'];
// DELETE
mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang='$id'");
header("location:index.php");
?>