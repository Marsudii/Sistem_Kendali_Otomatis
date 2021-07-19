<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_skripsi");

$username = $_POST['username'];
$password = md5($_POST['password']);
$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
$row = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($row);
$cek = mysqli_num_rows($row);

if ($cek > 0) {
    if ($data['role'] == 'admin') {
        $_SESSION['role'] = 'admin';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['token_id'] = $data['token_id'];
        header('location:admin');
    } else if ($data['role'] == 'pengguna') {
        $_SESSION['role'] = 'pengguna';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['token_id'] = $data['token_id'];
        $_SESSION['nama_rumah'] = $data['nama_rumah'];
       
        $_SESSION['token_rumah'] = $data['token_rumah'];
        header('location:pengguna');
    } else if ($data['role'] == 'pengguna2') {
        $_SESSION['role'] = 'pengguna2';
        $_SESSION['username'] = $data['username'];
        $_SESSION['user_id'] = $data['id_user'];
        $_SESSION['token_id'] = $data['token_id'];
        header('location:pengguna2');
    }
} else {
    $message = 'Username atau password salah!!!';
    header('location:index.php?message=' . $message);
}
?>
