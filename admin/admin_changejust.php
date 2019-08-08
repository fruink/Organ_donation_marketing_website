<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$justGrab = getJust();
	$just = mysqli_fetch_array($justGrab);
	$currImageJust = $just['just_image'];
	if(isset($_POST['submitJust'])){
		$newText = trim($_POST['justText']);
		$newImage = $_FILES['justimage'];
		updateJust($newText, $newImage);
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
		<h2>Enter The New Content For The Just Donate Section</h2>
		<p>(Leave input fields blank if you don't want to change the content)</p>
		<form action="admin_changejust.php" method="post" enctype="multipart/form-data">
			<div id="whyText">
				<label>The Text</label>
				<textarea name='justText' placeholder='"<?php echo $just['just_text'];?>"'></textarea>
			</div>
			<div id="whyImage">
				<label>Current Image</label>
				<?php
				echo "<img src='../images/{$currImageJust}' alt='The Current Image'>";
				?>
				<input type='File' name='justimage' value=''>
			</div>
			<input type="submit" name= "submitJust" value="Update Section" id="submitUser">
		</form>
		<a href='admin_contentmenu.php' class='backButton otherBack'>Back To Menu</a>
	</div>
	<script src='js/cms.js'></script>
</body>
</html>