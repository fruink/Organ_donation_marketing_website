<?php
    require_once('phpscripts/config.php');
    if(isset($_POST['submit'])){
        $email = trim($_POST['email']);
        if($email != ''){
            forgotPassword($email);
        }else{
            $message = 'Please Enter Your Email Address';
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
	<h1 id='logingreeting'>Enter Your Account's Email Address</h1>
    <p id='forgotSubHead'>(We'll Send You A Temporary Password Right Away)</p>
	<div id ='fader'>
	<form action="admin_forgot.php" method="post" id="loginform">
		<label id="userloginlabel">Email</label>
		<br>
		<input id="userlogininput" type="text" name="email" value="" class="changepassword">
		<br>
		<br>
		<input type="submit" name="submit" value="Send Me My Password" id="submit">
		<br>
		<br>
	</form>
	</div>
</body>
</html>