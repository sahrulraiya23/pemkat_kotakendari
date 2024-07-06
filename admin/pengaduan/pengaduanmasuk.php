<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Pengaduan Masuk</a>
            </li>
        </ul>
        <div class="card-header-right">
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table align-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Nama Pengirim</th>
                        <th>Bukti</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    ob_start();
                    $query = "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status='0' ORDER BY tgl_pengaduan DESC";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                        $id_pengaduan = $data['id_pengaduan']; // Menyimpan ID pengaduan
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td>
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
                            </td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td style="width: auto;height:auto; "><iframe src="https://www.google.com/maps?q=<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>&hl=es;z=14&output=embed" style='width=100%' height="100%" frameborder="0"></iframe></td>
                            <td>
                                <?php
                                if ($data['status'] == '0') {
                                    echo 'Belum dikonfirmasi';
                                } else {
                                    echo strtoupper($data['status']);
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalKonfirmasi<?php echo $id_pengaduan; ?>">
                                    <i class="ti-check"></i> Konfirmasi
                                </button>
                                <!-- Modal Konfirmasi -->
                                <div class="modal fade" id="modalKonfirmasi<?php echo $id_pengaduan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Laporan Ini?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <input type="hidden" name="id" value="<?php echo $id_pengaduan; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">NIK</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="nik" value="<?php echo $data['nik']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="nama" value="<?php echo $data['nama']; ?>">
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
                                                            <iframe src="https://www.google.com/maps?q=<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>&hl=es;z=14&output=embed" style='width=100%' height="100%" frameborder="0"></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Isi Laporan</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="" class="form-control" disabled id="" cols="30" rows="10"><?php echo $data['isi_laporan'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="nama" value="<?php echo $data['kategori']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" name="konfirm" class="btn btn-primary">Konfirmasi</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalTolak<?php echo $id_pengaduan; ?>">
                                    <i class="ti-close"></i> Tolak
                                </button>
                                <!-- Modal Tolak -->
                                <div class="modal fade" id="modalTolak<?php echo $id_pengaduan; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tolak Laporan Ini?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $id_pengaduan; ?>">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">NIK</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="nik" value="<?php echo $data['nik']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Nama</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="nama" value="<?php echo $data['nama']; ?>">
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
                                                            <iframe src="https://www.google.com/maps?q=<?php echo $data['latitude']; ?>,<?php echo $data['longitude']; ?>&hl=es;z=14&output=embed" style='width=100%' height="100%" frameborder="0"></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Isi Laporan</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="" class="form-control" disabled id="" cols="30" rows="10"><?php echo $data['isi_laporan'] ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Kategori</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" disabled name="nama" value="<?php echo $data['kategori']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Alasan <br> Ditolak</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="tanggapan" class="form-control" id="" cols="30" rows="10"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" name="tolak" class="btn btn-primary">Tolak</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
if (isset($_POST['konfirm'])) {
    $id = $_POST['id'];

    $query = "UPDATE pengaduan SET status='proses',notif_status='unseen' WHERE id_pengaduan='$id'";

    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        echo '<script>
            Swal.fire({
                title: "Konfirmasi Pengaduan Berhasil",
                text: "Pengaduan sedang tahap Proses",
                icon: "success",
                willClose: () => {
                    window.location.href = "?halaman=pengaduanproses";
                }
            });
        </script>';
    }
}


if (isset($_POST['tolak'])) {
    $tanggal = date("Y-m-d");
    $id = $_POST['id'];
    $id_petugas = $_SESSION['admin']['id_petugas'];
    $tanggapan = $_POST['tanggapan'];
    $query = "UPDATE pengaduan SET status='batal',notif_status='unseen' WHERE id_pengaduan='$id'";
    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        $querytanggapan = "INSERT INTO tanggapan(id_pengaduan,tgl_tanggapan,tanggapan,id_petugas)VALUES('$id','$tanggal','$tanggapan','$id_petugas')";
        $sqltanggapan = mysqli_query($koneksi, $querytanggapan);
        if ($sqltanggapan) {
            echo '<script>
            Swal.fire({
                title: "Berhasil Menolak Pengaduan",
                text: "Terimakasih",
                icon: "error",
                willClose: () => {
                    window.location.href = "?halaman=pengaduanbatal";
                }
            });
        </script>';
        }
    }
}
