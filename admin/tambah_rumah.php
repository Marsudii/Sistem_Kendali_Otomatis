<?php
$title = 'Tambah Data Rumah';
require 'koneksi.php';

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_rumah'];
    $token = $_POST['token_rumah'];
    $alamat = $_POST['alamat_rumah'];
    $telp = $_POST['telp'];
    $relay1 = $_POST['relay1'];
    $relay2 = $_POST['relay2'];
    $relay3 = $_POST['relay3'];
    $relay4 = $_POST['relay4'];

    $query = "INSERT INTO tb_kontrol (nama_rumah, token_rumah, alamat_rumah, telp, relay1, relay2, relay3, relay4) values ('$nama', '$token', '$alamat', '$telp', '$relay1', '$relay2', '$relay3', '$relay4')";
    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {
        $_SESSION['msg'] = 'Berhasil Menyimpan Data';
        header('location: rumah.php');
    } else {
        $_SESSION['msg'] = 'Gagal menambahkan data baru!!!';
        header('location: rumah.php');
    }
}

require 'header.php';
?>
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Forms</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="index.php">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="rumah.php">Data Rumah</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Rumah</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Nama Rumah</label>
                                <input type="text" name="nama_rumah" class="form-control form-control" id="defaultInput" placeholder="Nama Rumah...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Token Rumah</label>
                                <input type="text" name="token_rumah" class="form-control form-control" id="defaultInput" placeholder="Token Rumah...">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Rumah</label>
                                <textarea class="form-control" rows="5" name="alamat_rumah"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">No Telepon</label>
                                <input type="text" name="telp" class="form-control form-control" id="defaultInput" placeholder="No Telp..." maxlength="15">
                            </div>
                            <hr >
                            <br>
                            <div class="form-group">
                                <label for="largeInput">Link Relay 1</label>
                                <input type="text" name="relay1" class="form-control form-control" id="defaultInput" placeholder="Url Relay 1..." >
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Link Relay 2</label>
                                <input type="text" name="relay2" class="form-control form-control" id="defaultInput" placeholder="Url Relay 2..." >
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Link Relay 3</label>
                                <input type="text" name="relay3" class="form-control form-control" id="defaultInput" placeholder="Url Relay 3..." >
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Link Relay 4</label>
                                <input type="text" name="relay4" class="form-control form-control" id="defaultInput" placeholder="Url Relay 4..." >
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                <!-- <button class="btn btn-danger">Cancel</button> -->
                                <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>