<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style/reset.css">
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css"
	href="DataTables/media/css/jquery.dataTables.css">
<title>User Page</title>
</head>



<?php

require ('includes/config.php');

// if not logged in redirect to login page
if (! $user->is_logged_in ()) {
	header ( 'Location: login.php' );
}

// define page title
$title = 'Members Page';

// include header template
require ('layout/header.php');
?>


	<div class="row">

	<div
		class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

		<h2>Member only page</h2>
		<p>
			<a href='logout.php'>Logout</a>
		</p>
		<h3>Documents</h3>
				<?php
				
				require_once ('includes/connect.php');
				require_once ('includes/utils.php');
				//var_dump($_SESSION);
				$userName =$_SESSION['userName'];
				?>
				<h3>User:<?php echo "$userName";?></h3>
		<hr>
				
				
<?php
require_once ('includes/connect.php');
$memberID = $_SESSION ['memberID'];
/* $sql = $dbh->prepare ( "SELECT * FROM documents where memberID='$memberID'" ); */
$sql = $dbh->prepare ( "SELECT * FROM documents where memberID='$memberID'" );
$sql->execute ();
$result = $sql->fetchAll ( PDO::FETCH_ASSOC );

?>


				
<table id="maintable" class="display" cellspacing="0" width="100%">
			<thead>
				<tr>

					<th>ID</th>
					<th>Edit</th>
					<th>File Name</th>
					<th>Expiration Date</th>
					<th>Comments</th>
					<th>Upload Time</th>
					<th>File Path</th>

				</tr>
			</thead>

			<tbody>
		
		
		<?php
		
		if (! empty ( $result )) {
			foreach ( $result as $row ) {
				
				/*
				 * $filePath=$row['filePath'];
				 * $_SESSION ['filePath'] = $filePath;
				 */
				
				echo "   <tr>";
				// echo "<td> <a href='". $row ['filePath'] . "'>View file</a> </td>";
				// echo "<td> <a href= readfile.php?filePath='".$row ['filePath']."'>View file</a> </td>";
				
				echo "<td>" . $row ['did'] . "</td>";
				echo "<td> <a href= 'upload.php'</a> Edit  </td>";
				echo "<td>" . $row ['filename'] . "</td>";
				echo "<td>" . $row ['expdate'] . "</td>";
				echo "<td> " . $row ['comment'] . "</td>";
				echo "<td>" . $row ['uploadTime'] . "</td>";
				// echo "<td> <a href= readfile.php?filePath=".$row ['filePath'].">View file</a> </td>";
				echo "<td> <a href= checkuserForm.php?filePath=" . $row ['filePath'] . ">View file</a> </td>";
				// header( "refresh: 5; url= readfile.php" );
				echo " </tr>";
			}
		}
		
		?>
		</tbody>
		</table>
		<form action="upload.php" method="POST" enctype="multipart/form-data">
			<input type="submit" id="submit" name="submit"
				value="Upload New Document" />
		</form>
		<!--Javascript At the buttom for speed-->
		<script type="text/javascript" src="script/jquery2.1.1.js"></script>
		<script type="text/javascript"
			src="DataTables/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="script/main.js"></script>

		</body>

</html>

</div>
</div>



</div>

<?php
// include header template
require ('layout/footer.php'); 
?>