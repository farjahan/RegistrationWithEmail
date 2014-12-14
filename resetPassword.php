<?php

require ('includes/config.php');

// if logged in redirect to members page
if ($user->is_logged_in ()) {
	header ( 'Location: memberpage.php' );
}

// if form has been submitted process it
if (isset ( $_POST ['submit'] )) {
	
	// email validation
	if (strlen ( $_POST ['password'] ) < 3) {
		$error [] = 'Password is too short.';
	}
	
	if (strlen ( $_POST ['passwordConfirm'] ) < 3) {
		$error [] = 'Confirm password is too short.';
	}
	
	if ($_POST ['password'] != $_POST ['passwordConfirm']) {
		$error [] = 'Passwords do not match.';
	}
	// if no errors have been created carry on
	if (! isset ( $error )) {
		
		// hash the password
		$hashedpassword = $user->password_hash ( $_POST ['password'], PASSWORD_BCRYPT );
		$login_attempts_value = 0;
		try {
			$setEMail= trim ( $_GET ['email']);
			var_dump($setEMail);
			
			var_dump($setEMail);
			// insert into database with a prepared statement
			$stmt = $db->prepare("UPDATE members SET password = :hashedpassword, login_attempts =:login_attempts_value WHERE email = :setEMail");
			$stmt->execute(array(
				':hashedpassword' => $hashedpassword,
				':login_attempts_value' => $login_attempts_value,
				':setEMail' => $setEMail 
			));
		} catch ( PDOException $e ) {
			$error [] = $e->getMessage ();
		}
		$error [] = 'password sucessfully reset';
	}
}


// define page title
$title = 'Reset Password';

// include header template
require ('layout/header.php');
?>

<div class="container">

	<div class="row">

		<div
			class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Reset Password</h2>
				<p>
					<a href='login.php'>Back to login page</a>
				</p>
				<hr>

				<?php
				// check for any errors
				if (isset ( $error )) {
					foreach ( $error as $error ) {
						echo '<p class="bg-danger">' . $error . '</p>';
					}
				}
				
				if (isset ( $_GET ['action'] )) {
					
					// check the action
					switch ($_GET ['action']) {
						case 'active' :
							echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
							break;
						case 'reset' :
							echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
							break;
					}
				}
				?>

				<div class="form-group">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password"
									class="form-control input-lg" placeholder="Password"
									tabindex="3">
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="passwordConfirm"
									id="passwordConfirm" class="form-control input-lg"
									placeholder="Confirm Password" tabindex="4">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6 col-md-6">
							<input type="submit" name="submit" value="submit"
								class="btn btn-primary btn-block btn-lg" tabindex="5">
						</div>
			
			</form>
		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>