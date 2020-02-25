<?php
session_start();
include 'connect.php';
$user_id = $_SESSION['user_id'];
	if (isset($_POST['upload'])) {
		$image_name =  uniqid().basename($_FILES["images"]["name"]);
		$image_tmp_name = $_FILES["images"]["tmp_name"];
    $imageFileType = pathinfo("uploaded/".$image_name,PATHINFO_EXTENSION);

    if ($_FILES["images"]["size"] > 500000) {
        $_SESSION['error_size'] = "Sorry, your file is too large.";
    }
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
       $_SESSION['error_type'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    if (move_uploaded_file($image_tmp_name, "uploaded/".$image_name)) {
      $update = "UPDATE `users` SET `avatar` = '$image_name' WHERE `id`='$user_id'";
      if(isset($_POST['current_image']) && !empty($_POST['current_image'])){
        $current_image = $_POST['current_image'];
        if(file_exists($current_image)){
            unlink($current_image);
        }
       }
       	$result = mysqli_query($connect,$update);
    	}
    	header("location: account_user.php");
   }

?>