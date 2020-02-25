<?php
session_start();
if (isset($_SESSION['user_id'])) {
	include 'layouts/header.php';
	include 'layouts/header_for_user_page.php';
	include 'connect.php';
	$target_dir = "uploaded/";
	$user_id = $_SESSION['user_id'];
	$select = "SELECT * FROM `gallery` WHERE `user_id` = '$user_id' ";
	$result = mysqli_query($connect, $select);
}
else header('location:index.php');
?>

<div class="container">
	<div class="row">
		<div class="form_avatar form_upload_image">
			<form action="upload_image_gallery.php" method="post" enctype="multipart/form-data">
				<label for="images">Select image</label>
				<input type="file" id="images" name="image_file[]" multiple>
				<input type="submit" id="upload" name="gallery_images" value="Upload">
			</form>
		</div>
	</div>
	<div class="row">
		<?php while ($row = mysqli_fetch_assoc($result)) {?>
		<div class="extra">
			<div class="like">
				<i class="fa fa-thumbs-o-up up" aria-hidden="true"></i>
				<i class="fa fa-thumbs-o-down down" aria-hidden="true"></i>
			</div>
			<div class=" btn btn-info btn-lg delete_button" data-toggle="modal" data-target="#myModal">Delete</div>
			<?php echo"<a href='".$target_dir.$row['img_name']."'data-fancybox='gallery'><img src='".$target_dir.$row['img_name']."'data='".$row['img_name']."'></a>"; ?>
		</div>
		<?php	} ?>
	</div>

	<div class="row">
		<div class="container">
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">
							<p>Are you serious?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default yes" data-dismiss="modal">YES</button>
							<button type="button" class="btn btn-default no" data-dismiss="modal">NO</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'layouts/footer.php'; ?>