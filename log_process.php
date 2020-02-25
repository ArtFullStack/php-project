<?php
session_start();
include 'connect.php';
	if (isset($_POST['login'])) {
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$_SESSION['log_email'] = $email;
		$select = "SELECT * FROM `users` WHERE `email`='$email'";
		$select_query = mysqli_query($connect, $select);
		$user_data = mysqli_fetch_assoc($select_query);

    if(password_verify($password,$user_data['password'])) {
       $_SESSION['user_id'] = $user_data['id'];
    	 $_SESSION['role'] = $user_data['role'];
    	 header("location: account_user.php");
    }
    else {
       $_SESSION['error_em_pass'] = "Wrong password or email address!";
       header("Location: index.php");
    }
  }

?>