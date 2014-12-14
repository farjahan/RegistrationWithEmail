<?php
include 'includes/connect.php';
include 'includes/utils.php';
require('includes/config.php');
if(!$user->is_logged_in()){ header('Location: login.php'); }

//define page title
$title = 'View Documents';

//include header template
require('layout/header.php');

$Path = trim ( $_SESSION ['fileinfo'], ' ' );
//var_dump($Path);
$path_parts = pathinfo ( "$Path" );
$directoryName = $path_parts ['dirname'];
$FileName = $path_parts ['filename'];
var_dump($FileName);
$FileExtension = $path_parts ['extension'];
$Base = $path_parts ['basename'];
var_dump($Base);

// check user password/pin to view image/documents

// header( "refresh: 5; url= checkuserPassword.php" );

if ($FileExtension == "pdf") {
	
	$file = "$Path";
	$fp = fopen ( $file, "r" );
	
	header ( "Cache-Control: maxage=1" );
	header ( "Pragma: public" );
	header ( "Content-type: application/pdf" );
	header ( "Content-Disposition: inline; filename=" . $myFileName . "" );
	header ( "Content-Description: PHP Generated Data" );
	header ( "Content-Transfer-Encoding: binary" );
	header ( 'Content-Length:' . filesize ( $file ) );
	ob_clean ();
	flush ();
	while ( ! feof ( $fp ) ) {
		$buff = fread ( $fp, 1024 );
		print $buff;
	}
	exit ();
	header("refresh: 7; url= memberpage.php" );
} 

$ext1="http://localhost/storage/";
$ext ="$ext1"."$Base";
var_dump($ext);

echo " <center><img src='$ext'  width='400' height='400' title='nature' /></center>";
header("refresh: 7; url= memberpage.php" );
 
?>










