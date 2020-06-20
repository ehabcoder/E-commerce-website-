<?php
if(isset($_POST['loginButton'])) {
  $username = $_POST['LoginUsername'];
  $password = $_POST['LoginPassword'];
  $wasSuccessful = $account->login($username, $password, $dbh);
  if($wasSuccessful) {
    $_SESSION['userLoggedIn'] = $username;
    $sql = "SELECT `isAdmin` From users where `username` = :user";
    $query = $dbh->prepare($sql);
    $query->bindParam(':user', $user);
    $user = $username;
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $_SESSION['userLoggedIn'] = $username;
    if($result["isAdmin"]==1) {
      header("Location: dashboard.php");
    }
    else{

    header('Location: index.php');
  }
    }
      }
 ?>
