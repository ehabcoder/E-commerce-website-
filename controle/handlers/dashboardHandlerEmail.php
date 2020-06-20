<!-- jQuery hosted -->
<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <style rel="stylesheet">
        #backButton {
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
  <a id="backButton" href="../../dashboard.php"> << Back </a>
</div>
<div class="container">
<div class="row">
<div class="col-sm-12" style="text-align:center; margin:30px 0 30px 0;">
<h1>Change Email</h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<form method="post" id="emailForm" style="text-align: center;">
<input type="Email" class="input-lg form-control" name="email" id="email" placeholder="New Email" >
<input type="submit" name="submit" class="col-xs-12 btn btn-primary btn-load btn-lg" data-loading-text="Changing Email..." value="Change Email" style="margin:30px 0 30px 0;" onclick="changeEmail('#email','<?php echo $_SESSION['userLoggedIn']; ?>')">
<span class="err" style="color:green; font-size: 15px;"></span>
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>
