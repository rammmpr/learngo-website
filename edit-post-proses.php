<?php
	include 'koneksi.php';

    session_start();
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$author = $_SESSION['firstname'];
    $contents = $_POST['contents'];
    $categories = $_POST['categories'];
	$date = date('Y-m-d H:i:s');
	$img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
	
	$query = "UPDATE post SET 
		title = '$title', 
		author = '$author', 
		content = '$contents', 
		categories = '$categories', 
		date = '$date', 
		nama_file = '".$_FILES['img']['name']."',
		img = '$img'
		WHERE id = $id";
	
	$hasil = mysqli_query($koneksi, $query);
	
	if (!$hasil) {
    	die("Update data gagal: " . mysqli_error($koneksi));
    } else {
    	echo "<script>alert('Data berhasil diubah.');window.location='all-post.php';</script>";
    }
	