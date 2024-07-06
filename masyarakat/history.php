<div class="col-12 col-lg-10 mx-auto">
    <div class="card radius-15">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Riwayat Pengaduan</h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>

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
                                    <td><?php echo $data['isi_laporan']; ?></td>

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