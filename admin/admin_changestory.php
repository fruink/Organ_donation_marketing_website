<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$storiesGrab = getStories();
	while($row = $storiesGrab->fetch_array()){
		$storyRows[] = $row;
	}
	if(isset($_POST['submitStories'])){
		$id = $_POST['id'];
		$newStory = $_POST['newStory'];
		$newImage = $_FILES['newImage'];
		$message = updateStory($newStory, $newImage, $id);
	}
	if(isset($_POST['submitStoryAdd'])){
		$newTitle = $_POST['newTitleInput'];
		$newStory = $_POST['newStoryAdd'];
		$newImage = $_FILES['newImage'];
		addStory($newStory, $newImage, $newTitle);
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
		<div id="initialOptions">
			<h2>Would You Like To:</h2>
			<h3 class="mythOptions" id="updateM">Update A Story</h3>
			<h3 class="mythOptions" id="addM">Add A Story</h3>
			<h3 class="mythOptions" id="deleteM">Delete A Story</h3>
			</div>
		<div id='updateMythMenu' class="dissapear">
				<h2>Enter The New Content For The Story Section</h2>
				<p>(Scroll Down To See All Stories, Leave input fields blank if you don't want to change the content)</p>
			<?php
				foreach($storyRows as $row){
					echo "
					<div class='updateMythContainer'>
						<h3 id='mythTitle'>{$row['story_name']}</h3>
						<form action='admin_changestory.php' method='post' class='mythform' enctype='multipart/form-data'>
							<input class='dissapear' value ='{$row['story_id']}' name='id'>
							<div id='myths'>
								<label id='mythLabel'>Story Text</label>
								<textarea name='newStory' placeholder='{$row['story_bio']}' class='mythbox'></textarea>
							</div>
							<div id='facts'>
								<img src='../images/{$row['story_image']}' alt='The Current Image' class='storyImage'>
								<input type='File' name='newImage' value=''>
							</div>
							<input type='submit' name='submitStories' value='Update Story' id='mythSubmit'>
						</form>
					</div>
				";
				}
			?>		
		</div>
		<div id="addMythMenu" class="dissapear">
			<h2>Enter The Story Details You Want To Add</h2>
			<form action='admin_changestory.php' method='post' id='mythAddform' enctype='multipart/form-data'>
				<div id="titleContainer">
					<label id='newTitle'>Story Name</label>
					<input name='newTitleInput' placeholder='Title Goes Here' id='titleInput'>
				</div>
				<div id="addMythContainer">
					<div id="mythsAdd">
						<label id='mythLabel'>Story Text</label>
						<textarea name='newStoryAdd' placeholder="Write Your Myth Here" class="mythbox"></textarea>
					</div>
					<div id="factsAdd">
						<label id="factLabel">Story Image</label>
						<input type='File' name='newImage' value=''>
					</div>
				</div>
				<input type='submit' name='submitStoryAdd' value='Add Story' id="submitUser">
			</form>
		</div>
		<div id="deleteMyth" class="dissapear">
			<div id='deletedContainer'>
			<?php
				foreach($storyRows as $row){
					echo "	<div class='deletedMyth'>
								<h2 class='deletedMythName'>{$row['story_name']} </h2>
								<a class='deleteLink' href=\"phpscripts/caller.php?caller_id=deleteStory&id={$row['story_id']}\">Delete</a>
							</div>";
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
