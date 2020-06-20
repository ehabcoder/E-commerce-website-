<?php
include("../../../Model/config.php");

if(isset($_POST['email']) && isset($_POST['username'])) {
  $sql = " UPDATE `users` SET `email` = :mail WHERE `username` = :user";
  $query = $dbh->prepare($sql);
  $query->bindParam(':mail', $email, PDO::PARAM_STR);
  $query->bindParam(':user', $username, PDO::PARAM_STR);
  $email = $_POST['email'];
  $username = $_POST['username'];
  $query->execute();
    echo "Email Updated successfully ^_^";
  }
  else {
    echo "email doesn't define.";
  }

?>
