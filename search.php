<?php
include 'connect.php';

if(isset($_GET['value']) && !empty($_GET['value'])){
	$target_dir = 'uploaded/';
	$form_value = trim($_GET['value']);
	$select = "SELECT * FROM `users`  WHERE `firstname` LIKE '%$form_value%' or `lastname` LIKE '%$form_value%'";
	$result = mysqli_query($connect, $select);
	$i = 0;
	while($row = mysqli_fetch_assoc($result)){
		echo "
		<div class='box_result' data='".$row['id']."'>
			<a>
				<img src='".$target_dir.$row['avatar']."'>
				<span>".$row['firstname']."</span>
				<span>".$row['lastname']."</span>
			</a>
		</div>" ;
	}
}
?>