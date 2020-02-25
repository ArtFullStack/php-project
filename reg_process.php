<?php
session_start();
include 'connect.php';
if (isset($_POST['submit'])) {
		$firstname = strip_tags($_POST['firstname']);
		$lastname = strip_tags($_POST['lastname']);
		$email = strip_tags($_POST['email']);
		$password = strip_tags($_POST['password']);
		$repassword = $_POST['repassword'];
		$gender = $_POST['gender'];
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$target_dir = "uploaded/";
		$error = false;
		if (empty($firstname)) {
			$_SESSION['error_firstname'] = 'Firstname is missing!';
			$error = true;
		}
		if (empty($lastname)) {
			$_SESSION['error_lastname'] = 'Lastname is missing!';
			$error = true;
		}
		if (empty($email)) {
			$_SESSION['error_email'] = 'Email is missing!';
			$error = true;
			
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['error_email'] = $email . "is not a valid email address";
      $error = true;
    }

		if (empty($password)) {
			$_SESSION['error_password'] = 'Password is missing!';
			$error = true;
		}
		if ($gender == 'male') {
			$user_face = 'male.png';
		}
		else{
			$user_face = 'female.png';
		}

		if (!$error) {
			if ($password == $repassword){
					$password = crypt($password);
					$insert = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`,`avatar`) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender','$user_face')";
				  $insert_query = mysqli_query($connect, $insert);
					session_unset();
					$_SESSION['success'] = 'Registration completed successfully';
				}

			else{
				$_SESSION['error_password'] = 'Passwords do not match!';
			}
		}
	}
	

?>