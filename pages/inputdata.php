<?php
$tgl=date('Y-m-d');
?>
<div class="head">
    <h1>Arsip Surat >> Unggah</h1>
    <p>Unggah Surat telah terbit pada form ini untuk diarsipkan</p>
    <p><b>Catatan : </b></p>
    <ol>
        <li>Gunakan file berformat PDF</li>
    </ol>
    <br><br>
    <form action="proses/data-input-proses.php" method="POST" enctype="multipart/form-data">
        <div class="form-group row mb-4">
            <label for="no_surat" class="col-sm-2 col-form-label">No. Surat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_surat" placeholder="No. Surat" name="no_surat">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="Kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <select class="form-select" id="Kategori" placeholder="Kategori" name='Kategori'>
                    <option value="Undangan">Undangan</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Pemberitahuan">Pemberitahuan</option>
                </select>
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Judul" placeholder="Judul" name="Judul">
            </div>
        </div>
        <div class="form-group row mb-4">
            <label for="file" class="col-sm-2 col-form-label">file</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="file" name="files">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-info" href="http://">Kembali</a>
    </form>
</div>