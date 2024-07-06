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
            <!-- Kosongkan div ini atau tambahkan konten lain jika diperlukan -->
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
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Aksi</th>
                        <th>Rating/Feedback</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    ob_start();
                    $query = "SELECT * FROM pengaduan JOIN masyarakat ON pengaduan.nik = masyarakat.nik WHERE status = 'selesai' ORDER BY tgl_pengaduan DESC";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
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
                                <a href="?halaman=pengaduandetail&id_pengaduan=<?php echo $data['id_pengaduan']; ?>" class="btn btn-sm btn-primary"><i class="ti-info"></i> Lihat Detail</a>
                            </td>
                            <td>
                                <?php echo $data['rating']; ?>/5
                            </td>

                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>