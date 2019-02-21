function categoria($id){
      $.ajax({
          url: "categoria/getCategoria?id="+ $id,
          type: 'GET',         
           success: function(data) {
               alert($id);
                location.href = "categoria/getCategoria";
            }

          
      })
}
$(document).ready(function () {
  $('#myCarousel').find('.item').first().addClass('active');
   abrirpop();
});

function fecharpop() {
    document.getElementById('pop').style.display = 'none';
}
function abrirpop() {
    document.getElementById('pop').style.display = 'block';
    setTimeout("fecharpop()", 300000);
}


