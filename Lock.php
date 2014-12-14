<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style/lock.css">

</head>



<?php

require ('includes/config.php');

// define page title
$title = 'Locked Page';

// include header template
require ('layout/header.php');
?>

<body>

	<button><a href="http://localhost/currentlyWoringRegistration/login.php">Back Login Page</a> </button>
	<div id="container">
		<h1>Your account is locked. Plaese reset your password</h1>

		<img src="http://i.imgur.com/0MM97Hh.png" title=" Account is Lock" />


	</div>
</body>
</html>