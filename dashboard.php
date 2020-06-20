<?php
include("Model/config.php");
$sql2 = "SELECT `isAdmin` from `users` where `username`=:user";
$query2 = $dbh->prepare($sql2);
$query2->bindParam(":user", $_SESSION['userLoggedIn'], PDO::PARAM_STR);
$query2->execute();
$isAdmin = $query2->fetch(PDO::FETCH_ASSOC);

if(isset($_SESSION['userLoggedIn']) && $isAdmin['isAdmin']) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
  header("Location: home.php");
}
$sql = "SELECT * FROM `users` WHERE `username`=:user";
$query = $dbh->prepare($sql);
$query->bindParam(':user', $user);
$user = $userLoggedIn;
$query->execute();
$results = $query->fetch(PDO::FETCH_ASSOC);
//session_destroy();
?>


<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Dashboard</title>
      <link rel="stylesheet" href="view/css/dashboard.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="view/js/script.js"></script>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

 </head>
<body>

  <div id="throbber" style="display:none; min-height:120px;"></div>
  <div id="noty-holder"></div>
  <div id="wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand">
                  FASHION DASHBOARD
              </div>
          </div>
          <!-- Top Menu Items -->
          <ul class="nav navbar-right top-nav">
              <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                  </a>
              </li>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $results["fname"]." ". $results["lname"];?> <b class="fa fa-angle-down"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="controle/handlers/dashboardHandlerEmail.php"><i class="fa fa-fw fa-user"></i> change Email</a></li>
                      <li><a href="controle/handlers/dashboardHandlerPassword.php"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                      <li class="divider"></li>
                      <li style="cursor:pointer;"><a href="controle/handlers/logout.php"><i class="fa fa-fw fa-power-off"></i>LOGOUT</a></li>
                  </ul>
              </li>
          </ul>
          <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
          <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav side-nav">
                  <li>
                      <a target="_blank" href="index.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-home" aria-hidden="true"></i>  Open your site </a>
                  </li>
                  <li>
                      <a onclick="manage()"><img src="https://img.icons8.com/ios-filled/20/000000/admin-settings-male.png"/> Manage Your Items</a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">
          <div class="container-fluid">
              <!-- Page Heading -->
              <div class="row" id="main" >
                  <div class="col-sm-12 col-md-12 well" id="content">
                      <h1>Welcome <?php echo $results["fname"];?>!</h1>
                  </div>
              </div>
              <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->
  </div><!-- /#wrapper -->
</body>
</html>
