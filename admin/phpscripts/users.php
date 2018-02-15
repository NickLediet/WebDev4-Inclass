<?php

function createUser($newuser) {
  include('connect.php');
  $newuser = implode(',', $newuser);
  $userQuery = "INSERT INTO tbl_users (user_fname, user_name, user_pass, user_email, user_level) VALUES ({$newuser})";

  $newUserResult = mysqli_query($link, $userQuery);
  echo $newUserResult;
}