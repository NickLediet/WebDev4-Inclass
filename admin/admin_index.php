<?php

  require_once('phpscripts/config.php');
  confirm_logged_in();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include("../includes/styles.html")?>
  <title>CMS Portal</title>
</head>
<body>
  <?php include "../includes/nav.php" ?>
  <div class="container">
    <h1 class="text-center mt-4">Welcome to the Homepage!</h1>
    <h2 class="text-center mt-4"><?php
      if(date('H') < 12) {
        echo "Good Morning, {$_SESSION["user_name"]}. Have a great day!" ;
      } elseif (date('H') >= 12 && date('h') < 17) {
        echo "Good Afternoon, {$_SESSION["user_name"]}.  Looking forward to the end of the day";
      } else {
        echo "Good Evening, {$_SESSION["user_name"]}. Shouldn't you be calling it a night?";
      }
    ?></h2>
    <h3 class="text-center mt-4">Your last sucessful sigin was <span class="text-primary"><?= date('M j Y g:i A', strtotime($_SESSION["last_signin"])) ?></span></h3>
  </div>
</body>
</html>
