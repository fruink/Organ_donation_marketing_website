<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$organsGrab = getOrgans();
	while($row = $organsGrab->fetch_array()){
		$organRows[] = $row;
	}
	if(isset($_POST['submitOrgan'])){
		$newText = trim($_POST['newBio']);
		$newImage = $_FILES['newImage'];
		$id = $_POST['id'];
		updateOrgan($newText , $newImage, $id);
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
	<div id="changeMyths">
		<div id='updateMythMenu'>
				<h2>Enter The New Content For The Learn More Section</h2>
				<p>(Scroll Down To See All Organs, Leave input fields blank if you don't want to change the content)</p>
			<?php
				foreach($organRows as $row){
					echo "
					<div class='updateMythContainer'>
						<h3 id='mythTitle'>{$row['organ_name']}</h3>
						<form action='admin_changeorgans.php' method='post' class='mythform' enctype='multipart/form-data'>
							<input class='dissapear' value ='{$row['organ_id']}' name='id'>
							<div id='myths'>
								<textarea name='newBio' placeholder='{$row['organ_text']}' class='mythbox'></textarea>
							</div>
							<div id='facts'>
								<img class='organImage' src='../images/{$row['organ_img']}' alt='{$row['organ_img']}'>
								<input type='File' name='newImage' value=''>
							</div>
							<input type='submit' name='submitOrgan' value='Update Organ' id='mythSubmit'>
						</form>
					</div>
				";
				}
			?>		
		</div>
		</div>
		<h3 class='backButton dissapear' id="innerBack">Go Back</h3>
		<a href='admin_contentmenu.php' class='backButton otherBack'>Back To Menu</a>
	</div>
	<script src='js/cms.js'></script>
</body>
</html>
