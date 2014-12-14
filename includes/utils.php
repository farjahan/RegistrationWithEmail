<?php

function getUserInfo($username, $dbh) {
	$sql = $dbh->prepare ( "SELECT * FROM members WHERE email='$username'" );
	$sql->execute ();
	$result = $sql->fetchAll ( PDO::FETCH_CLASS );
	if (isset($result) && count($result) > 0) {
		return $result[0];
	}
}
function incrementLoginAttemptsForUserEmail($username, $dbh) {
	echo "Calling increment function";
	$sql = $dbh->prepare ( "Update members set login_attempts = login_attempts + 1 where email = '$username'" );
	$sql->execute ();
}

function resetAttemptsForUserEmail($username, $dbh) {
	$sql = $dbh->prepare ( "Update members set login_attempts = 0 where email = '$username'" );
	$sql->execute ();
}
?>