<?php

function createUser($newuser) {
  include('connect.php');

  $hashedPassword = password_hash($newuser["password"], PASSWORD_DEFAULT, $options);
  $userQuery = "INSERT INTO tbl_user (user_fname, user_name, user_pass, user_email, user_level) VALUES (
    '{$newuser["fname"]}', '{$newuser["username"]}', '{$hashedPassword}', '{$newuser["email"]}', {$newuser["userlvl"]}
  )";
  $userResult = mysqli_query($link, $userQuery);
  if ($userResult) {
    // $mail->AddAddress($newuser["email"]);
      // $mail->Subject("Your new account");
      // $mail->Body("Hi, {$newuser["fname"]}\n Here as your login credentials. \n
      // Here is your password: {$newuser["password"]}\n
      // Incase you have forgotten your email it is: {$newuser["email"]}\n
      // Get started here {$_SERVER['SERVER_NAME']}/admin/admin_login.php");
    // redirect_to('/admin_index.php');
  } 

}