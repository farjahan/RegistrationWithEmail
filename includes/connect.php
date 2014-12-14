<?php
  $user = "root";
  $pass = "password";

        $dbh = new PDO ( 'mysql:host=localhost;dbname=hello', $user, $pass, array (
		PDO::ATTR_PERSISTENT => true 
) );
?>
        