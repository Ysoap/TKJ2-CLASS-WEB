
$(document).ready(function(){
  $('.loader').hide()
  $("#keyword").on("keyup",()=>{
    $('.loader').show()
  if (keyword.value === '') {
    $.get('ajax/data-content/data.php' ,function(data){
    $('.outer-data-container').html(data)
    $('.loader').hide()
    })
  }
  else{
    $.get('ajax/data-content/data-search.php?keyword=' + $('#keyword').val(),function(data){
      $('.outer-data-container').html(data)
      $('.loader').hide()
    })
    }
  })

})