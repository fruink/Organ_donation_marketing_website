<?php

	function createUser($fname, $username, $email, $lvllist) {
		include('connect.php');
		$checkString = "SELECT * FROM tbl_users WHERE user_email = '{$email}'";
		$checkQuery = mysqli_query($link, $checkString);
		if($checkQuery == ''){
			echo 'That Email address is already in use.';
			echo $checkString;
		}else{
			$password = bin2hex(random_bytes(4));
    		$encrypted = password_hash($password, PASSWORD_DEFAULT);
			$userstring = "INSERT INTO tbl_users (user_fname, user_name, user_pass, user_email, user_lvl, user_verify) VALUES ('${fname}', '${username}', '${encrypted}', '${email}', '${lvllist}', 'nay')";
    		$userquery = mysqli_query($link, $userstring);
    //the following 4 lines of code send the username, randomly generated password, and login url.  This code was tested on a live server and works, though emails were sent to the
    //accounts spam folder.  It should work, but I was unable to set up an STMP server within mamp so I have not been able to test it that way
    		$to = $email;
    		$subject = 'Your Account Has Been Created';
    		$message = 'Hi '.$fname.', your account has just been created.  Your username is '.$username.' and your password is '.$password.'.  Go to  to login';
    		$send = mail($to, $subject, $message);
    //code left in incase the email containing the randomly generated password does not work within mamp/wamp.
    		echo 'the password is '.$password.'';
    		mysqli_close($link);
			//redirect_to('admin_index.php');
		}
	}

	function editUser($id, $fname, $username, $password, $email) {
		include('connect.php');
		if ($password == 'Leave Blank If You Would Like To Keep The Same Password'){
			$updatestring = "UPDATE tbl_users SET user_fname='{$fname}', user_name='{$username}', user_email='{$email}', user_verify = 'yay' WHERE user_id={$id}";
			echo $updatestring;
			$updatequery = mysqli_query($link, $updatestring);

		}else{
			$newencryptedpass = password_hash($password, PASSWORD_DEFAULT);
			$updatestring = "UPDATE tbl_users SET user_fname='{$fname}', user_name='{$username}', user_pass='{$newencryptedpass}', user_email='{$email}', user_verify = 'yay' WHERE user_id={$id}";
			echo $updatestring;
			$updatequery = mysqli_query($link, $updatestring);
		}


		if($updatequery) {
			redirect_to("admin_index.php");
		}else{
			$message = "Guess you got canned...";
			return $message;
		}

		mysqli_close($link);
	}

	function deleteUser($id) {
		include('connect.php');
		$delstring = "DELETE FROM tbl_users WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery) {
			redirect_to("../admin_index.php");
		}else{
			$message = "Bye, bye...";
			return $message;
		}
		mysqli_close($link);
	}

	function getUser($tbl, $col, $id){
		include('connect.php');
		$userFetchString = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
		$runUser = mysqli_query($link, $userFetchString);
		if($runUser){
			return $runUser;
		}else{
			$error = "There was a problem finding this user.";
			return $error;
		}
		mysqli_close($link);

	}

	function getAllUsers($tbl){
		include('connect.php');
		$allQuery = "SELECT * FROM {$tbl}";
		$runAll = mysqli_query($link, $allQuery);
		if($runAll){
			return $runAll;
		}else{
			$error = "There was a problem accessing this information.  Sorry about your luck ;)";
			return $error;
		}
		mysqli_close($link);
	}
?>
