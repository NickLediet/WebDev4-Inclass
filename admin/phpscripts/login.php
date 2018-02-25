<?php

  function login($username, $password, $ip) {
    include("connect.php");
    
    # Sanitization
    $username = mysqli_real_escape_string($link, $username);
    $password = $hashedPassword = password_hash( // Rehash password to check encrypted password
      mysqli_real_escape_string($link, $password)
      , PASSWORD_BCRYPT);

    $loginQuery = "SELECT * FROM tbl_user WHERE user_email = '{$username}' AND user_pass = '{$password}'";

    $user_set = mysqli_query($link, $loginQuery);

    if(mysqli_num_rows($user_set)) {
      $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
      $id = $found_user["user_id"];
      
      $_SESSION["user_id"] = $id;
      $_SESSION["user_name"] = $found_user["user_fname"];
      $_SESSION["last_signin"] = $found_user["user_date"] ? $found_user["user_date"] : "No Sign In Found";
      
      if($id) {
        // $updateQuery = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id = {$id}"; Literally what are we doing with this IP??
        $updateQuery = "UPDATE tbl_user SET user_date = now()";
        $updateResult = mysqli_query($link, $updateQuery);
      }

      redirect_to("admin_index.php");
    } else {
      $error = "Username and/or password is incorrect.<br> Please make sure your cap lock key is turned off.";
      return $error;
    }

    mysqli_close($link); // Close MySQL Connection from connect.php
  }




