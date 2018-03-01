<?php 
  require("./phpscripts/config.php");
  // Get all users
  $users = getAll("tbl_user");
  // Set error if unable
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Users</title>
  <?php 
    include("../includes/styles.html");
  ?>
</head>
<body>
  <?php
    include("../includes/nav.php");
  ?>
  <div class="container"> 
    <h1 class="mt-4 text-center">Edit users</h1>
    <div class="row">
      <div class="col-8 offset-2 mt-4">
        <ul class="list-group">
          <?php foreach($users as $index=>$user):?>
            <li class="list-group-item <?= $index % 2 == 0 ? " bg-dark text-white" : ""?>">
              <h4>
                <span class="float-left"><?= $user["user_name"] ?></span>
                <span class="float-right">
                  <a href="./admin_edituser.php?user=<?=$user["user_id"]?>">
                    <i class="text-danger fa fa-edit"></i>
                  </a>
                </span>
              </h4>
            </li>
          <?php endforeach?>
        </ul>
      </div>
    </div>
  </div>

<?php include("../includes/scripts.html") ?>
</body>
</html>