<?php

  function login($username, $password, $ip) {
    include("connect.php");
    # Sanitization
    $username = mysqli_real_escape_string($link, $username);
    $password =  $password;
    $loginQuery = "SELECT * FROM tbl_user WHERE user_email = '{$username}' ";

    $user_set = mysqli_query($link, $loginQuery);
    $found_user = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
    if(password_verify($password, $found_user["user_pass"])) {
      $id = $found_user["user_id"];
      
      $_SESSION["user_id"] = $id;
      $_SESSION["user_name"] = $found_user["user_fname"];
      $_SESSION["last_signin"] = $found_user["user_date"] ? $found_user["user_date"] : "No Sign In Found";

      if($id) {
        // $updateQuery = "UPDATE tbl_user SET user_ip = '{$ip}' WHERE user_id = {$id}"; Literally what are we doing with this IP??
        $updateQuery = "UPDATE tbl_user SET user_date = now() WHERE user_id = {$id}";
        $updateResult = mysqli_query($link, $updateQuery);
      } else {
        $error = "Username and/or password is incorrect.<br> Please make sure your cap lock key is turned off.";
        return $error;
      }
      //http://www.stoimen.com/blog/2011/11/04/how-to-check-if-a-date-is-more-or-less-than-a-month-ago-with-php/
      $diff = (strtotime($found_user["user_createdAt"]) < strtotime('-24 hours'));
      if($diff) {
        return "Your account has been made inactive.  Please contact you adminiastrator to validate your account";
      }
      if($found_user["user_new"] == 0) {
        mysqli_query($link,
          "UPDATE tbl_user SET user_new=true WHERE user_id={$found_user["user_id"]}"
        );
        redirect_to("admin_edituser.php?user={$found_user["user_id"]}");
      }
      redirect_to('admin_index.php');
    }

    mysqli_close($link); // Close MySQL Connection from connect.php
  }




