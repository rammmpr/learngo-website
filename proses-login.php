<?php
session_start();
include("koneksi.php");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
    	$qry = mysqli_fetch_array($row);
    	$_SESSION['id'] = $row['id'];
        $_SESSION['nama_file'] = $row['nama_file'];
        $_SESSION['image'] = $row['image'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lasttname'] = $row['lasttname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['cpassword'] = $row['cpassword'];
        $_SESSION['about'] = $row['about'];
        
        header("Location: dashboard.php?berhasil");
        // exit();
    } else {
        echo "<script>alert('Ooops..Email atau password anda salah!');window.location='login.php';</script>";
    }
}
?>