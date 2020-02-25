<?php
session_start();
include 'connect.php';


if (isset($_GET['data'])) {
	$string = crypt($_SESSION['string']);
	$email = $_SESSION['mail'];
	$update = mysqli_query($connect, "UPDATE users SET password = '$string' WHERE email = '$email'");

	header("location:index.php");die;
}



if (isset($_POST['send'])){
	$str = range("a","z");
	$num = range(0, 9);
	shuffle($str);
	shuffle($num);
	array_splice($str, 3);
	array_splice($num, 3);
	$arr = array_merge($str,$num);
	shuffle($arr);
	$string = implode("", $arr);

	$email = $_POST['email'];
	$_SESSION['string'] = $string;
	$_SESSION['mail'] = $email;

	$select = mysqli_query($connect, "SELECT email FROM users WHERE email = '$email'");

	if (empty($_POST['email'])) {
		$_SESSION['error_msg'] = "Wrong email address!";
		header("location:index.php");die;
	}

	else{

		if (!mysqli_num_rows($select)) {
			$_SESSION["error_msg"] = "Email address does not exist";
			header("location: index.php");die;
		}

		else{
			$to = $email;
			$subject = "Change Password";
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8";
			$message = "<div style='background:#B9FF87; padding:10px;'>
			<p>Your new password: <b>$string <b><a href='http://project.php/forgot_password.php?data=data'>Click on the link belowto change your password</a></p>
			</div>";

			mail($to, $subject, $message, $headers);
			$_SESSION['send_msg'] = "New password has been sent to your mail";
			header("location:index.php");
		}
	}
}







if (isset($_POST['change'])) {
	$user_id = $_SESSION['user_id'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$new_repassword = $_POST['new_repassword'];
	$select = mysqli_query($connect, "SELECT password FROM users WHERE id = '$user_id'");
	$row = mysqli_fetch_assoc($select);
	if (empty($new_password) || empty($old_password) || empty($new_repassword) || $new_password != $new_repassword) {
		$_SESSION['error_match'] = "Passwords do not match";
		header("location:account_user.php");die;	
	}
	else{
		
		if (password_verify($old_password,$row['password'])) {
			$new_password = crypt($new_password);
			$update = mysqli_query($connect, "UPDATE users SET password = '$new_password' WHERE id = '$user_id'");
			if (mysqli_affected_rows($connect) > 0) {
				$_SESSION['done_change'] = "Password changed";
				header("location:account_user.php");die;
			}
		}
		else{
			$_SESSION['error_match'] = "old password does not match";
			header("location:account_user.php");
		}
		
		
	}
	
}

?>