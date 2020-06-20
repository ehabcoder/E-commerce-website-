<?php
include("../../../Model/config.php");
if(isset($_POST['itemId']) && isset($_POST['user'])) {
  $querey1 = $dbh->prepare("SELECT `id` from users where `username`=:user");
  $querey1->bindParam(":user", $_POST['user'], PDO::PARAM_INT);
  $querey1->execute();

  $userId = $querey1->fetch(PDO::FETCH_ASSOC);
  $query2 = $dbh->prepare("DELETE FROM `cart` WHERE `id`=:id AND `user`=:user");
  $query2->bindParam(':id', $_POST['itemId']['id'], PDO::PARAM_INT);
  $query2->bindParam(':user', $userId['id'], PDO::PARAM_INT);
  $query2->execute();
  echo "Deleted";
}
else {
  echo "Error! make sure that you are connected to the internet";
}

 ?>
