<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$whyGrab = getWhy();
	$why = mysqli_fetch_array($whyGrab);
	$currImageWhy = $why['why_img'];
	if(isset($_POST['submitWhy'])){
		$newText = trim($_POST['whyText']);
		$newImage = $_FILES['newimage'];
		updateWhy($newText, $newImage);
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
	<div id="changeWhy" >
		<h2>Enter The New Content For The Why Section</h2>
		<p>(Leave input fields blank if you don't want to change the content)</p>
		<form action="admin_changewhy.php" method="post" enctype="multipart/form-data">
			<div id="whyText">
				<label>The Text</label>
				<textarea name='whyText' placeholder='"<?php echo $why['why_text'];?>"'></textarea>
			</div>
			<div id="whyImage">
				<label>Current Image</label>
				<?php
				echo "<img src='../images/{$currImageWhy}' alt='The Current Image'>";
				?>
				<input type='File' name='newimage' value=''>
			</div>
			<input type="submit" name= "submitWhy" value="Update Section" id="submitUser">
		</form>
		<a href='admin_contentmenu.php' class='backButton otherBack'>Back To Menu</a>
	</div>
	<script src='js/cms.js'></script>
</body>
</html>
