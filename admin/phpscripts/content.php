<?php

    function updateWhy($newText, $newImage){
      include('connect.php');
      if ($newText != ''){
        $newText = mysqli_real_escape_string($link, $newText);
        if ($newImage['name'] != ''){
            $textUpdateString = "UPDATE tbl_why SET why_text='{$newText}', why_img = '{$newImage['name']}' WHERE why_id='1'";
            $updateQuery = mysqli_query($link, $textUpdateString);
            mysqli_close($link);
            $path = "../images/{$newImage['name']}";
            move_uploaded_file($newImage['tmp_name'], $path);
        }else{
          $textUpdateString = "UPDATE tbl_why SET why_text='{$newText}' WHERE why_id='1'";
          $updateQuery = mysqli_query($link, $textUpdateString);
          mysqli_close($link);
        }
      } else {
        if($newImage != ''){
            $textUpdateString = "UPDATE tbl_why SET why_img = '{$newImage['name']}' WHERE why_id='1'";
            $updateQuery = mysqli_query($link, $textUpdateString);
            mysqli_close($link);
            $path = "../images/{$newImage['name']}";
            move_uploaded_file($newImage['tmp_name'], $path);
        }else{
          echo 'you did not change any of the content';
        }
      }
      redirect_to('admin_contentmenu.php');
    }

    function updateHow($newStep1, $newStep2, $newStep3){
      include('connect.php');
      if($newStep1 !=''){
        $newStep1 = mysqli_real_escape_string($link,$newStep1);
        $howUpdateString1 = "UPDATE tbl_how SET how_text='{$newStep1}' WHERE how_id='1'";
        $update1 = mysqli_query($link, $howUpdateString1);
      }
      if($newStep2 !=''){
        $newStep2 = mysqli_real_escape_string($link,$newStep2);
        $howUpdateString2 = "UPDATE tbl_how SET how_text='{$newStep2}' WHERE how_id='2'";
        $update2 = mysqli_query($link, $howUpdateString2);
      }
      if($newStep3 != ''){
        $newStep3 = mysqli_real_escape_string($link,$newStep3);
        $howUpdateString3 = "UPDATE tbl_how SET how_text='{$newStep3}' WHERE how_id='3'";
        $update3 = mysqli_query($link, $howUpdateString3);
      }

      mysqli_close($link);
      redirect_to('admin_contentmenu.php');
    }

    function updateStory($newStory, $newImage, $id){
      include('connect.php');
      if($newStory != ''){
        $newStory = mysqli_real_escape_string($link,$newStory);
        if($newImage['name'] != ''){
          $updateStoryQuery = "UPDATE tbl_stories SET story_bio='{$newStory}', story_image='{$newImage['name']}' WHERE story_id='{$id}'";
          $updateStory = mysqli_query($link, $updateStoryQuery);
          $path = "../images/{$newImage['name']}";
          move_uploaded_file($newImage['tmp_name'], $path);
          return $updateStoryQuery;
        }else{
          $updateStoryQuery = "UPDATE tbl_stories SET story_bio='{$newStory}' WHERE story_id='{$id}'";
          $updateStory = mysqli_query($link, $updateStoryQuery);
          return $updateStoryQuery;
        }
      }else{
        if($newImage['name'] != ''){
          $updateStoryQuery = "UPDATE tbl_stories SET story_image='{$newImage['name']}' WHERE story_id = '{$id}'";
          $updateStory = mysqli_query($link, $updateStoryQuery);
          $path = "../images/{$newImage['name']}";
          move_uploaded_file($newImage['tmp_name'], $path);
          return $updateStoryQuery;
        }else{
          echo "You didn't update any content";
        }
      }
        mysqli_close($link);
        redirect_to('admin_contentmenu.php');
    }

    function updateMyth($newMyth, $newFact, $id){
      include('connect.php');
      if($newMyth != ''){
        $newMyth = mysqli_real_escape_string($link,$newMyth);
        if($newFact != ''){
          $newFact = mysqli_real_escape_string($link,$newFact);
          $newFact = mysqli_real_escape_string($link,$newFact);
          $updateStoryQuery = "UPDATE tbl_myths SET myths_false='{$newMyth}', myths_true='{$newFact}' WHERE myths_id='{$id}'";
          $updateStory = mysqli_query($link, $updateStoryQuery);
        }else{
          $updateStoryQuery = "UPDATE tbl_myths SET myths_false='{$newMyth}' WHERE myths_id='{$id}'";
          $updateStory = mysqli_query($link, $updateStoryQuery);
        }
      }else{
        if($newFact != ''){
          $newFact = mysqli_real_escape_string($link,$newFact);
          $updateStoryQuery = "UPDATE tbl_myths SET myths_true='{$newFact}' WHERE myths_id = '{$id}'";
          $updateStory = mysqli_query($link, $updateStoryQuery);
          return $updateStoryQuery;
        }else{
          echo "You didn't update any content";
        }
      }
        mysqli_close($link);
        redirect_to('admin_contentmenu.php');
    }

    function updateOrgan($newBio, $newImage, $id){
      include('connect.php');
      if($newBio != ''){
        $newBio = mysqli_real_escape_string($link,$newBio);
        if($newImage['name'] != ''){
          $updateOrganQuery = "UPDATE tbl_organlightbox SET organ_text='{$newBio}', organ_img='{$newImage['name']}' WHERE organ_id='{$id}'";
          $updateOrgan = mysqli_query($link, $updateOrganQuery);
          $path = "../images/{$newImage['name']}";
          move_uploaded_file($newImage['tmp_name'], $path);
        }else{
          $updateOrganQuery = "UPDATE tbl_organlightbox SET organ_text='{$newBio}' WHERE organ_id='{$id}'";
          $updateOrgan = mysqli_query($link, $updateOrganQuery);
        }
      }else{
        if($newImage['name'] != ''){
          $updateOrganQuery = "UPDATE tbl_organlightbox SET organ_img='{$newImage['name']}' WHERE organ_id = '{$id}'";
          $updateOrgan = mysqli_query($link, $updateOrganQuery);
          $path = "../images/{$newImage['name']}";
          move_uploaded_file($newImage['tmp_name'], $path);
        }else{
          echo "You didn't update any content";
        }
      }
        mysqli_close($link);
        redirect_to('admin_contentmenu.php');
    }

    function updateVideo($newVideo){
      include('connect.php');
      if ($newVideo != ''){
        $videoString = "UPDATE tbl_video SET video_src= '{$newVideo['name']}' WHERE video_id = '1'";
        $videoQuery = mysqli_query($link, $videoString);
        $path = "../video/{$newVideo['name']}";
        move_uploaded_file($newVideo['tmp_name'], $path);
      }else{
        echo "You didn't select a file";
      }
      mysqli_close($link);
      redirect_to('admin_contentmenu.php');
    }

    function addStory($newStory, $newImage, $newTitle){
      include('connect.php');
      $newStory = mysqli_real_escape_string($link,$newStory);
      $newTitle = mysqli_real_escape_string($link, $newTitle);
      $addStoryString = "INSERT INTO tbl_stories (story_bio, story_image, story_name) VALUES ('{$newStory}', '{$newImage['name']}', '$newTitle')";
      $addStory = mysqli_query($link, $addStoryString);
      mysqli_close($link);
      $path = "../images/{$newImage['name']}";
      move_uploaded_file($newImage['tmp_name'], $path);
      redirect_to('admin_contentmenu.php');
    }
    
    function getWhy(){
      include('connect.php');
      $whyString = "SELECT * FROM tbl_why";
      $whyQuery = mysqli_query($link, $whyString);
      return $whyQuery;
      mysqli_close($link);
      
    }

    function getHow(){
      include('connect.php');
      $howString = "SELECT * FROM tbl_how";
      $howQuery = mysqli_query($link, $howString);
      return $howQuery;
      mysqli_close($link);
    }

    function getMyths(){
      include('connect.php');
      $howString = "SELECT * FROM tbl_myths";
      $howQuery = mysqli_query($link, $howString);
      return $howQuery;
      mysqli_close($link);
    }

    function getStories(){
      include('connect.php');
      $storyString = "SELECT * FROM tbl_stories";
      $storyQuery = mysqli_query($link, $storyString);
      return $storyQuery;
      mysqli_close($link);
    }
    
    function getOrgans(){
      include('connect.php');
      $organString = "SELECT * FROM tbl_organlightbox";
      $organQuery = mysqli_query($link, $organString);
      return $organQuery;
      myslqi_close($link);
    }

    function deleteStory($id){
      include('connect.php');
  		$delstring = "DELETE FROM tbl_stories WHERE story_id = {$id}";
  		$delquery = mysqli_query($link, $delstring);
  		if($delquery) {
  			redirect_to("../admin_contentmenu.php");
  		}else{
  			$message = "Bye, bye...";
  			return $message;
  		}
  		mysqli_close($link);
    }
?>