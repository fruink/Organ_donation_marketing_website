<?php
	// Set up connection credentials
	$user = "root";
	$pass = "root";
	$url = "localhost";
	$db = "db_organs";

	$link = mysqli_connect($url, $user, $pass, $db, "8889"); //Mac
	//$link = mysqli_connect($url, $user, $pass, $db); //PC

	/* check connection */
	if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	if ((isset($_GET["why"]))){
		$myQuery = "SELECT * FROM tbl_why";
	  $result = mysqli_query($link, $myQuery);
	  $rows = array();
	  while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	  }
	  echo json_encode($rows);
	}

	if ((isset($_GET["how"]))){
		$myQuery = "SELECT * FROM tbl_how";
	  $result = mysqli_query($link, $myQuery);
	  $rows = array();
	  while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	  }
	  echo json_encode($rows);
	}

	if ((isset($_GET['story']))){
		$myQuery = "SELECT * FROM tbl_stories";
		$result = mysqli_query($link, $myQuery);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	}

	if ((isset($_GET['myths']))){
		$myQuery = "SELECT * FROM tbl_myths";
		$result = mysqli_query($link, $myQuery);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	}

	if ((isset($_GET['organs']))){
		$myQuery = "SELECT * FROM tbl_organlightbox";
		$result = mysqli_query($link, $myQuery);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	}

	if ((isset($_GET['organid']))){
		$ids = $_GET["organid"];
		$myQuery = "SELECT * FROM tbl_organlightbox WHERE organ_id = '$ids'";
		$result = mysqli_query($link, $myQuery);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		echo json_encode($rows);
	}


?>
