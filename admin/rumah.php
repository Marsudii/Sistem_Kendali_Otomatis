<?php
$title = 'Data Rumah';
require 'koneksi.php';

$query = 'SELECT tb_kontrol.*, user.nama_user FROM tb_kontrol LEFT JOIN user ON user.token_id = tb_kontrol.id_token';
$data = mysqli_query($conn, $query);

require 'header.php';
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Data Rumah</h2>
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
                        <a href="tambah_rumah.php" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Tambah Rumah
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%">#</th>
                                    <th>Nama Penghuni</th>
                                    <th>Nama Rumah</th>
                                    <th>Nomor Token</th>
                                    <th>No Telepon</th>
                                    <th style="width: 25%;">Alamat</th>
                                    <th style="width: 10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($tb_kontrol = mysqli_fetch_assoc($data)) {
                                ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $tb_kontrol['nama_user']; ?></td>
                                            <td><?php if ($tb_kontrol['nama_rumah'] == null) {
                                                    echo "Belum ada pemilik";
                                                } else {
                                                    echo $tb_kontrol['nama_rumah'];
                                                } ?>
                                            </td>
                                            <td><?= $tb_kontrol['token_rumah']; ?></td>
                                            <td><?= $tb_kontrol['telp']; ?></td>
                                            <td><?= $tb_kontrol['alamat_rumah']; ?></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_rumah.php?id=<?= $tb_kontrol['id_token']; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="hapus_rumah.php?id=<?= $tb_kontrol['id_token']; ?>" onclick="return confirm('Yakin hapus data?');" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
<?php
require 'footer.php';
?>