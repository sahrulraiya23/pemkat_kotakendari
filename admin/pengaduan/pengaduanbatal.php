<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Pengaduan Batal</a>
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
                        <th>Status</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT*FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE status='batal' ORDER BY tgl_pengaduan DESC";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php
                                $bukti = explode(",", $data['bukti']);
                                foreach ($bukti as $file) {
                                    $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                    if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                                        echo '<img src="../bukti/' . $file . '" style="width: 300px; height: auto;" alt="Bukti Pengaduan"><br>';
                                    } elseif (in_array($file_extension, array('mp4', 'webm', 'ogg'))) {
                                        echo '<video width="320" height="240" controls><source src="../bukti/' . $file . '" type="video/mp4">Your browser does not support the video tag.</video><br>';
                                    }
                                }
                                ?></td>
                            <td><?php echo strtoupper($data['status']); ?></td>
                            <td>
                                <a href="?halaman=pengaduandetail&id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="btn btn-sm btn-primary"><i class="ti-info"></i>Lihat Detail</a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>