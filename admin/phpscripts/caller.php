<?php 
  require_once("config.php");

  if(isset($_GET["caller_id"])) {
    $dir = $_GET["class_id"];
    if($dir == "logout") {
      logged_out();
    } else {
      echo "Caller ID was passed incorrectly";
    }
  }