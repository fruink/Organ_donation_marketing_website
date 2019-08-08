<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_users";
	$col = "user_id";
	$popForm = getUser($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
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
	<h2 id="createheader">Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post" id="editform">
		<label>First Name:</label>
		<input type="text" name="fname" value="<?php echo $info['user_fname'];  ?>" class="createInput"><br><br>
		<label>Username:</label>
		<input type="text" name="username" value="<?php echo $info['user_name'];  ?>" class="createInput"><br><br>
		<label>Password:</label>
		<input type="text" name="password" value="Leave Blank If You Would Like To Keep The Same Password" class="createInput"><br><br>
		<label>Email:</label>
		<input type="text" name="email" value="<?php echo $info['user_email'];  ?>" class="createInput"><br><br>
		<input type="submit" name="submit" value="Edit Account" id="submitUser">
	</form>
	<div id="backToMenu">
		<a href="admin_index.php" class="indexlink">Back To Menu</a>
	</div>
</body>
</html>