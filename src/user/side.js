$.get("ajax/keuangan/index.php",
  function (response) {
    $('main').html(response)
    $('head').append('<link rel="stylesheet" type="text/css" href="ajax/dashboard/style.css" />');
    // $.getScript("../../node_modules/bootstrap/dist/js/bootstrap.bundle.js", function (script, textStatus, jqXHR) {
      
    // });
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
  if(event.target.closest('.dashboard')){
     $.get("ajax/dashboard/index.php",
      function (response) {
        $('main').html(response)
      })
      $('head').append('<link rel="stylesheet" type="text/css" href="ajax/dashboard/style.css" />');
      $('link[href="ajax/data/style.css"]').remove()
      addCloseClass()
  }
  if(event.target.closest(".setting") || event.target.closest(".setting-dashboard")){
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

$('main').on("click", function(event) {
  if(event.target.closest(".dashboard-dashboard")){
    if(event.target.closest(".dashboard-data")){
      $.get("ajax/dashboard/index.php",
      function (response) {
        $('main').html(response)
        $('link[href="ajax/data/style.css"]').remove()
        }
      );
    }
  }
  if(event.target.closest(".dashboard-data")){
    $.get("ajax/data/index.php",
    function (response) {
      $('main').html(response)
      $('head').append('<link rel="stylesheet" type="text/css" href="ajax/data/style.css">')
      $('link[href="ajax/dashboard/style.css"]').remove()
      $.getScript("ajax/data/script.js")
      }
    );
  }
  if(event.target.closest(".dashboard-keuangan")){
    $.get("ajax/keuangan/index.php",
      function (response) {
        $('main').html(response)
        $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
      }
    );
  }
  if(event.target.closest(".dashboard-dashboard")){}

});