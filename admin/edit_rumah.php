<?php
$title = 'Edit Data Rumah';
require 'koneksi.php';

$query = "SELECT tb_kontrol.*, user.nama_user, user.id_user FROM tb_kontrol LEFT JOIN user ON user.token_id = tb_kontrol.id_token WHERE id_token  = " . $_GET['id'];
$data = mysqli_query($conn, $query);
$edit = mysqli_fetch_assoc($data);


$query2 = "SELECT user.*, tb_kontrol.nama_rumah FROM tb_kontrol RIGHT JOIN user ON user.token_id = tb_kontrol.id_token WHERE user.role = 'pengguna2' ORDER BY user.token_id ASC";
$data2 = mysqli_query($conn, $query2);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_rumah'];
    $alamat = $_POST['alamat_rumah'];
    $token_rumah = $_POST['token_rumah'];
    $telp = $_POST['telp'];
    $relay1 = $_POST['relay1'];
    $relay2 = $_POST['relay2'];
    $relay3 = $_POST['relay3'];
    $relay4 = $_POST['relay4'];
   

    $query = "UPDATE tb_kontrol SET nama_rumah = '$nama', alamat_rumah = '$alamat', token_rumah = '$token_rumah', telp = '$telp', relay1 = '$relay1', relay2 = '$relay2', relay3 = '$relay3', relay4 = '$relay4' WHERE id_token = " . $_GET['id'];

    

    $update = mysqli_query($conn, $query);
    
    if ($update == 1 ) {
        $_SESSION['msg'] = 'Berhasil Mengubah Data';
        header('location:rumah.php');
    } else {
        $_SESSION['msg'] = 'Gagal Mengubah Data!!!';
        header('location:rumah.php');
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
                    <a href="outlet.php">Outlet</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $title; ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?>
                            : <strong><?= $edit['nama_rumah']; ?></strong></div>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="largeInput">Nama Rumah</label>
                                <input type="text" name="nama_rumah" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_rumah']; ?>" placeholder="Outlet...">
                            </div>
                            
                            <div class="form-group">
                                <label for="largeInput">Token Rumah</label>
                                <input type="text" name="token_rumah" class="form-control form-control" id="defaultInput" value="<?= $edit['token_rumah']; ?>" placeholder="Outlet...">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat </label>
                                <textarea class="form-control" rows="5" name="alamat_rumah"><?= $edit['alamat_rumah']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="largeInput">No Telepon</label>
                                <input type="text" name="telp" class="form-control form-control" id="defaultInput" value="<?= $edit['telp']; ?>" placeholder="No Telp..." maxlength="15">
                            </div>
                            
                            




                            <div class="form-group">
                                <label for="alamat">Link Relay 1 </label>
                                <textarea class="form-control" rows="5" name="relay1"><?= $edit['relay1']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Link Relay 2 </label>
                                <textarea class="form-control" rows="5" name="relay2"><?= $edit['relay2']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Link Relay 3 </label>
                                <textarea class="form-control" rows="5" name="relay3"><?= $edit['relay3']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Link Relay 4 </label>
                                <textarea class="form-control" rows="5" name="relay4"><?= $edit['relay4']; ?></textarea>
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
<?php require 'footer.php';
