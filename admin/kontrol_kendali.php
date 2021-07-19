<?php
$title = 'Kontrol Kendali';
require 'koneksi.php';


$query = 'SELECT tb_kontrol.*, user.nama_user FROM tb_kontrol LEFT JOIN user ON user.token_id = tb_kontrol.id_token';
$data = mysqli_query($conn, $query);

$query2 = 'SELECT tb_relay.*, tb_kontrol.token_rumah FROM tb_relay LEFT JOIN tb_kontrol ON tb_relay.relay_id = tb_kontrol.id_token';
$data2 = mysqli_query($conn, $query2);


require 'header.php';
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Kontrol Kendali Rumah</h2>
            </div>
        </div>
        <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
            <div class="alert alert-success" role="alert" id="msg">
                <?= $_SESSION['msg']; ?>
            </div>
        <?php }
        $_SESSION['msg'] = ''; ?>
    </div>
</div>
<div class="page-inner mt--5">



<diva class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title; ?></h4>
                        
                    </div>
                </div>
                <div class="card-body">
                
                <a href="kontrol-kendali/kontrol.php" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Lihat Rumah">
                <button class="btn btn-primary btn-round ml-auto">Lihat Rumah</button>
                 </a>
                <a href="kontrol-kendali/kendali.php" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Kontrol Rumah">
                <button class="btn btn-primary btn-round ml-auto">Kontrol Rumah</button>
                 </a>
                                                    
                                                
                                                                                        
                           
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
<?php
require 'footer.php';
?>