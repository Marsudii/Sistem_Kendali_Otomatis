<?php
$title = 'Edit Data Pengguna';
require 'koneksi.php';

$role = [
    'admin',
    'pengguna'
    
];
$id_user = $_GET['id'];
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_user'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $id_token = $_POST['id_token'];
    if ($_POST['password'] != null || $_POST['password'] == '') {
        $password = md5($_POST['password']);
        $query = "UPDATE user SET nama_user = '$nama', email = '$email', username = '$username', role = '$role', password = '$password' WHERE id_user = '$id_user'";
    } else {
        $query = "UPDATE user SET nama_user = '$nama',  email = '$email', username = '$username', role = '$role' WHERE id_user = '$id_user'";
    }

    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil Update ' . $role;
        header('location:pengguna.php');
    } else {
        echo "<div class='alert alert-danger>Gagal Update Data!!!</div>";
        $_SESSION['msg'] = 'Gagal mengupdate data ' . $role . '!!!';
        header('location:pengguna.php');
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
                    <a href="pengguna.php">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <?php while ($edit = mysqli_fetch_array($queryedit)) {
                    ?>
                        <form action="" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="largeInput">Nama Pengguna</label>
                                    <input type="text" name="nama_user" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_user']; ?>" placeholder="Nama...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Email</label>
                                    <input type="text" name="email" class="form-control form-control" id="defaultInput" value="<?= $edit['email']; ?>" placeholder="Email...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Username</label>
                                    <input type="text" name="username" class="form-control form-control" id="defaultInput" value="<?= $edit['username']; ?>" placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Password</label>
                                    <input type="text" name="password" class="form-control form-control" id="defaultInput">
                                    <small>Kosongkan jika tidak melakukan perubahan password</small>
                                </div>
                                <div class="form-group">
                                    <label for="defaultSelect">Role</label>
                                    <select name="role" class="form-control form-control" id="defaultSelect">
                                        <?php foreach ($role as $key) : ?>
                                            <?php if ($key == $edit['role']) : ?>
                                                <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                        <?php endforeach ?>
                                    </select>
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
<?php } ?>
<?php require 'footer.php';
