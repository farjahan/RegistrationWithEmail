<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Upload Document</title>
<link rel="stylesheet" type="text/css" href="style/reset.css">
<link rel="stylesheet" type="text/css" href="style/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>
<body>



<?php 
require ('includes/connect.php');
require ('includes/utils.php');
require_once ('includes/config.php');

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Validate user password';

//include header template
require('layout/header.php'); 
if (isset( $_POST ['submit'] )) {
	 $username=$_SESSION ['username'] ;
	 $fileinfo=$_POST["filePath"];
	 var_dump($username);
	 var_dump($fileinfo);
	$password = $_POST ['password'];
	var_dump($password);
	$userInfo = getUserInfo ( $username, $dbh );
	
	if (isset ( $userInfo )) {
		if ($userInfo->login_attempts >= 3) {
			header ( 'Location: Lock.php' );
		} else {
			
		if ($user->login ( $username, $password )) {
				
				resetAttemptsForUserEmail ( $username, $dbh );
				$_SESSION ['username'] = $username;
				$_SESSION ['fileinfo'] = $fileinfo;
				header ( "Location: readfile.php");
				exit ();
			} else {
		
				incrementLoginAttemptsForUserEmail ( $username, $dbh );
				/* $error[] = 'Wrong username or password or your account has not been activated.'; */
				
				$error [] = 'Wrong username or password.';
			}
		}
	} else {
		echo "User with email $username does not exist";
	}
	ob_end_flush ();
}
?>

  

<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<h2>Validate user password</h2>
				<p><a href='logout.php'>Logout</a></p>
				<hr>

<div id="register">
<form id="form" class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3" method="post" enctype="multipart/form-data"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	
			<?php 
			
			$filePath =$_GET['filePath'];
			?>
	<input type='hidden' name="filePath" value="<?php echo $filePath; ?>" />
							<div>
							<?php echo "$error"?>
							<input type="password" id="password" name="password"
								class="rinput" placeholder="Password" /> <br><br>
							
							<input type="submit"  class="newcreateacc" name="submit" value="submit" />
						</div>
	</form>
	</div>
	<!--Javascript-->
	<script type="text/javascript" src="script/jquery2.1.1.js"></script>
	<script type="text/javascript"
		src="DataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="script/jquery-ui.js"></script>
	<script type="text/javascript" src="script/main.js"></script>
</body>

</html>


