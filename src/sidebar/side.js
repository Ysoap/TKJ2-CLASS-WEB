$(document).ready(function () {
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
          $('#sidebar').toggleClass('close');;
          $('#sidebar .sidebar-content-container').children().each(function() {
            $(this).find(":last-child").toggleClass("nav-child-closed");
          });
          break;
        default:
          break;
      }
    });
    
    $("#sidebar").on('click', function (event) {
      if(event.target.closest('.dashboard') || event.target.closest('.dashboard-dashboard')){
         $.get("ajax/dashboard/index.php",
          function (response) {
            $('main').html(response)
          })
      }
      if(event.target.closest(".data"|| event.target.closest('.data-dashboard'))){
        $.get("ajax/data/index.php",
          function (response) {
            $('main').html(response)
          })
      }
      if(event.target.closest(".setting"|| event.target.closest('.setting-dashboard'))){
        $.get("ajax/setting/index.php",
          function (response) {
            $('main').html(response)
          })
      }
    });
});
// console.log('jhf')


