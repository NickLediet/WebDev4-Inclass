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
  <title>CMS Portal</title>
</head>
<body>
  <?php include "../includes/nav.php" ?>
  <h1>Welcome to the Homepage!</h1>
  <h2><?= $_SESSION["user_name"]?></h2>
</body>
</html>
