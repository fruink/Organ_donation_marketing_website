<?php
require_once('config.php');
require_once('caller.php');
if(isset($_POST['submit'])){
  $checked = $_POST['checkbox'];
  echo 'this is firing';
  if($checked == ''){
    echo 'box was not checked';
  }else {
    echo 'box was checked';
  }

}
?>
