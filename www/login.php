<?php
	
		# page title
	$title = 'School | Login';

	# include db connection
	include 'includes/db.php';

	# include header
	include 'includes/header.php';

	# include functions 
	include 'includes/functions.php';

	# include clas Login
	include 'includes/classLogin.php';

	$login = new Login();

	$errors = [];

	if(array_key_exists('login', $_POST)) {

		if(empty($_POST['email'])) {
			$errors['email'] = "Please Enter Your Email";
		}

		if(empty($_POST['password'])) {
			$errors['password'] = "Please Enter Your Password";
		}

		if(empty($errors)) {
			$clean = array_map('trim', $_POST);

			$check = $login->doLogin($conn, $clean);

			$_SESSION['id'] = $check['admin_id'];
			
			header("Location:home.php");
		}
	}
?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
				<hr>
		<form id="register" action ="login.php" method ="POST">
			<div>
				<?php if(isset($errors['email'])) { echo '<span class="err">'.$errors['email'].'</span>'; } ?>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="login" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
		</div>