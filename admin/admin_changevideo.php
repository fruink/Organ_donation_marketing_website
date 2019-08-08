<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	if(isset($_POST['submitVideo'])){
		$newVideo = $_FILES['newVideo'];
		updateVideo($newVideo);
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div id="changeJust">
		<h2>Select A New Video To Be Uploaded</h2>
		<form action="admin_changevideo.php" method="post" enctype="multipart/form-data">
			<label id='videoTitle'>Select The Video You Would Like To Feature On The Site</label>
			<input type='file' name='newVideo' value=''>
			<input type="submit" name= "submitVideo" value="Update Video" id="submitUser">
		</form>
		<a href='admin_contentmenu.php' class='backButton otherBack'>Back To Menu</a>
	</div>
	<script src='js/cms.js'></script>
</body>
</html>
