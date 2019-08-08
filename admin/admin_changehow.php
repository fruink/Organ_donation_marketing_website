<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$howGrab = getHow();
	if(isset($_POST['submitHow'])){
		$newStep1 = trim($_POST['step1']);
		$newStep2 = trim($_POST['step2']);
		$newStep3 = trim($_POST['step3']);
		updateHow($newStep1, $newStep2, $newStep3);
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
	<div id="changeHow">
		<h2>Enter The New Content For The How Section</h2>
		<p>(Leave input fields blank if you don't want to change the content)</p>
		<form action="admin_changehow.php" method="post">
			<div id="step1" class='steps'>
				<label>Step 1</label>
				<textarea type='text' name='step1' placeholder="Update The Text"></textarea>
			</div>
			<div id="step2" class='steps'>
				<label>Step 2</label>
				<textarea name='step2' placeholder="Update The Text"></textarea>
			</div>
			<div id="step3" class='steps'>
				<label>Step 3</label>
				<textarea name='step3' placeholder="Update The Text"></textarea>
			</div>
			<input type="submit" name= "submitHow" value="Update Section" id="submitUser">
		</form>
		<a href='admin_contentmenu.php' class='backButton otherBack'>Back To Menu</a>
	</div>
	<script src='js/cms.js'></script>
</body>
</html>
