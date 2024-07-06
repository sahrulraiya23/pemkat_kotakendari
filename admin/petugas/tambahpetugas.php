<?php
ob_start();
?>
<div class="card">
    <div class="card-header">
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Tambah Data Petugas</a>
            </li>
        </ul>

    </div>
    <div class="card-block table-border-style">
        <form action="" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_petugas" placeholder="Masukkan Nama Petugas">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Masukkan password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No. Telpon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="notelp" placeholder="Masukkan no. telpon">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Level</label>
                <div class="col-sm-10">
                    <select name="level" class="form-control">
                        <option value="admin">ADMIN</option>
                        <option value="petugas">PETUGAS</option>
                    </select>
                </div>
            </div>
            <div class="form-group mt-5">
                <button class="btn btn-round btn-sm btn-success" type="submit" name="tambahpetugas"><i class="ti-plus"></i>Tambah</button>
                <button class="btn btn-round btn-sm btn-warning" type="button" onclick="window.history.back();"><i class="ti-arrow-circle-left"></i>Kembali</button>
            </div>
        </form>
        <?php
        if (isset($_POST['tambahpetugas'])) {
            $nama_petugas = $_POST['nama_petugas'];
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $notelp = $_POST['notelp'];
            $level = $_POST['level'];

            $query = "INSERT INTO petugas(nama_petugas,username,password,telp,level) VALUES('$nama_petugas','$username','$password','$notelp','$level')";
            $sql = mysqli_query($koneksi, $query);
            if ($sql) {
                echo "<script>
                Swal.fire({
                    title: 'Berhasil Tambah Petugas!',
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