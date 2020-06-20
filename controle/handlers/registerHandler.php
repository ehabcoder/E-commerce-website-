<?php
function sanitizeFormUsername($input) {
  $input = strip_tags($input);
  $input = str_replace(' ', '', $input);
  return $input;
}
function sanitizeFormString($input) {
  $input = strip_tags($input);
  $input = str_replace(' ', '', $input);
  $input = ucFirst(strtolower($input));
  return $input;
}
function sanitizeFormPassword($input) {
  $input = strip_tags($input);
  return $input;
}
if(isset($_POST['signUpButton'])) {
  $username = sanitizeFormUsername($_POST['username']);
  $Fname = sanitizeFormString($_POST['fname']);
  $Lname = sanitizeFormString($_POST['lname']);
  $email = sanitizeFormString($_POST['email']);
  $conEmail = sanitizeFormString($_POST['conEmail']);
  $password = sanitizeFormPassword($_POST['pass']);
  $conpassword = sanitizeFormPassword($_POST['conPass']);

  $wasSuccessful = $account->register($username, $Fname, $Lname, $email, $conEmail, $password, $conpassword, $dbh);
  if($wasSuccessful) {
    $_SESSION['userLoggedIn'] = $username;
    header("Location: index.php");
  }

}
?>
