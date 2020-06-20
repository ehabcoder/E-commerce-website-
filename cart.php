<?php
include("Model/config.php");
if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
  header("Location: register.php");
}
$sql1 = "SELECT `id` from `users` where `username`=:user";
$querey1 = $dbh->prepare($sql1);
$querey1->bindParam(":user", $userLoggedIn, PDO::PARAM_STR);
$querey1->execute();
$userId = $querey1->fetch(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM `cart` where `user`=:user";
$query2 = $dbh->prepare($sql);
$query2->bindParam(':user',$userId['id'], PDO::PARAM_INT);
$query2->execute();
$item = $query2->fetchAll(PDO::FETCH_ASSOC);

?>

<html lang="pt-br">
   <head>
     <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
     <script src="view/js/cart.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
     <link rel="stylesheet" href="view/css/cart.css">
     <title> Cart </title>
   </head>
   <body>
     <div class="container">
   <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                Fassion cart
                <a href="home.php" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                    <!-- PRODUCT -->
            <?php
            for($i=0; $i<count($item); $i++) {
            echo "
                    <div class='row'>
                        <div class='col-12 col-sm-12 col-md-2 text-center'>
                                <img class='img-responsive' src='".$item[$i]['image']."' alt='prewiew' width='120' height='80'>
                        </div>
                        <div class='col-12 text-sm-center col-sm-12 text-md-left col-md-6'>
                            <h4 class='product-name'><strong>".$item[$i]['name']."</strong></h4>

                        </div>
                        <div class='col-12 col-sm-12 text-sm-center col-md-4 text-md-right row'>
                            <div class='col-3 col-sm-3 col-md-6 text-md-right' style='padding-top: 5px'>
                                <h6><strong>".$item[$i]['price']."<span class='text-muted'>.EGP</span></strong></h6>
                            </div>
                            <div class='col-4 col-sm-4 col-md-4'>

                            </div>
                            <div class='col-2 col-sm-2 col-md-2 text-right'>
                                <button type='button' class='btn btn-outline-danger btn-xs' onclick='deleteItem(".json_encode($item[$i]).",".json_encode($_SESSION['userLoggedIn']).")'>
                                    <i class='fa fa-trash' aria-hidden='true'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>";
                  }
?>
                    <!-- END PRODUCT -->
                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </div>
            </div>
            <div class="card-footer">
                <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">

                </div>
                <div class="pull-right" style="margin: 10px">
                    <a href="" class="btn btn-success pull-right">Checkout</a>
                    <div class="pull-right" style="margin: 5px">
                        Total price: <b><span id="tot"></span></b><b> E£</b>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
document.getElementById("tot").innerHTML = totalPrice(<?php echo json_encode($item);?>);
</script>
