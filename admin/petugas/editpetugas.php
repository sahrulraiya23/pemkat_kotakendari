<?php
$id = $_GET['id_petugas'];
$query = "SELECT*FROM petugas WHERE id_petugas = '$id'";
$sql = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="card">
        <div class="card-header">
            <ul class="breadcrumb-title b-t-default p-t-10">
                <li class="breadcrumb-item">
                    <a href="index.html"> <i class="fa fa-home"></i> </a>
                </li>
                <li class="breadcrumb-item"><a href="#!">Edit Data Petugas</a>
                </li>
            </ul>

        </div>
        <div class="card-block table-border-style">
            <form action="" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nama_petugas" value="<?php echo $data['nama_petugas']; ?>" placeholder="Masukkan Nama Petugas">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Masukkan Username">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" placeholder="Ketik Jika Ingin Diubah">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telpon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="notelp" value="<?php echo $data['telp']; ?>" placeholder="Masukkan no. telpon">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Level</label>
                    <div class="col-sm-10">
                        <select name="level" value="<?php echo $data['level']; ?>" class="form-control">
                            <option value="admin" <?php if ($data['level'] == 'admin') {
                                                        echo 'selected';
                                                    } ?>>ADMIN</option>
                            <option value="petugas" <?php if ($data['level'] == 'petugas') {
                                                        echo 'selected';
                                                    } ?>>PETUGAS</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <button class="btn btn-round btn-sm btn-success" type="submit" name="editpetugas">Simpan</button>
                    <button class="btn btn-round btn-sm btn-warning" type="button" onclick="window.history.back();">Kembali</button>
                </div>
            </form>
        <?php }

    if (isset($_POST['editpetugas'])) {
        $nama_petugas = $_POST['nama_petugas'];
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $notelp = $_POST['notelp'];
        $level = $_POST['level'];
        if ($_POST['password'] != "") {
            $query = "UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',password='$password',telp='$notelp',level='$level' WHERE id_petugas='$id'";
            $sql = mysqli_query($koneksi, $query);
        } else {
            $query = "UPDATE petugas SET nama_petugas='$nama_petugas',username='$username',telp='$notelp',level='$level' WHERE id_petugas='$id'";
            $sql = mysqli_query($koneksi, $query);
        }


        if ($sql) {
            echo "<script>
                Swal.fire({
                    title: 'Berhasil Edit Data Petugas!',
                    text: 'Terimakasih',
                    icon: 'success',
                    willClose: () => {
                        window.location.href='?halaman=petugas';
                    }
                });
           </script>
               ";
        }
    }


        ?>
        </div>
    </div>