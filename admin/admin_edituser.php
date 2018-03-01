<?php
  require_once __DIR__ . "./phpscripts/config.php";
  confirm_logged_in();
  $userID = "";
  $user = "";
  $userEdit = [];
  // check if user is set otherwise redirect to admin_users
  if(isset($_GET["user"]))
  { 
    $userID = $_GET["user"];
    // get user
    $user = getSingle("tbl_user", "user_id", $userID);
  } else if(isset($_POST["submit"])) {
    $userEdit = [
      "id" => $_POST["userID"],
      "fname" => $_POST["fname"],
      "username" => $_POST["username"],
      "email" => $_POST["email"],
      "password" => $_POST["password"]
    ];
    $edit = editUser($userEdit);
    if($edit) {
      redirect_to("./admin_index.php");
    }
  } else {
    redirect_to("./admin_users.php");
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
    <h1 class="text-center">Edit User</h1>
    <div class="col-6 offset-3 mt-4">
      <form action="<?= $_SERVER["PHP_SELF"]?>" role="form" method="post" class="mt-3">
        <div class="form-group">
          <label for="fname">First Name</label>
          <input type="text" name="fname" id="fname" class="form-control" value="<?= $user["user_fname"] ?>">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?= $user["user_name"] ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control" value="<?= $user["user_email"] ?>">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>
        <input class="d-none" type="text" id="userID" name="userID" value="<?= $userID?>" >
        <button type="submit" name="submit" class="btn btn-danger btn-lg">Edit User!</button>
      </form>
    </div>
  </div>
</body>
</html>
