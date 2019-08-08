<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level";
		}else{
			$result = createUser($fname, $username, $email, $lvllist);
		}

	}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link rel="stylesheet" href="css/main.css">
</head>
<header>
		<?php if($_SESSION['loggedin'] == "yes"){
			echo '<a id="returnLink" href="../index.html">Return To Main Site</a>';
		}else{
			echo '<a id="returnLink" href="phpscripts/caller.php?caller_id=logout">Return To Main Site</a>';
		}?>
</header
<body>
	<h2 id="createheader">Create A New User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method = "post" id="createform">
		<label>First Name:</label>
		<input type="text" name= "fname" value = "" placeholder="Their First Name"class="createInput">
		<label>Username:</label>
		<input type="text" name= "username" value = "" placeholder="Their Username" class="createInput">
		<label>Email:</label>
		<input type="text" name= "email" value = "" placeholder="Their Email" class="createInput">
		<select name="lvllist">
			<option value="">Select User Level</option>
			<option value="2">Site Admin</option>
			<option value="1">Web Master</option>
		</select>
		<input type="submit" name= "submit" value="Create User" id="submitUser">
	</form>
	<div id="backToMenu">
		<a href="admin_index.php" class="indexlink">Back To Menu</a>
	</div>
</body>
</html>
