<?php
include("Model/config.php");
if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
  header("Location: register.php");
}

if(isset($_POST['sendMessage']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $sub = $_POST['subject'];
  $message = $_POST['message'];
  $sql = "INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES (:name, :email, :sub, :message)";
  $query = $dbh->prepare($sql);
  $query->bindParam(":name", $name, PDO::PARAM_STR);
  $query->bindParam(":email", $email, PDO::PARAM_STR);
  $query->bindParam(":sub", $sub, PDO::PARAM_STR);
  $query->bindParam(":message", $message, PDO::PARAM_STR);
  $query->execute();
}
?>


<html lang="pt-br">
<head>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
 <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 <script src="view/js/cart.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
 <link rel="stylesheet" href="view/css/contact.css">
 <title> Contact Us </title>
</head>
<body>
  <div><a href="home.php"style="color: red;"><button>Continu Shopping</a></div>
    <section class="Material-contact-section section-padding section-dark">
      <div class="container">
          <div class="row">
              <!-- Section Titile -->
              <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
                  <h1 class="section-title">Send me a message</h1>
              </div>
          </div>
          <div class="row">

              <!-- contact form -->
              <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
                  <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
                      <!-- Name -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" required data-error="Please enter your name">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- email -->
                      <div class="form-group label-floating">
                        <label class="control-label" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required data-error="Please enter your Email">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Subject -->
                      <div class="form-group label-floating">
                        <label class="control-label">Subject</label>
                        <input class="form-control" id="msg_subject" type="text" name="subject" required data-error="Please enter your message subject">
                        <div class="help-block with-errors"></div>
                      </div>
                      <!-- Message -->
                      <div class="form-group label-floating">
                          <label for="message" class="control-label">Message</label>
                          <textarea class="form-control" rows="3" id="message" name="message" required data-error="Write your message"></textarea>
                          <div class="help-block with-errors"></div>
                      </div>
                      <!-- Form Submit -->
                      <div class="form-submit mt-5">
                          <button class="btn btn-common" name="sendMessage" type="submit" id="form-submit">Send Message</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </section>
</body>
</html>
