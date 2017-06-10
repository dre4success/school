
<?php
	
	# page title
	$title = 'Register';

	# include db connection
	include 'includes/db.php';

	# include header
	include 'includes/header.php';

	# include functions 
	include 'includes/functions.php';

	# include registerClass
	include 'includes/registerClass.php';

	$registration = new Register();

	$errors = [];

	if(array_key_exists('register', $_POST)) {

		if(empty($_POST['fname'])) {
			$errors['fname'] = "Please Enter Your Firstname";
		}

		if(empty($_POST['lname'])) {
			$errors['lname'] = "Please Enter Your Lastname";
		}

		if(empty($_POST['email'])) {
			$errors['email'] = "Please Enter Your Email";
		}

		// checking for duplicate email
		$check = $registration->doesEmailExist($conn, $_POST['email']);

		if($check) {
			$errors['email'] = "Email already exists";
		}

		if(empty($_POST['password'])) {
			$errors['password'] = "Please Enter Your Password";
		}

		if(empty($_POST['pword'])) {
			$errors['pword'] = "Please Enter Your Password again";

			if($_POST['pword'] != $_POST['password']) {
				$errors['pword'] = "Passwords do not match";
			}
		}

		if(empty($errors)) {

			
		}


	}

?>


<div class="wrapper">
		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>
				<label>first name:</label>
				<?php if(isset($errors['fname'])) { echo '<span class="err">'.$errors['fname'].'</span>'; } ?>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

<?php
	
	# include footer
include 'includes/footer.php';

?>