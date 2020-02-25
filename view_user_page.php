<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
	include 'layouts/header.php';
	include 'layouts/header_for_user_page.php';
	include 'connect.php';
	$id = $_GET['id'];
	$select = " SELECT * FROM users WHERE id = '$id' ";
	$result = mysqli_query($connect, $select);
	$row = mysqli_fetch_assoc($result);
	$firstname = "<b>Firstname:</b> ".$row["firstname"];
	$lastname = "<b>Lastname:</b> ".$row["lastname"];
	$email = "<b>Email:</b> ".$row["email"];
	$gender = "<b>Gender:</b> ".$row["gender"];
	$avatar = "uploaded/".$row["avatar"];
	$status = "<b>Status:</b> ".$row["status"];
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="box">
				<div class="avatar">
					<img id="avatar" src="<?php echo $avatar ?>" alt="">
				</div>	
				<div class="msg_friend">
					<a href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Add Friend</a>
					<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Message</a>
				</div>
			</div>
		</div>
		<div class="col-md-3">

		</div>	
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="about_me box">
				<div class="toggle_user_info">
					<div class="icon">
						<i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
						About
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
			<div class="photo box">
				<div class="photo_info">
					<div class="icon">
						<i class="fa fa-camera" aria-hidden="true"></i>
						Photo
						<i class="fa fa-angle-down" aria-hidden="true"></i>
					</div>
				</div>
				
				<div class="user_photo">
					<?php 
					$select_photo = " SELECT * FROM gallery WHERE user_id = '$id' LIMIT 4";
					$result_photo = mysqli_query($connect, $select_photo);
					$target_dir = 'uploaded/';
					while ($query = mysqli_fetch_assoc($result_photo)){
					?>
						<a data-fancybox='<?php echo $target_dir.$query['img_name']; ?>' href="<?php echo $target_dir.$query['img_name']; ?>"><img src="<?php echo $target_dir.$query['img_name']; ?>" alt=""></a>

					<?php } ?>
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
		</div>
	</div>
</div>


<?php
include 'layouts/footer.php';
?>