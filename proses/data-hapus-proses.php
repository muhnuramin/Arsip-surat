<?php
include'../koneksi.php';
$no_surat=$_GET['no_surat'];

mysqli_query($db,
	"DELETE FROM arsip
	WHERE no_surat='$no_surat'"
);

header("location:../index.php?p=beranda");
?>