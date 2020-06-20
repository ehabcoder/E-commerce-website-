$(document).ready(function() {
           $(".menu-icon").on("click", function() {
                 $("nav ul").toggleClass("showing");
           });
           $("#clickME").on("click", function() {
                 $(".menu2").toggleClass("display");
           });
    $(".card").click(function(){
      $(".card").hide();
    });
     });

     // Scrolling Effect

     $(window).on("scroll", function() {
           if($(window).scrollTop()) {
                 $('nav').addClass('black');
           }

           else {
                 $('nav').removeClass('black');
           }
     })

function viewDetails(details) {
  $(".card").show();
  $(".card-body .card-title").text(details.NAME);
  $(".card-body .card-text").text(details.details);

}

function addToCart(details, user) {
$.post("../controle/handlers/ajax/addToCart.php", {itemId:details.id ,name:details.NAME, price: details.price, user: user, image: details.itemImage})
.done(function(response) {
  alert(response);
});
}
