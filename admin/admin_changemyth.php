<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$mythGrab = getMyths();
	while($row = $mythGrab->fetch_array()){
		$mythRows[] = $row;
	}
	if(isset($_POST['submitStories'])){
		$id = $_POST['id'];
		$newMyth = $_POST['newStory'];
		$newFact = $_POST['newFact'];
		$message = updateMyth($newMyth, $newFact, $id);
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
				<h2>Enter The New Content For The Myth Section</h2>
				<p>(Scroll Down To See All Myths, Leave input fields blank if you don't want to change the content)</p>
			<?php
				foreach($mythRows as $row){
					echo "
					<div class='updateMythContainer'>
						<h3 id='mythTitle'>Myth #{$row['myths_id']}</h3>
						<form action='admin_changemyth.php' method='post' class='mythform'>
							<input class='dissapear' value ='{$row['myths_id']}' name='id'>
							<div id='myths'>
								<label id='mythLabel'>Myth Text</label>
								<textarea name='newStory' placeholder='{$row['myths_false']}' class='mythbox'></textarea>
							</div>
							<div id='facts'>
                                <label id='mythLabel'>Fact Text</label>
                                <textarea name='newFact' placeholder='{$row['myths_true']}' class='mythbox'></textarea>
							</div>
							<input type='submit' name='submitStories' value='Update Story' id='mythSubmit'>
						</form>
					</div>
				";
				}
			?>		
		</div>
		<a href='admin_contentmenu.php' class='backButton otherBack'>Back To Menu</a>
	</div>
	<script src='js/cms.js'></script>
</body>
</html>
