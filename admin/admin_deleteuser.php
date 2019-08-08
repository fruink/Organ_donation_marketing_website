<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$tbl = "tbl_users";
	$users = getAllUsers($tbl);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Delete User</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
<header>
		<?php if($_SESSION['loggedin'] == "yes"){
			echo '<a id="returnLink" href="../index.html">Return To Main Site</a>';
		}else{
			echo '<a id="returnLink" href="phpscripts/caller.php?caller_id=logout">Return To Main Site</a>';
		}?>
</header
	<h2 id="createheader">Select A User To Delete</h2>
	<div id="employeeCont">
	<?php
		while($row = mysqli_fetch_array($users)){
			echo "<div class='deleted'><h2 class='deletedname'>{$row['user_fname']} </h2><a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Fired</a></div>";
		}
	?>
	</div>
</body>
</html>
