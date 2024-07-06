<?php
$nama = $_SESSION['masyarakat']['nama'];
$query = "SELECT * FROM masyarakat WHERE nama='$nama'";
$sql = mysqli_query($koneksi, $query);
if ($data = mysqli_fetch_array($sql)) {
?>
    <main id="main">
        <div class="col-12 col-lg-10 mx-auto">
            <div class="card radius-15">
                <div class="container mt-5">
                    <div class="section-title">
                        <h2>Profil</h2>
                    </div>
                    <div class="col-lg-6 mx-auto">
                        <form method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <label for="nik">Nik :</label>
                                <input type="text" name="nik" class="form-control" id="nik" value="<?php echo $data['nik'] ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama">Nama :</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data['nama'] ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="username">Username :</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo $data['username'] ?>" disabled>
                            </div>
                            <div class="form-group mt-3">
                                <label for="telp">No. Telp:</label>
                                <input type="text" name="telp" class="form-control" id="telp" value="<?php echo $data['telp'] ?>" disabled>
                            </div>
                            <div class="my-3">
                                <a href="?halaman=updateprofile&nik=<?php echo $data['nik']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Update Profile</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
}
?>