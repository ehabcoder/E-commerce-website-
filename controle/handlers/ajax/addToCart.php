<?php
include("../../../Model/config.php");
if(isset($_POST['itemId']) && isset($_POST['image']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['user'])) {
  $querey1 = $dbh->prepare("SELECT `id` from users where `username`=:user");
  $querey1->bindParam(":user", $_POST['user'], PDO::PARAM_STR);
  $querey1->execute();
  $userId = $querey1->fetch(PDO::FETCH_ASSOC);
  $itemId = $_POST['itemId'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $user = $userId["id"];
  $image = $_POST['image'];

  $sql = "INSERT INTO `cart`(`name`, `price`, `user`, `itemId`, `image`) values(:name, :price, :user, :itemId, :image)";
  $query2 = $dbh->prepare($sql);
  $query2->bindParam(':name', $namet, PDO::PARAM_STR);
  $query2->bindParam(':price', $pricet, PDO::PARAM_STR);
  $query2->bindParam(':user', $usert, PDO::PARAM_STR);
  $query2->bindParam(':itemId', $itemt, PDO::PARAM_STR);
  $query2->bindParam(':image', $img, PDO::PARAM_STR);
  $namet = $name;
  $pricet = $price;
  $usert = $user;
  $itemt = $itemId;
  $img = $image;
  $query2->execute();
  echo "item successfully added to your chart.";
}
else {
  echo "Something wrong! Please make sure that you are connected to the internet.";
}

 ?>
