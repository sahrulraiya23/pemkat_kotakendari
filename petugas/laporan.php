<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Laporan</a>
            </li>
        </ul>

    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table align-center" id="example" id="printTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Pengaduan</th>
                        <th>NIK</th>
                        <th>Nama Pengirim</th>
                        <th>No. Telpon</th>
                        <th>Isi Laporan</th>
                        <th>Kategori</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT*FROM pengaduan JOIN masyarakat ON pengaduan.nik=masyarakat.nik ORDER BY tgl_pengaduan DESC";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['tgl_pengaduan']; ?></td>
                            <td><?php echo $data['nik']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['telp']; ?></td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $data['isi_laporan']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td><?php echo strtoupper($data['status']); ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>