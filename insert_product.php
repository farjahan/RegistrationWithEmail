<?php require('includes/config.php'); 


//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); }


require_once  ('includes/connect.php');
require_once ('includes/utils.php');
//define page title
$title = 'Insert Page';
if ($_SERVER ["REQUEST_METHOD"] == "POST") {

	//$uid = $_SESSION ['uid'];
	$filename = $_POST ["filename"];
	echo "\n \n $filename";
	$inputDate = $_POST ["expdate"];
	echo "\n \n $inputDate";
	$expdate = date ( "Y-m-d", strtotime ( $inputDate ) );
	echo "\n \n $expdate ";

	$comment = $_POST ["comment"];
	echo "\n \n $comment ";
	$target_dir = "C:/wamp/www/storage/";
	$filePath = $target_dir . basename ( $_FILES ["uploadfile"] ["name"] );
	$uploadOk = 1;
	echo "$filePath";
	if (file_exists ( $filePath )) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES ["uploadfile"] ["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	echo "<br/>";
	echo $_FILES ['uploadfile'] ['tmp_name'];
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file ( $_FILES ["uploadfile"] ["tmp_name"], $filePath )) {
			echo "The file " . basename ( $_FILES ["uploadfile"] ["name"] ) . " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	echo "New records created successfully";
	date_default_timezone_set ( "America/Los_Angeles" );
	$t = time ();
	$uploadTime = (date ( "Y-m-d H:i:s", $t ));
	echo"$uid"."user id";
		$name =$_SESSION['username'];
		$memberID=$_SESSION['memberID'];
		echo"</br></br> $memberID";
		echo"</br></br> $name";
	$stmt = $dbh->prepare ("INSERT INTO documents (filename,expdate,comment,uploadTime,filePath,memberID) VALUES (?,?,?,?,?,?)" );

	$stmt->bindParam ( 1, $filename );
	$stmt->bindParam ( 2, $expdate );
	$stmt->bindParam ( 3, $comment );
	$stmt->bindParam ( 4, $uploadTime );
	$stmt->bindParam ( 5, $filePath );
	$stmt->bindParam ( 6, $memberID);
	$stmt->execute ();

}

header( "refresh: 5; url= memberpage.php" );

//include header template
require('layout/header.php'); 
?>
