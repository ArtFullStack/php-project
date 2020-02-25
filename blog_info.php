<?php
session_start();
include 'layouts/header.php';
include 'layouts/header_for_user_page.php';

if (isset($_GET['blog_id']) && isset($_SESSION['user_id'])){
	$img = $_GET['img'];
	$created = $_GET['created'];
	$title = $_GET['title'];
	$description = $_GET['description'];?>

	<div class="container">
		<div class="row">
			<div class="blog_info">
				<div class="blog_title">
					<p>	<?php echo $title?></p>
				</div>
				<div class="blog_created">
					<p>	<?php echo $created?></p>
				</div>
				<div class="blog_img">
					<p><img src="<?php echo $img?>" alt=""></p>
				</div>
				<div class="blog_img">
					<p><?php echo $description?></p>
				</div>
			</div>

		</div>
	</div>

	<?php
}

?>
