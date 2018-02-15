<?php
  ini_set("display_errors", 1);
  error_reporting(E_ALL);

  // Import database configs
  require_once "./phpscripts/config.php";
  
  $ip = $_SERVER["REMOTE_ADDR"];

  $error = "";

  if(isset($_POST["submit"])) {
    $username = trim($_POST["username"]); // trim function allows us to remove trailing whitespace from copy and pasting
    $password = trim($_POST["password"]);
    if($username !== "" && $password !== "") {
      login($username, $password, $ip);
    } else {
      $error = "Please fill in the required fields";
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CMS Portal Login</title>
  <?php include("../includes/styles.html") ?>
</head>
<body class=" bg-light-gradient">
<?php include "../includes/nav.php" ?>
<div class="container mt-4">
<?= $error ? "<div class=\"alert alert-danger\" role=\"alert\">
  <strong>Error!</strong> {$error}</div>": ""?>
  <div class="row justify-content-center align-items-center">
</div>
<h1>Please login to enter</h1>
    <form role="form" action="<?= $_SERVER["PHP_SELF"] ?>" method="post" class="mt-3">
      <div class="form-group">
        <label for="username">Email address</label>
        <input type="email" name="username" id="username" class="form-control">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
      </div>
      <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Submit">
    </form>
  </div>
</div>
</body>
</html>