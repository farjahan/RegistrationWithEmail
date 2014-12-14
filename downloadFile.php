<?php
include 'includes/connect.php';
include 'includes/utils.php';
require('includes/config.php');
if(!$user->is_logged_in()){ header('Location: login.php'); }

$Path = trim ( $_SESSION ['fileinfo'], ' ' );
$path_parts = pathinfo ( "$Path" );
$directoryName = $path_parts ['dirname'];
$FileName = $path_parts ['filename'];
$FileExtension = $path_parts ['extension'];
$Base = $path_parts ['basename'];

// check user password/pin to view image/documents

// header( "refresh: 5; url= checkuserPassword.php" );

 if ($FileExtension == "jpg") {
	$imagepath = "$Path";
	
	$image = imagecreatefromjpeg ( $imagepath );
	
	// get image height
	
	$imgheight = imagesy ( $image );
	
	// allocate color for image caption (white)
	
	$color = imagecolorallocate ( $image, 255, 255, 255 );
	
	// Add text to image bottom
	
	//imagestring ( $image, 5, 100, $imgheight - 50, "September 2005", $color );
	$blob = file_get_contents($imagepath);
	header ( 'Content-Type: image/jpeg' );
	header('Content-Length: ' + strlen($blob));
	die($blob);
	//imagejpeg ( $image );
} 
?>










