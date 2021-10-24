<script>
    window.print();
</script>
<?php
    include"../koneksi.php";
    $no_surat=$_GET['no_surat'];
    $q_tampil_dokument=mysqli_query($db,"SELECT * FROM arsip WHERE no_surat='$no_surat'");
	$r_tampil_dokument=mysqli_fetch_array($q_tampil_dokument);
    if(empty($r_tampil_dokument['files'])or($r_tampil_dokument['files']=='-')){
        $file = "kosong.pdf";
    }else {
        $file = $r_tampil_dokument['files'];
    }
?>
<div class="head">
    <h1>Arsip Surat</h1>
    <p>Kategori : <?php echo $r_tampil_dokument['Kategori']; ?></p>
    <p>Judul : <?php echo $r_tampil_dokument['Judul']; ?></p>
    <p>Waktu Unggah : <?php echo $r_tampil_dokument['waktu']; ?></p>
    <!-- <embed type="application/pdf" src="../dokument/<?php echo $file?>" width="600" height="400"></embed> -->
<div>