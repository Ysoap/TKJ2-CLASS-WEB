$.get("ajax/dashboard/index.php",
  function (response) {
    $('main').html(response)
    $('head').append('<link rel="stylesheet" type="text/css" href="ajax/dashboard/style.css" />');
  });
$(window).on("click",function (event) {
  switch(event.target){
    case $('.header')[0]:
      window.location = "index.php";
      break;
    case $('.humberger-toggle')[0] && $('.humberger-toggle')[0].firstChild :
      $('main').toggleClass('nav-open')
      $('#sidebar').toggleClass('close');;
      $('#sidebar .sidebar-content-container').children().each(function() {
        $(this).find(":last-child").toggleClass("nav-child-closed");
      });
      break;
    default:
      break;
  }
});
function addCloseClass(){
  setTimeout(
    function () {
      $('#sidebar .sidebar-content-container').children().each(function() {
        $(this).find(":last-child").addClass("nav-child-closed");
      });
      $('#sidebar').addClass('close');

      },200
  )
}
$("#sidebar").on('click', function (event) {
  if(event.target.closest('.dashboard') || event.target.closest('.icon-text')){
     $.get("ajax/dashboard/index.php",
      function (response) {
        $('main').html(response)
      })
      $('head').append('<link rel="stylesheet" type="text/css" href="ajax/dashboard/style.css" />');
      $('link[href="ajax/data/style.css"]').remove()
      addCloseClass()
  }
  if(event.target.closest(".setting")){
    $.get("ajax/setting/index.php",
      function (response) {
        $('main').html(response)
      })
      addCloseClass()
    }
    if(event.target.closest(".data")){
      $.get("ajax/data/index.php",
      function (response) {
        $('main').html(response)
        $.getScript("ajax/data/script.js", function (script, textStatus, jqXHR) {
          
        });
        $('head').append('<link rel="stylesheet" type="text/css" href="ajax/data/style.css">')
        $('link[href="ajax/dashboard/style.css"]').remove()
      })
      addCloseClass()
  }
});

