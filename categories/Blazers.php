<?php
include("../Model/config.php");
if(isset($_SESSION['userLoggedIn'])) {
  $userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
  header("Location: register.php");
}
function selectByCategoryId($categoryID, $dbh) {
 $sql = "SELECT * FROM `items` WHERE `category`= :categoryID";
 $query = $dbh->prepare($sql);
 $query->bindParam(':categoryID',$categoryID, PDO::PARAM_INT);
 $query->execute();
 $item = $query->fetchAll(PDO::FETCH_ASSOC);
 return $item;
}

$blazersItems =  selectByCategoryId(3, $dbh);

include("categoryHeader.php");
?>
<div class="container">
   <h3 class="h3" style="margin-top: 100px;"> <b>Blazers</b> </h3>
   <div class="row">
     <?php
     for($i=0; $i<count($blazersItems); $i++){
     echo "
           <div class='col-md-3 col-sm-6'>
               <div class='product-grid4'>
                   <div class='product-image4'>
                       <a onclick='viewDetails(".json_encode($blazersItems[$i]).")'>
                           <img class='pic-1' src='../".$blazersItems[$i]['itemImage']."'>
                           <img class='pic-2' src='../".$blazersItems[$i]['itemImage']."'>
                       </a>
                       <ul class='social'>
                           <li><a  onclick='viewDetails(".json_encode($blazersItems[$i]).")' data-tip='Quick View'><i class='fa fa-eye'></i></a></li>
                           <li><a  onclick='addToCart(".json_encode($blazersItems[$i]).",".json_encode($userLoggedIn).")' data-tip='Add to Cart'><i class='fa fa-shopping-cart'></i></a></li>
                       </ul>
                   </div>
                   <div class='product-content'>
                       <h3 class='title'><a style='cursor:pointer;' onclick='viewDetails(".json_encode($blazersItems[$i]).")'>".$blazersItems[$i]['NAME']."</a></h3>
                       <div class='price'>
                           ".$blazersItems[$i]['price']." .EGP
                       </div>
                       <a class='add-to-cart' onclick='addToCart(".json_encode($blazersItems[$i]).",".json_encode($userLoggedIn).")' style='cursor: pointer;'>ADD TO CART</a>
                   </div>
               </div>
           </div> ";
         }
           ?>
           <div class="card details" style="width: 18rem; display: none;">
           <div class="card-body">
             <img class="ic" src="../view/assets/images/icons/close.png" style="float:right; cursor:pointer;">
             <h5 class="card-title"></h5>
             <p class="card-text"></p>
           </div>
         </div>
           </div>
       </div>
   </div>


<?php include("../controle/footer.php");?>
