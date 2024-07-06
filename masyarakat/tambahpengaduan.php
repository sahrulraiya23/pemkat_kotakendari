<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Tambah Laporan</h2>
            </div>
            <div class="card-body p-bd-5">
                <form action="" method="post" class="myForm" enctype="multipart/form-data">
                    <div class="form-group row ">
                        <label class="col-sm-2" class="col-sm-2" for="tgl_pengaduan">Tanggal</label>
                        <div class="col-sm-10">

                            <input type="date" name="tgl_pengaduan" id="tgl_pengaduan" class="form-control">

                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2" for="bukti">Unggah Bukti (Foto atau Video)</label>
                        <div class="col-sm-10">
                            <input type="file" name="bukti[]" id="bukti" class="form-control" multiple accept="image/*, video/*" required>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2" for="lokasi">Pilih Lokasi Anda Saat Ini</label>
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-sm btn-info mt-2" onclick="getLocation(event);"><i class="bi bi-geo-alt"></i> Ambil Lokasi</button>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2" for="isi_laporan">Isi Laporan</label>
                        <div class="col-sm-10">
                            <textarea cols="30" rows="6" name="isi_laporan" id="isi_laporan" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2" for="bukti">Kategori Pengaduan</label>
                        <div class="col-sm-10">
                            <select name="kategori" id="" class="form-control">
                                <option value="infrastruktur">Infrastruktur</option>
                                <option value="lingkungan">Lingkungan</option>
                                <option value="transportasi">Transportasi</option>
                                <option value="keamanan">Keamanan</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="latitude" id="latitude">
                    <input type="hidden" name="longitude" id="longitude">
                    <button type="submit" name="submit" class="btn btn-sm btn-info mt-3"><i class="bi bi-send"></i> Submit</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary mt-3"><i class="bi bi-arrow-counterclockwise"></i> Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function getLocation(event) {
        if (event) {
            event.preventDefault(); // Mencegah form dari submit secara langsung
        }

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

    // Panggil getLocation saat halaman dimuat
    window.onload = function() {
        getLocation();
    };
</script>

<?php
if (isset($_POST['submit'])) {
    // Pastikan untuk melakukan sanitasi dan validasi input sesuai kebutuhan
    $nik = $_SESSION['masyarakat']['nik'];
    $tanggal = $_POST['tgl_pengaduan'];
    $isi_laporan = $_POST['isi_laporan'];
    $kategori = $_POST['kategori'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $status = 0;
    $notif = 'unseen';

    // Mengambil informasi file yang diunggah
    $bukti = [];

    if (!empty($_FILES['bukti']['name'][0])) {
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
            } else {
                echo '<script>
                Swal.fire({
                    title: "Gagal Upload File",
                    text: "Silakan coba lagi.",
                    icon: "error",
                    willClose: () => {
                        window.location.href = "?halaman=tambahpengaduan";
                    }
                });
              </script>';
            }
        }
    } else {
        echo '<script>
        Swal.fire({
            title: "Gagal!",
            text: "Silahkan Upload Minimal 1 bukti",
            icon: "error",
            willClose: () => {
                window.location.href = "?halaman=tambahpengaduan";
            }
        });
      </script>';
    }

    // Validasi data
    if ($nik && $tanggal && $isi_laporan && $latitude !== '' && $longitude !== '') {
        $buktiStr = implode(",", $bukti);

        // Insert data pengaduan ke database
        $query = "INSERT INTO pengaduan (tgl_pengaduan, nik, isi_laporan,kategori, latitude, longitude, bukti, status, notif) 
                  VALUES ('$tanggal', '$nik', '$isi_laporan', '$kategori','$latitude','$longitude', '$buktiStr', '$status', '$notif')";
        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            echo '<script>
            Swal.fire({
                title: "Tambah Pengaduan Berhasil!",
                text: "Terimakasih telah menggunakan layanan kami",
                icon: "success",
                willClose: () => {
                    window.location.href = "index.php";
                }
            });
          </script>';
        } else {
            // Tampilkan kesalahan SQL jika query gagal
            echo '<script>
            Swal.fire({
                title: "Gagal Kirim pengaduan",
                text: "Silakan coba lagi. Kesalahan: ' . mysqli_error($koneksi) . '",
                icon: "error",
                willClose: () => {
                    window.location.href = "?halaman=tambahpengaduan";
                }
            });
          </script>';
        }
    } else {
        echo '<script>
        Swal.fire({
            title: "Gagal",
            text: "Lengkapi kolom",
            icon: "error",
            willClose: () => {
                window.location.href = "?halaman=tambahpengaduan";
            }
        });
      </script>';
    }
}
?>