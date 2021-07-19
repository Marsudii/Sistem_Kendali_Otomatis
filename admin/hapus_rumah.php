<?php
require 'koneksi.php';

$query = "DELETE FROM tb_kontrol WHERE id_token = " . $_GET['id'];
$delete = mysqli_query($conn, $query);

if ($delete == 1) {
    $_SESSION['msg'] = 'Berhasil Mengahapus Data';
    header('location:rumah.php?');
} else {
    $_SESSION['msg'] = 'Gagal Hapus Data!!!';
    header('location:rumah.php');
}
