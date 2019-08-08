<?php
	function logIn($username, $password, $currentTime, $staylogged) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_users WHERE user_name='{$username}'";
		$user_set = mysqli_query($link, $loginstring);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$verified = $founduser['user_verify'];
			$timeCreated = strtotime($founduser['user_date']);
			$encryptedpass = $founduser['user_pass'];
			if (password_verify($password, $encryptedpass)){
			$_SESSION['loggedin'] = $staylogged;
			//if($currentTime > $timeCreated+180 ){
			//	if($verified == 'nay'){
			//		$susString = "UPDATE tbl_users SET user_verify='suspended' WHERE user_id={$id}";
			//		$susQuery = mysqli_query($link, $susString);
			//	}
			//}
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];
			$_SESSION['user_lvl'] = $founduser['user_lvl'];
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_users SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $update);
			}
			if ($verified == 'yay'){
				redirect_to("admin_index.php");
			}else if ($verified == 'suspended'){
				$message = "This account did not log in fast enough to be verified, so it has been suspended";
				return $message;
			}else{
				redirect_to("admin_edituser.php");
			}
		}
		}else{
			$message = "The username and password you entered don't match any of our users.";
			return $message;
		}

		mysqli_close($link);
	}

	function forgotPassword($email){
		require_once('connect.php');
		$email = mysqli_real_escape_string($link,$email);
		$passwordstring = "SELECT * FROM tbl_users WHERE user_email='{$email}'";
		$passwordquery = mysqli_query($link, $passwordstring);
		if(mysqli_num_rows($passwordquery)){
			$founduser = mysqli_fetch_array($passwordquery, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$fname = $founduser['user_fname'];
			$newpassword = bin2hex(random_bytes(4));
			$newencrypted = password_hash($password, PASSWORD_DEFAULT);
			$changepassword = "UPDATE tbl_users SET user_verify='nay', user_pass='{$newencrypted}' WHERE user_id='{$id}'";
			$changepasswordquery = mysqli_query($link, $changepassword);
			$to = $email;
    		$subject = 'Your Temporary Password';
    		$message = 'Hi '.$fname.', your temporary password is '.$newpassword;
			$send = mail($to, $subject, $message);
			echo $message;
			//redirect_to('admin_login.php');
		}

		mysqli_close($link);

	}
?>
