<?php
	include 'koneksi.php';

	if ($_POST['password'] != $_POST['cpassword']) {
        // $_SESSION['alert_msg'] = 'Password and confirm password do not match';
        // header('Location: register.php');
		echo "<script>alert('Password and confirm password do not match');window.location='register.php';</script>";
        exit;
    }
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
	$role = $_POST['role'];
	
	$query = "INSERT INTO user (firstname, lastname, email, password, cpassword, role) VALUES ('$firstname', '$lastname', '$email', '$password', '$cpassword', '$role')";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if ($hasil) {
		echo "<script>alert('Pendaftaran Berhasil... Silahkan Login');window.location='login.php';</script>";
	} else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }

?>