<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Laporan Masyarakat</h2>
            </div>
            <div class="card-body">
                <?php
                $query = "SELECT*FROM pengaduan"
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <a href="?halaman=tambahpengaduan" class="btn btn-primary btn-sm mb-3"><i class="bi bi-plus"></i>Tambah Laporan</a>
                    </div>
                    <div class="col-md-8">
                        <form action="" method="get">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="date" class="form-control" name="tgl_pengaduan" value="<?= isset($_GET['tgl_pengaduan']) ? $_GET['tgl_pengaduan'] : '' ?>">
                                </div>
                                <div class="col-md-4">
                                    <select name="status" class="form-select">
                                        <option value="">-Pilih Status-</option>
                                        <option value="0" <?= isset($_GET['status']) && $_GET['status'] == '0' ? 'selected' : '' ?>>Belum Dikonfirmasi</option>
                                        <option value="proses" <?= isset($_GET['status']) && $_GET['status'] == 'proses' ? 'selected' : '' ?>>Dalam Proses</option>
                                        <option value="batal" <?= isset($_GET['status']) && $_GET['status'] == 'batal' ? 'selected' : '' ?>>Batal</option>
                                        <option value="selesai" <?= isset($_GET['status']) && $_GET['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <button type="submit" class="btn btn-warning me-2"><i class="bi bi-funnel-fill"></i> Filter</button>
                                    <a href="?halaman=history" class="btn btn-light"><i class="bi bi-clock-history"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>


                <div class="table-responsive">
                    <table class="table table-striped align-middle table-bordered" id="masyarakat" id="printTable">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Bukti</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nik = $_SESSION['masyarakat']['nik'];
                            $query = "SELECT * FROM pengaduan WHERE nik='$nik'";
                            $sql = mysqli_query($koneksi, $query);
                            if (isset($_GET['status']) && $_GET['status'] != '' && isset($_GET['tgl_pengaduan']) && $_GET['tgl_pengaduan'] != '') {

                                $tgl_pengaduan = $_GET['tgl_pengaduan'];
                                $status = $_GET['status'];
                                $query = "SELECT * FROM pengaduan WHERE tgl_pengaduan='$tgl_pengaduan' AND status='$status' AND nik='$nik' ORDER BY nik";
                                $sql = mysqli_query($koneksi, $query);
                            } else if (isset($_GET['status']) && isset($_GET['tgl_pengaduan']) && $_GET['tgl_pengaduan'] != '') {
                                $tgl_pengaduan = $_GET['tgl_pengaduan'];
                                $status = $_GET['status'];
                                $query = "SELECT * FROM pengaduan WHERE tgl_pengaduan='$tgl_pengaduan'AND nik='$nik' ORDER BY nik";
                                $sql = mysqli_query($koneksi, $query);
                            } else if (isset($_GET['status']) && isset($_GET['tgl_pengaduan']) && $_GET['status'] != '') {
                                $tgl_pengaduan = $_GET['tgl_pengaduan'];
                                $status = $_GET['status'];
                                $query = "SELECT * FROM pengaduan WHERE status='$status'AND nik='$nik' ORDER BY nik";
                                $sql = mysqli_query($koneksi, $query);
                            }
                            if (mysqli_num_rows($sql) > 0) {
                                while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                    <tr>
                                        <td><?php echo $data['tgl_pengaduan']; ?></td>
                                        <td>
                                            <?php
                                            $bukti = explode(",", $data['bukti']); // Jika bukti berupa daftar file, pisahkan dengan koma
                                            foreach ($bukti as $file) {
                                                $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                                                    echo '<img src="../bukti/' . $file . '" style="width: 200px; height: auto;" alt="Bukti Pengaduan"><br>';
                                                } elseif (in_array($file_extension, array('mp4', 'webm', 'ogg'))) {
                                                    echo '<video style="width: 200px; height: auto;"controls><source src="../bukti/' . $file . '" type="video/mp4">Your browser does not support the video tag.</video><br>';
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data['kategori']; ?>
                                        </td>
                                        <td>
                                            <button disabled class="btn btn-sm btn-<?php
                                                                                    if ($data['status'] == '0') {
                                                                                        echo 'secondary';
                                                                                    } elseif ($data['status'] == 'proses') {
                                                                                        echo 'warning';
                                                                                    } elseif ($data['status'] == 'selesai') {
                                                                                        echo 'success';
                                                                                    } elseif ($data['status'] == 'batal') {
                                                                                        echo 'danger';
                                                                                    }
                                                                                    ?>">
                                                <?php
                                                if ($data['status'] == '0') {
                                                    echo 'Belum Dikonfirmasi';
                                                } elseif ($data['status'] == 'proses') {
                                                    echo 'Diproses';
                                                } elseif ($data['status'] == 'selesai') {
                                                    echo 'Selesai';
                                                } elseif ($data['status'] == 'batal') {
                                                    echo 'Dibatalkan';
                                                }
                                                ?>
                                            </button>
                                        </td>
                                        <td>
                                            <?php
                                            if ($data['status'] == '0') {
                                            ?>
                                                <a href="?halaman=editpengaduan&id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                                <a href="?halaman=hapuspengaduan&id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Hapus</a>
                                            <?php } else { ?>
                                                <a href="?halaman=detailpengaduan&id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                        </tbody>
                    </table>
                    <h4 class="text-center" style="font-family:Poppins;">Belum Ada Laporan</h4>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>