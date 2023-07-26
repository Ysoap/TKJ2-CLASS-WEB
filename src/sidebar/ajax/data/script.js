
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

  $('#update-data').on('submit', function (e) {
    $.get("ajax/data/index.php",
    function (response) {
      $('main').html(response)
      $('head').append('<link rel="stylesheet" type="text/css" href="ajax/data/style.css">')
      $('link[href="ajax/dashboard/style.css"]').remove()
      $.getScript("ajax/data/script.js")
      }
    );
});
})