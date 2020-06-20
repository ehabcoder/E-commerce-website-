<?php
  class Account {
    private $errorArray, $con;

    public function __construct($con) {
      $this->errorArray = array();
      $this->con = $con;
    }
    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2, $dbh) {
      $this->validateUsername($un, $dbh);
      $this->validateFirstName($fn);
      $this->validateLastName($ln);
      $this->validateEmails($em, $em2, $dbh);
      $this->validatePasswords($pw, $pw2);

      if(empty($this->errorArray)) {
        // insert into DataBase
        return $this->insertUserDetails($un, $fn, $ln, $em, $pw, $dbh);
      }
      else {
        return false;
      }
  }
    private function validateUsername($un, $dbh){
       if(strlen($un) > 25 || strlen($un) < 5) {
         array_push($this->errorArray, Constants::$userNameCharacters);
         return;
       }
       //TODO: check if user name exists
       $sql = "select * from `users` WHERE `username` = :user";
       $query = $dbh->prepare($sql);
       $query->bindParam(':user', $username);
       $username = $un;
       $query->execute();
       $row = $query->fetch(PDO::FETCH_ASSOC);
       if($row == 0) {
         return true;
       }
       else {
         array_push($this->errorArray, Constants::$usernameTaken);
         return;
       }
     }
     private function validateFirstName($fn){
         if(strlen($fn) > 25 || strlen($fn) < 2) {
             array_push($this->errorArray, Constants::$firstNameCharacters);
             return;
         }
       }
       private function validateLastName($ln){
         if(strlen($ln) > 25 || strlen($ln) < 2) {
             array_push($this->errorArray, Constants::$lastNameCharacters);
             return;
         }
       }
       private function validateEmails($em, $em2, $dbh){
         if($em != $em2) {
           array_push($this->errorArray , Constants::$emailsNotMatches);
           return;
         }
         if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
           array_push($this->errorArray, Constants::$emailInvalid);
           return;
         }
         //// TODO: check that Email hasn't already been used.
         $sql = " SELECT * FROM `users` WHERE `email` = :mail ";
         $query = $dbh->prepare($sql);
         $query->bindParam(':mail', $email, PDO::PARAM_STR);
         $email = $em;
         $query->execute();
         $row = $query->fetch(PDO::FETCH_ASSOC);
         if($row == 0){
           return true;
           }
         else {
           array_push($this->errorArray, Constants::$emailWasTaken);
           return;
         }
       }

       
       private function validatePasswords($pw, $pw2){
         if($pw != $pw2) {
           array_push($this->errorArray, Constants::$passwordNotAlphanumeric);
           return;
         }
         if(preg_match('/[^A-Za-z0-9]/',$pw)) {
           array_push($this->errorArray, Constants::$passwordCharacters);
           return;
         }
         if(strlen($pw)>30 || strlen($pw)<5) {
           array_push($this->errorArray, Constants::$passwordsDoMatch);
           return;
         }
       }
       public function insertUserDetails($un, $fn, $ln, $em, $pw, $dbh) {
         //insert:
         $sql = "INSERT INTO `users`(`username`, `fname`, `lname`, `profilePic`, `signInDate`, `Email`, `password`)
         VALUES(:un, :fn, :lan, :pp, :signUpDate, :em, :pw)";
         $query = $dbh->prepare($sql);
         $query->bindParam(':un', $username, PDO::PARAM_STR);
         $query->bindParam(':fn', $firstName, PDO::PARAM_STR);
         $query->bindParam(':lan', $lastName, PDO::PARAM_STR);
         $query->bindParam(':em', $email, PDO::PARAM_STR);
         $query->bindParam(':pw', $encryptedPw, PDO::PARAM_STR);
         $query->bindParam(':signUpDate', $date);
         $query->bindParam(':pp', $profilePic, PDO::PARAM_STR);
         $username = $un;
         $firstName = $fn;
         $lastName = $ln;
         $email = $em;
         $encryptedPw = md5($pw);
         $date = date("Y-m-d h:i:sa");
         $profilePic = "../../view/assets/images/profile-pics/default.jpg";
         $query->execute();
         $lastInsertId = $dbh->lastInsertId();
         if($lastInsertId>0){
           return true;
         }
         else{
           return false;
         }
      }
    public function getError($error) {
      if(!in_array($error, $this->errorArray)) {
        $error = "";
      }
      return "<span class='errorMessage'> $error </span>";
    }

    public function login($username, $password, $dbh) {
          $sql = "SELECT * FROM `users` WHERE `username`=:user AND password=:pass ";
          $query = $dbh->prepare($sql);
          $query->bindParam(':user', $user, PDO::PARAM_STR);
          $query->bindParam(':pass', $pass);
          $user = $username;
          $pass = md5($password);
          $query->execute();
          $row = $query->fetch(PDO::FETCH_ASSOC);
          if($row==0){
            array_push($this->errorArray, Constants::$loginFailed);
            return false;
          }
          else {
            return true;
          }
        }
  }

 ?>
