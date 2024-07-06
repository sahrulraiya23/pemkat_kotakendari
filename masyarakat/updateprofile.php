<?php
$nik = $_GET['nik'];
$query = "SELECT*FROM masyarakat WHERE nik = '$nik'";
$sql = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
    <main id="main">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="card radius-15">
                <div class="container mt-5">
                    <div class="section-title">
                        <h2>Profile</h2>
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <form method="post">
                            <div class="form-group">
                                <label for="">Nik : </label>
                                <input type="text" name="nik" class="form-control" id="name" value="<?php echo $data['nik'] ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Nama : </label>
                                <input type="text" name="nama" class="form-control" id="name" value="<?php echo $data['nama'] ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Username : </label>
                                <input type="text" name="username" class="form-control" id="name" value="<?php echo $data['username'] ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">No. Telp : </label>
                                <input type="text" name="telp" class="form-control" id="name" value="<?php echo $data['telp'] ?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Password Lama : </label>
                                <input type="password" name="pwlama" class="form-control" id="name" placeholder="Ketikkan Password Jika Ingin Diubah">
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Password Baru : </label>
                                <input type="password" name="pwbaru" class="form-control" id="name" placeholder="Konfirmasi Password ">
                            </div>
                            <div class="my-3">
                                <button type="submit" name="updateprofile" class="btn btn-success"><i class="bi bi-sd-card"></i> Simpan</button>
                            </div>
                        </form>
                    <?php }
                if (isset($_POST['updateprofile'])) {
                    $username = $_POST['username'];
                    $telp = $_POST['telp'];
                    $pwbaru = $_POST['pwbaru'];
                    $pwlama = $_POST['pwlama'];
                    if ($_POST['pwbaru'] && $_POST['pwlama'] && $_POST['username'] && $_POST['telp'] != '') {
                        if ($_POST['pwbaru'] != $_POST['pwlama']) {
                            echo '<script>
                            Swal.fire({
                                title: "Password Harus Sama!",
                                text: "Silakan coba lagi.",
                                icon: "error",                              
                            });
                          </script>';
                        } else {
                            $pwbaru = password_hash($_POST['pwbaru'], PASSWORD_BCRYPT);
                            $query = "UPDATE masyarakat SET username='$username',password='$pwbaru',telp='$telp' WHERE nik='$nik'";
                            $sql = mysqli_query($koneksi, $query);
                            echo '<script>
                            Swal.fire({
                                title: "Update Profile Berhasil!",
                                text: "Terimakasih.",
                                icon: "success",
                                willClose: () => {
                                    window.location.href = "?halaman=profil";
                                }
                            });
                          </script>';
                        }
                    } else if ($_POST['username'] && $_POST['telp'] != '') {
                        $query = "UPDATE masyarakat SET username='$username',telp='$telp' WHERE nik='$nik'";
                        $sql = mysqli_query($koneksi, $query);
                        echo '<script>
                        Swal.fire({
                            title: "Update Profile Berhasil!",
                            text: "Terimakasih.",
                            icon: "success",
                            willClose: () => {
                                window.location.href = "?halaman=profil";
                            }
                        });
                      </script>';
                    } else {
                        echo '<script>
                        Swal.fire({
                            title: "Kolom Tidak Boleh Kosong!",
                            text: "Silakan coba lagi.",
                            icon: "error"
                        });
                      </script>';
                        exit;
                    }
                }
                    ?>
                    </div>
                </div>
            </div>
        </div>

    </main>