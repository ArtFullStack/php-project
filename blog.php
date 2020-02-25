<?php
session_start();
if (isset($_SESSION['user_id'])){
	include 'layouts/header.php';
	include 'layouts/header_for_user_page.php';
	include 'connect.php';
	$select = "SELECT * FROM `blog` ORDER BY id DESC";
	$result = mysqli_query($connect, $select);
}
else header('location:index.php')

	?>
	<div class="container">
		<div class="row">
			<div class="add_blog">
				<div class="add"><h2>Add article<i class="fa fa-chevron-down" aria-hidden="true"></i></h2></div>
				<div class="form_blog">
					<form action="add_blog.php" method="post" enctype="multipart/form-data">
						<label>Title<input type="text" name="title" id="title"></label>
						<label class="label_file">Image<input type="file" name="file" id="file"></label><br>
						<label>Text<textarea name="text" id="text" cols="100" rows="5"></textarea></label><br>
						<input type="submit" value="Add" name="done" id="submit">
					</form>
				</div>
			</div>
		</div>

		<?php while ($row = mysqli_fetch_assoc($result)){
			$user_id = $row['user_id'];
			$select_user_info = "SELECT * FROM `users` WHERE `id` = '$user_id'";
			$result_user_info = mysqli_query($connect, $select_user_info);
			$user_info = mysqli_fetch_assoc($result_user_info);
			?>
			<div class = 'row'>
		<?php if ($_SESSION['role'] =='ADMIN') {?>
		<div class="update_blog">
			<div class="update">
				<h2>Update article<i class="fa fa-chevron-down" aria-hidden="true"></i></h2>
			</div>
			<div class="form_update_blog">
				<form action="update_blog.php" method="post">
					<label>Title<input type="text" name="title" id="title" value="<?php echo $row['title']?>"></label><br>
					<label>Text<textarea name="text" id="text" cols="100" rows="5"><?php echo $row['description']?></textarea></label><br>
					<input type="hidden" name="blog_id" value="<?php echo $row['id']?>">
					<input type="submit" value="Update" name="update" id="submit">
					<input type="submit" value="Delete" name="delete" id="submit">
				</form>
			</div>
		</div>
		<?php } ?>

				
				<div class='blog'>
					<div class='blog_image'>
						<img src='<?php echo $row['img']?>'>

					</div>
					<div class='text'>
						<div class="user_info_blog">
							<span class='created'>Date of creation: <?php echo $row['created_at']?></span>
							<span class="user_avatar"><img src="<?php echo $user_info['avatar'] ?>" alt=""></span>
							<span class="user_firstname"> <?php echo $user_info['firstname'] ?></span>
							<span class="user_lastname"> <?php echo $user_info['lastname'] ?></span>
							<span class="user_status"> <?php echo $user_info['status'] ?></span>
						</div>
						<a href="blog_info.php ? blog_id=<?php echo $row['id']?> & img=<?php echo $row['img']?> & title=<?php echo $row['title']?> & created=<?php echo $row['created_at']?>& description=<?php echo $row['description']?>" class='title'><?php echo $row['title']?> </a>
						<p><?php echo $row['description']?></p>	
						<a href="blog_info.php ? blog_id=<?php echo $row['id']?> & img=<?php echo $row['img']?> & title=<?php echo $row['title']?> & created=<?php echo $row['created_at']?>& description=<?php echo $row['description']?>" class='read'>Read more.</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>


		<?php
		include 'layouts/footer.php'
		?>