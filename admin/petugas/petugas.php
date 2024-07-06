<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Data Petugas</a>
            </li>
        </ul>
        <div class="card-header-right">
            <a href="?halaman=tambahpetugas" class="btn btn-round btn-sm btn-outline-primary mt-2">Tambah Petugas</a>
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table align-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT*FROM petugas";
                    $sql = mysqli_query($koneksi, $query);
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $data['nama_petugas']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo strtoupper($data['level']); ?></td>
                            <td>
                                <a href="?halaman=editpetugas&id_petugas=<?php echo $data['id_petugas']; ?>" class="btn btn-round btn-sm  btn-success"><i class="ti-marker-alt"></i>Edit</a>
                                <a href="?halaman=hapuspetugas&id_petugas=<?php echo $data['id_petugas']; ?>" class="btn btn-round btn-sm btn-danger"><i class="ti-trash"></i>Hapus</a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>