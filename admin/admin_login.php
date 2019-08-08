<?php
	require_once('phpscripts/config.php');
	date_default_timezone_set('America/Toronto');
	$time = date('Y-m-d H:i:s');
	$currentTime = strtotime($time);
	if($_SESSION['loggedin']=='yes'){
		redirect_to('admin_index.php');
	}
	if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($_POST['keepme'] != ''){
			$staylogged = 'yes';
		}else{
			$staylogged = 'no';
		}
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $currentTime,$staylogged);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php if(!empty($message)){ echo $message;} ?>
	<h1 id='logingreeting'>Welcome, please enter your login information below</h1>
	<div id ='fader'>
	<form action="admin_login.php" method="post" id="loginform">
		<label id="userloginlabel">Username</label>
		<br>
		<input id="userlogininput" type="text" name="username" value="" class="changepassword">
		<br>
		<label id="passwordloginlabel" >Password</label>
		<br>
		<input id="passwordlogininput" type="password" name="password" value="" class="changepassword">
		<br><br>
		<label for ='keepme'>Keep Me Logged In</label>
		<input type='checkbox' name="keepme">
		<br>
		<br>
		<input type="submit" name="submit" value="Login" id="submit">
		<br>
		<br>
		<a href='admin_forgot.php' id='forgotLink'>I Forgot My Password</a>
	</form>
	</div>

</body>
</html>
