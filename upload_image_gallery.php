<?php
session_start();
include 'connect.php';
$user_id = $_SESSION['user_id'];
	if (isset($_POST['gallery_images'])) {
  $target_dir = "uploaded/";
  for($i = 0; $i < count($_FILES['image_file']['name']); $i++){
    $image_name = uniqid().basename($_FILES['image_file']["name"][$i]);
 		$image_tmp_name = $_FILES['image_file']["tmp_name"][$i];
 		$image_file_name = $target_dir.$image_name;
 		$imageFileType = pathinfo($image_file_name,PATHINFO_EXTENSION);

 		if (move_uploaded_file($image_tmp_name, $image_file_name)) {
    $insert = "INSERT INTO `gallery` (`user_id`, `img_name`) VALUES ('$user_id', '$image_name' )";
     $insert = mysqli_query($connect,$insert);
  	}
  }
    header('location: gallery.php');
}
if (isset($_GET['img'])) {
		$target_dir = "uploaded/";
		$img_name = $_GET['img'];
		$delete = " DELETE FROM `gallery` WHERE `img_name` = '$img_name'";
		$result = mysqli_query($connect, $delete);
		unlink($target_dir.$img_name);
}

   
?>