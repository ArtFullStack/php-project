<?php
include 'connect.php';
if (isset($_POST['update'])) {
	$blog_id = $_POST['blog_id'];
	$title = $_POST['title'];
	$text = $_POST['text'];
	$update = "UPDATE `blog` SET `title` = '$title',`description` = '$text' WHERE `id` = '$blog_id'";
	$result = mysqli_query($connect, $update);
	header('location:blog.php');
}

if (isset($_POST['delete'])) {
	$blog_id = $_POST['blog_id'];
	$delete = "DELETE FROM `blog`  WHERE `id` = '$blog_id'";
	$result = mysqli_query($connect, $delete);
	header('location:blog.php');
}

?>