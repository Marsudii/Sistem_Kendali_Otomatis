<?php
$title = 'Selamat Datang di Aplikasi Sistem Kendali Otomatis';
require 'koneksi.php';
require 'header.php';

setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');



$query2 = mysqli_query($conn, "SELECT COUNT(id_user) as jumlah_user FROM user");
$jumlah_user = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($conn, "SELECT COUNT(id_token) as jumlah_rumah FROM tb_kontrol");
$jumlah_rumah = mysqli_fetch_assoc($query3);


?>

<div class="panel-header bg-secondary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white pb-2 fw-bold"><?= $title; ?></h1>
                <h2 class="text-white op-7 mb-2">Admin Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-home"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah rumah</p>
                                <h4 class="card-title"><?= $jumlah_rumah['jumlah_rumah']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Jumlah Pelanggan</p>
                                <h4 class="card-title"><?= $jumlah_user['jumlah_user']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>

    <div class="row">
        
       
        
    </div>


</div>
</div>
<?php
require 'footer.php';
?>
