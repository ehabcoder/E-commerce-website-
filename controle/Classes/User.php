<?php
  class User {

    private $con, $username;

    public function __construct($con, $username) {
      $this->con = $con;
      $this->username = $username;
    }

    public function getUsername() {
      return $this->username;
    }

    public function getWholeUsername() {
      $sql = "SELECT CONCAT(`firstName`,' ',`lastName`) AS `name` FROM `users` WHERE `username`=:username";
      $query = $this->con->prepare($sql);
      $query->bindParam(':username', $user, PDO::PARAM_STR);
      $user = $this->username;
      $query->execute();
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      return $res[0]['name'];
    }

    public function getEmail() {
      $query = $this->con->prepare("SELECT `email` from `users` WHERE `username` = :username ");
      $query->bindParam(':username', $user, PDO::PARAM_STR);
      $user = $this->username;
      $query->execute();
      $res = $query->fetchAll(PDO::FETCH_ASSOC);
      return $res[0]['email'];
    }
  }

 ?>
