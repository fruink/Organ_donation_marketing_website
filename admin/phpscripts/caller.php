<?php
	require_once('config.php');

	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id'];
		if($dir == "logout"){
			logged_out();
		}else if($dir == "delete") {
			$id = $_GET['id'];
			deleteUser($id);
		}else if($dir =="deleteStory"){
			$id = $_GET['id'];
			deleteStory($id);
		}else{
			echo "Caller id was passed incorrectly.";
		}
	}


?>
