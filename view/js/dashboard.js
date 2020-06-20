$(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $(".side-nav .collapse").on("hide.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
    });
    $('.side-nav .collapse').on("show.bs.collapse", function() {
        $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
    });
})
$(document).ready(function(){
$("#emailForm").submit(function(e) {
    e.preventDefault();
});
})
function changeEmail(mail, user) {
  email = $(mail).val();
  if(email=="") {
    $('.err').text("please enter your email.")
    exit()
  }
  username = user;
  $.post("../../controle/handlers/ajax/UpdateEmail.php", {email: email, username: username})
  .done(function(response) {
    if(response) {
      $('.err').text(response)
      return ;
    }
  });
}
function changePassword(password1, password2, password3, user) {
  password1 = $(password1).val();
  password2 = $(password2).val();
  password3 = $(password3).val();
  username = user;
  if(password1=="" || password2=="" || password3=="") {
    $('.err').text("Please Enter All fields.")
    exit()
  }
  $.post("../../controle/handlers/ajax/UpdatePassword.php", {password1: password1, password2: password2, password3: password3, username: username})
  .done(function(response) {
    if(response) {
      $('.err').fadeIn(1000)
      $('.err').text(response)
      $('.err').fadeOut(5000)
      return ;
    }
  });
}
