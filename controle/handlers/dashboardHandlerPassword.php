<!-- jQuery hosted -->
<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style rel="stylesheet">
        #backButton {
          width: 16rem;
          position: absolute;
          margin: 15px;
          text-decoration: none;
          font-style: italic;
          color: red;
          border: 1px solid gray;
          padding: 6px;
          border-radius: 1rem;
        }
        #backButton:hover {
          background-color: black;
          color: white;
          cursor: pointer;
        }
        #emailForm input {
          margin-bottom: 2rem;
        }
  </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../../view/js/dashboard.js"></script>
<?php
include("../../Model/config.php");
include("../Classes/Constants.php");
include("../Classes/Account.php");
$account = new Account($dbh);
// $user = new User($dbh, $_SESSION['userLoggedIn']);
?>
<div>
  <a id="backButton" href="../../dashboard.php"> << Back to dashboard.</a>
</div>
<div class="container">
<div class="row">
<div class="col-sm-12" style="text-align:center; margin:30px 0 30px 0;">
<h1>Change Password</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<form method="post" id="emailForm" style="text-align: center;">
  <input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Old Password" >
  <input type="password" class="input-lg form-control" name="password2" id="password2" placeholder="New Password" >
  <input type="password" class="input-lg form-control" name="password3" id="password3" placeholder="Confirm New Password" >
  <input type="submit" name="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Password..." value="Change Password"  onclick="changePassword('#password1','#password2','#password3','<?php echo $_SESSION['userLoggedIn']; ?>')">
<span class="err" style="color:green; font-size: 15px;"></span>
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
