
<div class="head">
	<h1>Arsip Surat</h1>
	<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan,klik "Lihat" pada kolom aksi untuk menapilkan
		surat.</p>
		<FORM CLASS="form-inline" METHOD="POST">
	<div align="right"><form method=post><input type="text" name="pencarian"><input type="submit" name="search" value="search" class="tombol"></form>
	</FORM><br><br>

	<table class="table table-bordered table-striped">
		<thead class="table-dark">
			<tr>
				<th scope="col">Nomor Surat</th>
				<th scope="col">Kategori</th>
				<th scope="col">Judul</th>
				<th scope="col">Waktu Pengarsipan</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
		<?php
			$batas = 5;
			extract($_GET);
			if(empty($hal)){
				$posisi = 0;
				$hal = 1;
				$nomor = 1;
			}else {
				$posisi = ($hal - 1) * $batas;
				$nomor = $posisi+1;
			}
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
				if($pencarian != ""){
					$sql = "SELECT * FROM arsip WHERE Judul LIKE '%$pencarian%'";
					$query = $sql;
					$queryJml = $sql;	
							
				}else {
					$query = "SELECT * FROM arsip LIMIT $posisi, $batas";
					$queryJml = "SELECT * FROM arsip";
					$no = $posisi * 1;
				}
			}else {
				$query = "SELECT * FROM arsip LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM arsip";
				$no = $posisi * 1;
			}
				$q_tampil_dokument = mysqli_query($db, $query);
				if(mysqli_num_rows($q_tampil_dokument)>0){
					while($r_tampil_dokument=mysqli_fetch_array($q_tampil_dokument)){	
						?>
						<tr>
							<td>2021/10/<?php echo $r_tampil_dokument['no_surat']; ?></td>
							<td><?php echo $r_tampil_dokument['Kategori']; ?></td>
							<td><?php echo $r_tampil_dokument['Judul']; ?></td>
							<td><?php echo $r_tampil_dokument['waktu']; ?></td>
							<td>
								<a class="btn btn-warning" target="_blank" href="pages/cetak_kartu.php?no_surat=<?php echo $r_tampil_dokument['no_surat'];?>" class="tombol">Unduh</a>
								<a class="btn btn-danger" href="proses/data-hapus-proses.php?no_surat=<?php echo $r_tampil_dokument['no_surat']; ?>" onclick = "return confirm ('Apakah Anda yakin ingin menghapus arsip surat ini?')" class="tombol">Hapus</a>
								<a class="btn btn-primary" href="index.php?p=detail&no_surat=<?php echo $r_tampil_dokument['no_surat'];?>" class="tombol">Lihat>></a>
							</td>			
						</tr>		
						<?php $nomor++; 
						} 
						
				}else {
					echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
				}?>
	</table>
	<a class="btn btn-secondary" href="index.php?p=inputdata">Arsipkan Surat...</a>
	<?php
		if(isset($_POST['pencarian'])){
			if($_POST['pencarian']!=''){
				echo "<div style=\"float:left;\">";
				$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
				echo "Data Hasil Pencarian: <b>$jml</b>";
				echo "</div>";
			}
		}else {?>
			<div style="float: left;">		
			<?php
				$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
				echo "Jumlah Data : <b>$jml</b>";
			?>			
			</div>
			<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=arsip&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
		</div>	
		<?php
		}
	?>
</div>
<div class="content">

</div>