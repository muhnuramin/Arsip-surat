<?php
include'../koneksi.php';
$no_surat=$_POST['no_surat'];
$Kategori=$_POST['Kategori'];
$Judul=$_POST['Judul'];
// $file=$_POST['file'];
$waktu=date('Y-m-d');;

if(isset($_POST['submit'])){
    extract($_POST);
		$nama_file   = $_FILES['files']['name'];
		if(!empty($nama_file)){
		// Baca lokasi file sementar dan nama file dari form (fupload)
		$lokasi_file = $_FILES['files']['tmp_name'];
		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
		$file_files = $no_surat.".".$tipe_file;

		// Tentukan folder untuk menyimpan file
		$folder = "../dokument/$file_files";
		// Apabila file berhasil di upload
		move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_files="-";

    $sql="INSERT INTO arsip
        VALUES('$no_surat','$Kategori','$Judul','$file_files','$waktu')";
    $query=mysqli_query($db,$sql);
    if (!$query) {
        echo"<script>alert('Data gagal diinput');
        document.location.href='../index.php?p=beranda';
        </script>";
    }else{
        echo"<script>alert('Data berhasil diinput');
        document.location.href='../index.php?p=beranda';
        </script>";
    }
}
?>