<?php
include 'koneksi.php';
$nik = "";
$tanggal = "";
$isi_laporan = "";
$status = "";

$id = $_GET['id_pengaduan'];
$query = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'";
$sql = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="col-12 col-lg-10 mx-auto">
        <div class="card radius-15">
            <div class="container mt-5">
                <div class="section-title">
                    <h2>Edit Laporan</h2>
                </div>
                <div class="card-body p-bd-5">
                    <form action="" method="post" class="myForm" enctype="multipart/form-data">
                        <div class="form-group row ">
                            <label class="col-sm-2" class="col-sm-2" for="tgl_pengaduan">Tanggal</label>
                            <div class="col-sm-10">

                                <input type="date" name="tgl_pengaduan" id="tgl_pengaduan" value="<?php echo $data['tgl_pengaduan']; ?>" class="form-control">

                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="bukti">Unggah Bukti (Foto atau Video)</label>
                            <div class="col-sm-10">
                                <input type="file" name="bukti[]" id="bukti" class="form-control" multiple accept="image/*, video/*">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="lokasi">Pilih Lokasi Anda Saat Ini</label>
                            <div class="col-sm-10">
                                <button type="button" class="btn btn-sm btn-info mt-2" onclick="getLocation(event);"><i class="bi bi-geo-alt"></i> Ambil Lokasi</button>
                                <input type="hidden" id="latitude" name="latitude" value="<?php echo $data['latitude']; ?>">
                                <input type="hidden" id="longitude" name="longitude" value="<?php echo $data['longitude']; ?>">
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="isi_laporan">Isi Laporan</label>
                            <div class="col-sm-10">
                                <textarea cols="30" rows="6" name="isi_laporan" id="isi_laporan" class="form-control"><?php echo $data['isi_laporan']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2" for="bukti">Kategori Pengaduan</label>
                            <div class="col-sm-10">
                                <select name="kategori" id="" class="form-control">
                                    <option value="infrastruktur" <?php if ($data['kategori'] == "infrastruktur") echo "selected"; ?>>Infrastruktur</option>
                                    <option value="lingkungan" <?php if ($data['kategori'] == "lingkungan") echo "selected"; ?>>Lingkungan</option>
                                    <option value="transportasi" <?php if ($data['kategori'] == "transportasi") echo "selected"; ?>>Transportasi</option>
                                    <option value="keamanan" <?php if ($data['kategori'] == "keamanan") echo "selected"; ?>>Keamanan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-sm btn-info mt-3"><i class="bi bi-send"></i> Simpan</button>
                        <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary mt-3"><i class="bi bi-arrow-counterclockwise"></i> Kembali</button>
                    </form>
                </div>


                <script>
                    function getLocation(event) {
                        event.preventDefault(); // Mencegah form dari submit secara langsung

                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(showPosition, showError);
                        } else {
                            alert("Geolocation tidak didukung oleh browser Anda.");
                        }
                    }

                    function showPosition(position) {
                        document.getElementById('latitude').value = position.coords.latitude;
                        document.getElementById('longitude').value = position.coords.longitude;
                    }

                    function showError(error) {
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                alert("Anda telah menolak permintaan untuk Geolocation.");
                                break;
                            case error.POSITION_UNAVAILABLE:
                                alert("Informasi lokasi tidak tersedia.");
                                break;
                            case error.TIMEOUT:
                                alert("Waktu permintaan untuk mendapatkan lokasi pengguna telah habis.");
                                break;
                            case error.UNKNOWN_ERROR:
                                alert("Terjadi kesalahan yang tidak diketahui.");
                                break;
                        }
                    }
                </script>
            <?php
        } // Tutup while loop

        if (isset($_POST['submit'])) {
            error_reporting(0);
            $nik = $_SESSION['masyarakat']['nik'];
            $tanggal = $_POST['tgl_pengaduan'];
            $isi_laporan = $_POST['isi_laporan'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $kategori = $_POST['kategori'];
            $status = 0;

            // Mengambil informasi file yang diunggah
            $buktiStr = "";
            if ($_FILES["bukti"]["name"][0] != "") {
                $bukti = [];
                $queryhapus = "SELECT * FROM pengaduan WHERE id_pengaduan='$id'";
                $sql = mysqli_query($koneksi, $queryhapus);
                $data = mysqli_fetch_array($sql);
                if ($data['bukti']) {
                    $existingFiles = explode(",", $data['bukti']);
                    foreach ($existingFiles as $file) {
                        unlink("../bukti/" . $file);
                    }
                }
                $files = $_FILES['bukti'];
                $count = count($files['name']);

                for ($i = 0; $i < $count; $i++) {
                    $namaFile = $files['name'][$i];
                    $lokasiFile = $files['tmp_name'][$i];
                    $extensi = pathinfo($namaFile, PATHINFO_EXTENSION);
                    $namaBaru = uniqid() . '.' . $extensi;
                    $tujuan = "../bukti/" . $namaBaru;

                    if (move_uploaded_file($lokasiFile, $tujuan)) {
                        $bukti[] = $namaBaru;
                    }
                }
                $buktiStr = implode(",", $bukti);
            }

            // Menyiapkan query
            if ($longitude && $latitude != "") {
                if (!empty($buktiStr)) {
                    $query = "UPDATE pengaduan SET tgl_pengaduan='$tanggal', nik='$nik', isi_laporan='$isi_laporan',kategori='$kategori',bukti='$buktiStr', status='$status', longitude='$longitude', latitude='$latitude' WHERE id_pengaduan='$id'";
                } else {
                    $query = "UPDATE pengaduan SET tgl_pengaduan='$tanggal', nik='$nik', isi_laporan='$isi_laporan',kategori='$kategori', status='$status', longitude='$longitude', latitude='$latitude' WHERE id_pengaduan='$id'";
                }
            } else {
                if (!empty($buktiStr)) {
                    $query = "UPDATE pengaduan SET tgl_pengaduan='$tanggal', nik='$nik', isi_laporan='$isi_laporan',kategori='$kategori', bukti='$buktiStr', status='$status' WHERE id_pengaduan='$id'";
                } else {
                    $query = "UPDATE pengaduan SET tgl_pengaduan='$tanggal', nik='$nik', isi_laporan='$isi_laporan',kategori='$kategori', status='$status' WHERE id_pengaduan='$id'";
                }
            }

            // Eksekusi query
            $sql = mysqli_query($koneksi, $query);

            if ($sql) {
                echo '<script>
                    Swal.fire({
                        title: "Pengaduan Berhasil Diedit!",
                        text: "Terimakasih Telah menggunakan Layanan Kami.",
                        icon: "success",
                        willClose: () => {
                            window.location.href = "index.php";
                        }
                    });
                  </script>';
            } else {
                echo '<script>
                        Swal.fire({
                            title: "Gagal Mengedit Pengaduan",
                            text: "Silahkan Coba Lagi!",
                            icon: "error",
                        });
                      </script>';
            }
        }
            ?>
            </div>
        </div>
    </div>
    </div>