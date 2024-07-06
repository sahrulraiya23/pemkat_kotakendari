<?php
$id_pengaduan = $_GET['id_pengaduan'];
$querypengaduan = "SELECT*FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE id_pengaduan='$id_pengaduan'";
$querytanggapan = "SELECT*FROM tanggapan JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE id_pengaduan='$id_pengaduan'";
$sqlpengaduan = mysqli_query($koneksi, $querypengaduan);
$sqltanggapan = mysqli_query($koneksi, $querytanggapan);
?>
<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Pengaduan</a>
            </li>
        </ul>
        <div class="card-header-right">

        </div>
    </div>
    <?php
    while ($data = mysqli_fetch_array($sqlpengaduan)) {
    ?>
        <div class="card-block table-border-style">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['status']; ?>" placeholder="Masukkan no. telpon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Pengaduan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['tgl_pengaduan']; ?>" placeholder="Masukkan no. telpon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['nik']; ?>" placeholder="Masukkan no. telpon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pengirim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['nama']; ?>" placeholder="Masukkan no. telpon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bukti</label>
                <div class="col-sm-10">
                    <?php
                    $bukti = explode(",", $data['bukti']); // Jika bukti berupa daftar file, pisahkan dengan koma
                    foreach ($bukti as $file) {
                        $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                            echo '<img src="../bukti/' . $file . '" style="width: 300px; height: auto;" alt="Bukti Pengaduan"><br>';
                        } elseif (in_array($file_extension, array('mp4', 'webm', 'ogg'))) {
                            echo '<video width="320" height="240" controls><source src="../bukti/' . $file . '" type="video/mp4">Your browser does not support the video tag.</video><br>';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lokasi</label>
                <div class="col-sm-10">
                    <iframe src="https://www.google.com/maps?q=<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>&hl=es;z=14&output=embed" style='width:100%' height="100%" frameborder="0"></iframe>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isi Laporan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['isi_laporan']; ?>" placeholder="Masukkan no. telpon">
                </div>
            </div>

        </div>
        <div class="card-header">
            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Tanggapan Petugas</a>
                </li>
            </ul>
            <div class="card-header-right">

            </div>
        </div>
    <?php
    }
    while ($data = mysqli_fetch_array($sqltanggapan)) {
    ?>
        <div class="card-block table-border-style">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Tanggapan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['tgl_tanggapan']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Petugas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" disabled value="<?php echo $data['nama_petugas'];
                                                                            echo " - ";
                                                                            echo strtoupper($data['level']); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Isi Tanggapan</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" col="30" disabled rows="10"><?php echo $data['tanggapan']; ?></textarea>
                </div>
            </div>
            <button class="btn btn-round btn-sm btn-warning" type="button" onclick="window.history.back();">Kembali</button>
        </div>
    <?php  } ?>
</div>