<?php

function createUser($newuser) {
  include('connect.php');
  $userQuery = "INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email, user_level) VALUES (
    '{$newuser["fname"]}', '{$newuser["username"]}', '{$newuser["password"]}', '{$newuser["email"]}', {$newuser["userlvl"]}
  )";

  var_dump($userQuery);

  $newUserResult = mysqli_query($link, $userQuery);
  echo mysqli_error($link);
  echo $newUserResult;
}