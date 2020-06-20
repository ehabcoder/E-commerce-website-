function deleteItem(id, user) {
  $.post("controle/handlers/ajax/deleteItem.php", {itemId: id, user: user})
  .done(function(response){
    alert(response);
    location.reload();
  });
}
function totalPrice(total) {
  let sum = 0;
  for(let i=0; i<total.length; i++) {
    sum += parseInt(total[i]['price'])
  }
  return sum;
}
