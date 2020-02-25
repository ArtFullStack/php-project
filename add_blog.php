<?php
session_start();
include 'connect.php';
$user_id = $_SESSION['user_id'];
if (isset($_POST['done'])) {
	$target_dir = "uploaded/";
	$title = $_POST['title'];
	$img = $target_dir.$_FILES['file']['name'];
	$text = $_POST['text'];
	if (!strlen($_FILES['file']['name'])) {
		$img = $target_dir.'articles.jpg';
	}
	else{
		move_uploaded_file($_FILES['file']['tmp_name'], $img);
	}
		$insert = "INSERT INTO `blog` (`user_id`, `title`,`img`,`description`) VALUES ('$user_id', '$title', '$img', '$text')";
		$result = mysqli_query($connect, $insert);
	
	header('location:blog.php');
}

?>