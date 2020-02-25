<?php
session_start();
include 'layouts/header.php';
include 'reg_process.php';

?>

<header>
	<div class="container">
		<div class="row">
			<div class="col-md-2">
				<div class="logo">
					<a href="../index.php"><h2>New page</h2></a>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-6 sing_log">
				<span id="sing">Create account</span>
				<span id="login">Log in</span>
			</div>
		</div>
	</div>
</header>
<div class="registerlogin">
	<div class="register">
		<div class="close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</div>
		<form action="" method="post">
			<h2>Registration</h2>
			<div>
				<label for="firstname">First name</label>
				<input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION['firstname']; unset($_SESSION['firstname']);?>">
				<p class = "error error1"><?php echo $_SESSION['error_firstname']; unset($_SESSION['error_firstname']); ?></p>
			</div>
			<div>
				<label for="lastnamne">Lastname</label>
				<input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION['lastname']; unset($_SESSION['lastname']);?>">
				<p class = "error error2"><?php echo $_SESSION['error_lastname']; unset($_SESSION['error_lastname']); ?></p>
			</div>
			<div>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $_SESSION['email']; unset($_SESSION['email']);?>">
				<p class = "error error3"><?php echo $_SESSION['error_email']; unset($_SESSION['error_email']); ?></p>
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
				<p class = "error error4"><?php echo $_SESSION['error_password']; unset($_SESSION['error_password']); ?></p>
			</div>
			<div>
				<label for="repassword">Repassword</label>
				<input type="password" name="repassword" id="repassword">
				<p class = "error error5"></p>
			</div>
			<div>
				<label>Male<input id="gender" type="radio" name="gender" value="male" checked=""></label>
				<label>Female<input id="gender" type="radio" name="gender" value="female"></label>
			</div>
			<div>
				<input type="submit" name="submit" id="submit" value="Submit">
			</div>
			<div class="info"><?php echo $_SESSION['success']; unset( $_SESSION['success']); ?></div>
		</form>
	</div>



	<div class="login">
		<div class="close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</div>
		<form action="log_process.php" method="post">
			<div>
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?php echo $_SESSION['log_email']; unset($_SESSION['log_email']); ?>">
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" id="password">
			</div>
			<div>
				<input type="submit" name="login" id="submit" value="Log in">
				<span class="forgot"><a href="#">Forgot password?</a></span>
			</div>
			<p class = "error_email"><?php echo $_SESSION['error_em_pass']; unset($_SESSION['error_em_pass']); ?></p>
		</form>
	</div>


	<div class="forgot_password_form">
		<div class="close">
			<i class="fa fa-times" aria-hidden="true"></i>
		</div>
		<form action="forgot_password.php" method="post">
			<div>
				<label for="email">Please enter your email</label>
				<input type="text" name="email" id="email">
			</div>
			<div>
				<input type="submit" name="send" id="submit" value="Send">
			</div>
			<p class="error_msg"><?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg'])?></p>
			<p class="send_msg"><?php echo $_SESSION['send_msg']; unset($_SESSION['send_msg'])?></p>
		</form>
	</div>
</div>


<div class="container">
	<div class="row">
		<div class="col-md-12 mysite">
			<h2>Home page</h2>
		</div>
	</div>
</div>

<?php include 'layouts/footer.php' ?>