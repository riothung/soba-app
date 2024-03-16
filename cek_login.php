<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($conn, "SELECT * from user where username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($login);

if (empty($username)) {
    header("Location:index.php?error=Username is Required!");
    exit();
} else if (empty($password)) {
    header("Location:index.php?error=Password is Required!");

} else {
    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        // Set level berdasarkan data dari database
        $_SESSION['username'] = $username;
        $_SESSION['level'] = $data['level'];

        if ($data['level'] == "admin" || $data['level'] == "adminbayangan") {
            header("Location: halaman_admin.php");
        // } else if ($data['level'] == "user") {
        //     header("Location: halaman_user.php");
        } else {
            header("Location: index.php?error=Invalid User Level");
        }
    } else {
        header("Location: index.php?error=Incorrect Username or Password!");
        exit();
    }
}
?>