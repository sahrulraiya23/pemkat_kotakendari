<?php
$id = $_GET['id_pengaduan'];
$query = "SELECT * FROM pengaduan WHERE id_pengaduan = '$id'";
$sql = mysqli_query($koneksi, $query);
while ($data = mysqli_fetch_array($sql)) {
?>
    <div class="col-12 col-lg-10 mx-auto">
        <div class="card radius-15">
            <div class="container mt-5">
                <div class="section-title">
                    <h2>Detail Laporan Masyarakat</h2>
                </div>
                <div class="card-body" style="font-family:Poppins">
                    <div class="form-group row mt-3">
                        <div class="col-sm-2">
                            <label for="">Tanggal Pengaduan</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $data['tgl_pengaduan'] ?>" class="form-control" disabled></input>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Bukti</label>
                        <?php
                        $bukti = explode(",", $data['bukti']);
                        foreach ($bukti as $file) {
                            $file_extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) {
                                echo '<img src="../bukti/' . $file . '" style="width:auto; height:200px;" alt="Bukti Pengaduan"><br>';
                            } elseif (in_array($file_extension, array('mp4', 'webm', 'ogg'))) {
                                echo '<video width="320" height="240" controls><source src="../bukti/' . $file . '" type="video/mp4">Your browser does not support the video tag.</video><br>';
                            }
                        } ?>
                    </div>
                    <br>

                    <div class="form-group row mt-3">
                        <div class="col-sm-2">
                            <label for="">Isi Laporan</label>
                        </div>
                        <div class="col-sm-10">
                            <textarea cols="30" rows="10" class="form-control" disabled><?php echo $data['isi_laporan']; ?></textarea>
                        </div>
                    </div>


                    <div class="form-group row mt-3">
                        <div class="col-sm-2">
                            <label for="">Kategori</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo $data['kategori']; ?>" class="form-control" disabled></input>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Lokasi</label>
                        <div class="col-sm-10">
                            <iframe src="https://www.google.com/maps?q=<?php echo htmlspecialchars($data['latitude']); ?>,<?php echo htmlspecialchars($data['longitude']); ?>&hl=es;z=14&output=embed" width="100%" height="100%" frameborder="0"></iframe>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <div class="col-sm-2">
                            <label for="">Status</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" value="<?php echo strtoupper($data['status']) ?>" class="form-control" disabled></input>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

$querytanggapan = "SELECT * FROM tanggapan JOIN petugas ON tanggapan.id_petugas=petugas.id_petugas WHERE id_pengaduan='$id'";
$sql = mysqli_query($koneksi, $querytanggapan);
?>

<div class="col-12 col-lg-10 mx-auto mt-5" style="margin-bottom: 50px;">
    <div class="card radius-15">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Tanggapan Petugas</h2>
            </div>
            <?php if (mysqli_num_rows($sql) > 0) { ?>
                <?php while ($data = mysqli_fetch_array($sql)) { ?>
                    <div class="card-body" style="font-family:Poppins">
                        <div class="form-group row">
                            <label class="col-sm-2">Tanggal Ditanggapi</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo $data['tgl_tanggapan'] ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2"> Isi Tanggapan</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo $data['tanggapan'] ?>" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row mt-3">
                            <label class="col-sm-2"> Petugas</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?php echo $data['nama_petugas'] ?>" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                <?php } ?>

        </div>
    <?php } else { ?>
        <div class="card-body" style="font-family:Poppins">
            <h4 class="text-center">Belum ada Tanggapan</h4>
        </div>
    <?php } ?>
    </div>
    <div class="col-12 col-lg-10 mx-auto">

        <div class="container mt-5">
            <div class="card-body" style="font-family:Poppins">
                <div class="section-title">
                    <h2 class="mb-4">Give Your Rating</h2>
                </div>
                <form method="POST">
                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5"><label for="star5"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4"><label for="star4"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3"><label for="star3"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2"><label for="star2"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star1" name="rating" value="1"><label for="star1"><i class="fas fa-star"></i></label>
                    </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary" name="btnRating" style="margin-left: 300px;">Submit Rating</button>
            </form>
            <?php
            if (isset($_POST['btnRating'])) {
                $rating = $_POST["rating"];
                $id = $_GET['id_pengaduan'];
                $query = "UPDATE pengaduan SET rating = '$rating' WHERE id_pengaduan = $id";
                $sql = mysqli_query($koneksi, $query);
                if ($sql) {
                    echo '<script>
                    Swal.fire({
                        title: "Terimakasih",
                        text: "Rating Berhasil Dikirim.",
                        icon: "success",
                    });
                  </script>';
                }
            }
            ?>
            <style>
                .rating {
                    unicode-bidi: bidi-override;
                    direction: rtl;
                    text-align: center;
                }

                .rating>input {
                    display: none;
                }

                .rating>label {
                    display: inline-block;
                    font-size: 2em;
                    color: #ccc;
                    cursor: pointer;
                }

                .rating>label:hover,
                .rating>label:hover~label,
                .rating>input:checked~label {
                    color: #f39c12;
                }
            </style>
        </div>
    </div>
</div>

</div>