<?php include("controle/header.php");

  $sql = "SELECT * from `categories`";
  $query = $dbh->prepare($sql);
  $query->execute();
  $categories = $query->fetchAll(PDO::FETCH_ASSOC);

  $sql2 = "SELECT `isAdmin` from `users` where `username`=:user";
  $query2 = $dbh->prepare($sql2);
  $query2->bindParam(":user", $userLoggedIn, PDO::PARAM_STR);
  $query2->execute();
  $isAdmin = $query2->fetch(PDO::FETCH_ASSOC);

  $sql = "SELECT * FROM `users` WHERE `username`=:user";
  $query = $dbh->prepare($sql);
  $query->bindParam(':user', $user);
  $user = $userLoggedIn;
  $query->execute();
  $results = $query->fetch(PDO::FETCH_ASSOC);

?>
<div class="bg-banner" style="letter-spacing: 2px;">
<div class="overlay1"></div>
 <nav class="navbar navbar-default">
   <div class="container">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
     </div>
     <li class="dropdown">
         <a id="detail" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $results["fname"]." ". $results["lname"];?></b></a>
         <ul class="dropdown-menu">
           <li><a href="controle/handlers/homeChangeEmail.php"><i class="fa fa-fw fa-cog"></i> Change Email </a></li>
             <li><a href="controle/handlers/homeChangePassword.php"><i class="fa fa-fw fa-cog"></i> Change Password </a></li>
             <li class="divider"></li>
             <li style="cursor:pointer;"><a href="controle/handlers/logout.php"><i class="fa fa-fw fa-power-off"></i>LOGOUT</a></li>
         </ul>
     </li>
 	<div class="col-xs-12 text-center bb">
 		<a class="navbar-brand" href="index.php" style="font-size: 50px;">FASION</a>
 	 </div>

     <!-- Collect the nav links, forms, and other content for toggling -->
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
         <li class="active"><a href="home.php"><strong>Home</strong></a></li>

        <li><a href="#categories">Shop By Categories</a></li>
     		<li><a href="DailyDiscount.php">Daily Discount</a></li>
     		<li><a href="about.php">About us</a></li>
        <li><a href="contact.php">Contact us</a></li>
     		<li><a href="cart.php">Cart  <img src="view/assets/images/icons/cart.png"></a></li>
        </ul>
       <?php
       if($isAdmin['isAdmin']){
         echo "
        <div style='text-align: center; margin-top: 20px;'>
          <a href='dashboard.php' id='adminBoard'>go to your dashboard</a>
        </div>
      ";
    }
      ?>
     </div><!-- /.navbar-collapse -->
   </div><!-- /.container-fluid -->
 </nav>
 <div class="jumbotron">
       <div class="container text-center">
         <h1>NEVER STOP EXPLORING.</h1>
        </div>
     </div>
 </div>


  <div class="container" id="categories">
    <h1 style="text-align: center; margin: 30px auto;">Shop By Categories</h1>
  <div class="row">
    <?php
    for($i=0; $i<count($categories); $i++)
    {
    echo "
  						<div class='col-12 col-sm-6 col-md-4 image-grid-item'>
  							<div style='background-image: url(".$categories[$i]['categoryImage'].");' class='image-grid-cover'>
  								<a href='".$categories[$i]['href']."' class='image-grid-clickbox'></a>
  								<a href='".$categories[$i]['href']."' class='cover-wrapper'>".$categories[$i]['name']."</a>
  							</div>
  						</div> ";
            }
      ?>

  </div>
</div>
<footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">

                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/ehab.reda.9028">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/ehabcoder">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/in/ehab-reda-827a6217b/">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/ehab.reda.abdalla/">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social link -->
                    </div>
                    <!-- End Footer info -->
                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">
                        <p>The best online shop 2020</p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>Co-Founder</h3>
                                    <p>Ehab Reda</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>0121052877</h3>
                                    <p>Give us a call</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Contact Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Useful Links</h3>
                                    <span class="animate-border border-black"></span>
                                </div>

                                <ul>
                                    <li>
                                        <a href="about.php">About us</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="contact.php">Contact us</a>
                                    </li>


                                </ul>

                            </div>
                            <!-- End Footer Widget -->
                        </div>
                        <!-- End col -->
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">

                                <p> Subscribe Now with us:</p>
                                <form action="#" style="text-align: center;">
                                    <div class="form-row">
                                        <div class="col dk-footer-form">
                                            <input type="email" style="height: 51px;" class="form-control" placeholder="Email Address">
                                            <button type="submit">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                        <p>Don't worry we don't share your email with anyone</p>
                                    </div>
                                    <div class="section-heading">
                                        <h3>Subscribe</h3>
                                        <span class="animate-border border-black"></span>
                                    </div>
                                </form>

                                <!-- End form -->
                            </div>
                            <!-- End footer widget -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Widget Row -->
        </div>
        <!-- End Contact Container -->
