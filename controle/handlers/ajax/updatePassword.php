<?php
include("../../../Model/config.php");

  if(!isset($_POST['username'])) {
      echo "username doesn't defined";
      exit();
  }

    $username = $_POST['username'];
    $oldPassword = $_POST['password1'];
    $newPassword = $_POST['password2'];
    $confirmPassword = $_POST['password3'];

    $mdOldPassword = md5($oldPassword);

    // check if it exist in the database
    $sql1 = "SELECT `password` FROM `users` WHERE `password`= :pass";
    $query1 = $dbh->prepare($sql1);
    $query1->bindParam(':pass', $password, PDO::PARAM_STR);
    $password = $mdOldPassword;
    $query1->execute();
    $number_of_rows = $query1->fetchColumn();
    if($number_of_rows==0) {
      echo "Sorry! the old password is not correct, try again.";
      exit();
    }

    if($newPassword != $confirmPassword) {
      echo "two new passwords don't match, try again.";
      exit();
    }

    if(!preg_match('/^[A-Za-z0-9]/', $newPassword)) {
      echo "Your password must only contain letter and/or numbers";
      exit();
    }

    if(strlen($newPassword)<5 || strlen($newPassword)>30) {
      echo "Your password must be between 5 and 30 characters";
    }

    // Update new password
    $mdnewPassword = md5($newPassword);
    $sql2 = "UPDATE `users` SET `password` = :new WHERE `username`=:user";
    $query2 = $dbh->prepare($sql2);
    $query2->bindParam(':new', $newPass, PDO::PARAM_STR);
    $query2->bindParam(':user', $use, PDO::PARAM_STR);
    $newPass = $mdnewPassword;
    $use = $username;
    $query2->execute();
    echo "Password successfully updated.";



 ?>
