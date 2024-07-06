<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-blue order-card">
            <div class="card-block">
                <?php
                $query = "SELECT*FROM masyarakat";
                $sql = mysqli_query($koneksi, $query);
                $data = mysqli_num_rows($sql);
                ?>
                <h6 class="m-b-20">Jumlah Masyarakat</h6>
                <h2 class="text-right"><i class="ti-user f-left"></i><span><?php echo $data; ?></span></h2>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-green order-card">
            <div class="card-block">
                <?php
                $query = "SELECT*FROM petugas";
                $sql = mysqli_query($koneksi, $query);
                $data = mysqli_num_rows($sql);
                ?>
                <h6 class="m-b-20">Jumlah Petugas</h6>
                <h2 class="text-right"><i class="ti-agenda f-left"></i><span><?php echo $data; ?></span></h2>

            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card bg-c-yellow order-card">
            <div class="card-block">
                <?php
                $query = "SELECT*FROM pengaduan";
                $sql = mysqli_query($koneksi, $query);
                $data = mysqli_num_rows($sql);
                ?>
                <h6 class="m-b-20">Jumlah Pengaduan</h6>
                <h2 class="text-right"><i class="ti-email f-left"></i><span><?php echo $data; ?></span></h2>

            </div>
        </div>
    </div>

</div>
<div class="card">

    <div class="card-block">
        <h5 class="m-b-10">Selamat Datang,<?php echo $_SESSION['petugas']['nama_petugas'] ?></h5>
        <ul class="breadcrumb-title b-t-default p-t-10">
            <li class="breadcrumb-item">
                <a href="index.html"> <i class="fa fa-home"></i> </a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
            </li>
        </ul>
        <br>
        <p class="text-muted m-b-10 mt-3">Nama : <?php echo $_SESSION['petugas']['nama_petugas'] ?></p>
        <p class="text-muted m-b-10">Username : <?php echo $_SESSION['petugas']['username'] ?></p>
        <p class="text-muted m-b-10">Level : <b><?php echo $_SESSION['petugas']['nama_petugas'] ?></b></p>
    </div>

</div>


<div class="page-header card">
    <div class="card-block">
        <h5 class="m-b-10">Statistik</h5>
    </div>
    <canvas id="myChart" style="width:40vh; height:80vh; margin:0 auto;"></canvas>
</div>