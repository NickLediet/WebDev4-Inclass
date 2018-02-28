<?php

  require_once('phpscripts/config.php');
  // confirm_logged_in();
  // TODO: UNCOMMENT THIS ^
	clearstatcache();

  if(isset($_POST['submit'])) {
    $fname = trim($_POST["fname"]);
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $userlvl = $_POST["userlvl"];
    $password = generate_password();

    // TODO: Remove this block
    // We are writing the generated password to a txt
    // file because I'm lazy and can't get email to work
    $file = fopen('password.txt', "w");
    fwrite($file, $password);
    fclose($file);

    if(empty($userlvl)) {
      $message = "Please select a user level";
    } else {
      $user = array(
        "fname" => $fname,
        "username" => $username,
        "password" => $password,
        "email" => $email,
        "userlvl" => $userlvl
      );
      // $user = implode(',', $user);
      $result = createUser($user);

      $message = $result;
    }
  }
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
  <?= !empty($message) ? "<div class=\"alert alert-danger\">{$message}</div>" : ""?>
  <div class="container">
    <div class="col-6 offset-3 mt-4">
      <h1 class="text-center">User Creation</h1>
      <form action="<?= $_SERVER["PHP_SELF"] ?>" role="form" method="post" class="mt-3">
        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" name="fname" id="fname" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
          <select name="userlvl" id="userlvl" required>
            <option value="">Please Select a user level</option>
            <option value="2">Web Admin</option>
            <option value="1">Web Master</option>
          </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Create User!</button>
      </form>
    </div>
  </div>
</body>
</html>
