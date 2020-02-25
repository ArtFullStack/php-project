<?php
session_start();
include 'layouts/header.php';
include 'layouts/header_for_user_page.php';
include 'connect.php';

if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];
	$select = "SELECT * FROM `users` WHERE '$user_id' = `id`";
	$query = mysqli_query($connect, $select);
	$row = mysqli_fetch_assoc($query);
	$target_dir = "uploaded/";
	$firstname = "<b>Firstname:</b> ".$row["firstname"];
	$lastname = "<b>Lastname:</b> ".$row["lastname"];
	$email = "<b>Email:</b> ".$row["email"];
	$gender = "<b>Gender:</b> ".$row["gender"];
	$avatar = $target_dir.$row["avatar"];
	$status = "<b>Status:</b> ".$row["status"];
	
}
else{
	header('location:index.php');die;
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="box">
				<div class="avatar">
					<img id="avatar" src="<?php echo $avatar ?>">
				</div>	
				<div class="form_avatar">
					<form action="upload_image.php" method="post" enctype="multipart/form-data">
						<label for="images">Select image</label>
						<input type="file" id="images" name="images">
						<input type="hidden" name="current_image" value="<?php echo $avatar ?>">
						<input type="submit" name="upload" id="upload" value="Upload">
						<p class="error"><?php
						echo $_SESSION['error_type']."<br>".$_SESSION['error_siz']; 
						unset($_SESSION['error_type']);
						unset($_SESSION['error_siz']);
						?></p>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-md-offset-6">
			<div class="search">
				<form onsubmit="return false;">
					<input type="text" name="search" id="search" placeholder="User search">
					<div class="search_icon">
						<i class="fa fa-search" aria-hidden="true"></i>
					</div>
				</form>
				<div class="search_result"></div>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="about_me box">
				<div class="toggle_user_info">
					<div class="icon">
						<i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
						About me 
						<i class="fa fa-angle-down" aria-hidden="true"></i>
					</div>
				</div>
				<div class="user_info">
					<p><?php echo $firstname; ?></p>
					<p><?php echo $lastname; ?></p>
					<p><?php echo $email; ?></p>
					<p><?php echo $gender; ?></p>
					<p><?php echo $status; ?></p>
				</div>
			</div>
			<div class="friends box">
				<div class="icon">
					<i class="fa fa-users" aria-hidden="true"></i>
					Friends 0					
				</div>
			</div>
			<div class="guest box">
				<div class="icon">
					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
					Guests 0					
				</div>
			</div>
			<div class="change box">
				<div class="change_password">
					<span>Change password <i class="fa fa-angle-down" aria-hidden="true"></i></span>
				</div>
				<div class="change_password_form">
					<form action="forgot_password.php" method="post">
						<label>Old password<input type="text" name="old_password"></label>
						<label>New password<input type="text" name="new_password"></label>
						<label>Repeat new password<input type="text" name="new_repassword"></label>
						<input type="submit" value="Done" name="change">
					</form>
					<div class="error_match"><?php echo $_SESSION['error_match']; unset($_SESSION['error_match'])?></div>
					<div class="done_change"><?php echo $_SESSION['done_change']; unset($_SESSION['done_change'])?></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
include 'layouts/footer.php';
?>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>