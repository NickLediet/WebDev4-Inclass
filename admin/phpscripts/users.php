<?php
/**
 * CreateUser
 * @param Array $newuser
 */
function createUser($newuser) {
  include('connect.php');
  // Check that email is unique

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
/**
 * Edit user 
 * @param Array
 */
function editUser($updateInfo) 
{
  require __DIR__ . "./connect.php";
  // Check for each field where value is set
  // username, fname, password(it's own check + hash), email 
  $updateQuery = "user_name = '{$updateInfo["username"]}', user_fname='{$updateInfo["fname"]}', user_email='{$updateInfo["email"]}'";
  if ($updateInfo["password"] != "") {
    $hashedPassword = password_hash($updateInfo["password"], PASSWORD_DEFAULT, $options);
    $updateQuery = $updateQuery . ", user_pass='{$hashedPassword}'";
  }
  // Concat them to an SQL string
  $updateQuery = "UPDATE tbl_user SET " . $updateQuery . " WHERE user_id={$updateInfo["id"]}";
  echo $updateQuery;
  // Query/Update
  $updateResult = mysqli_query($link, $updateQuery);
  
  if($updateResult) {
    // I REALLY DON'T WANT TO TALK ABOUT THIS CODE
    // My redirect was failing to set the headers.  This, albiet obnoxious, works!
    //https://stackoverflow.com/questions/768431/how-to-make-a-redirect-in-php
    echo("<script>window.location = 'admin_index.php';</script>");
  } else {
    return false;
  }
}

