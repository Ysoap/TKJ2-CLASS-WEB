$(document).ready(function () {
  $.get("ajax/dashboard/index.php",
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
  if(event.target.closest('.absensi-navbar')){
     $.get("ajax/absensi/index.php",
      function (response) {
        $('main').html(response)
      })
      $('head').append('<link rel="stylesheet" type="text/css" href="ajax/absensi/style.css">')
      $('link[href="ajax/data/style.css"]').remove()
      $('link[href="ajax/setting/style.css"]').remove()
      $('link[href="ajax/keuangan/style.css"]').remove()
      $('link[href="ajax/dashboard/style.css"]').remove()
      addCloseClass()
  }
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
      $('link[href="ajax/data/style.css"]').remove()
      $('link[href="ajax/dashboard/style.css"]').remove()
      $('link[href="ajax/keuangan/style.css"]').remove()
      $('link[href="ajax/absensi/style.css"]').remove()
      $('head').append('<link rel="stylesheet" type="text/css" href="ajax/setting/style.css">')
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
        $('link[href="ajax/keuangan/style.css"]').remove()
        $('link[href="ajax/setting/style.css"]').remove()
        $('link[href="ajax/absensi/style.css"]').remove()
        $.getScript("ajax/data/script.js")
      })
      addCloseClass()
    }
    if(event.target.closest(".keuangan")){
      $.get("ajax/keuangan/index.php",
        function (response) {
          $('main').html(response)
          $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
          $('link[href="ajax/data/style.css"]').remove()
          $('link[href="ajax/dashboard/style.css"]').remove()
          $('link[href="ajax/setting/style.css"]').remove()
          $('link[href="ajax/absensi/style.css"]').remove()
          addCloseClass()
          // $.getScript("ajax/keuangan/script.js")
        }
      )
    }
  }
  )
  $('main').on("click", function(event) {
      if(event.target.closest(".dashboard-absensi")){
        $.get("ajax/absensi/index.php",
        function (response) {
          $('main').html(response)
          $('head').append('<link rel="stylesheet" type="text/css" href="ajax/absensi/style.css">')
          $('link[href="ajax/data/style.css"]').remove()
          $('link[href="ajax/setting/style.css"]').remove()
          $('link[href="ajax/keuangan/style.css"]').remove()
          $('link[href="ajax/dashboard/style.css"]').remove()
          addCloseClass()
          }
        );
      }
    if(event.target.closest(".dashboard-data")){
      $.get("ajax/data/index.php",
      function (response) {
        $('main').html(response)
        $('head').append('<link rel="stylesheet" type="text/css" href="ajax/data/style.css">')
        $('link[href="ajax/dashboard/style.css"]').remove()
        $('link[href="ajax/keuangan/style.css"]').remove()
        $('link[href="ajax/setting/style.css"]').remove()
        $('link[href="ajax/absensi/style.css"]').remove()
        $.getScript("ajax/data/script.js")
        addCloseClass()
        }
      );
    }
    if(event.target.closest(".dashboard-keuangan")){
      $.get("ajax/keuangan/index.php",
        function (response) {
          $('main').html(response)
          $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
          $('link[href="ajax/data/style.css"]').remove()
          $('link[href="ajax/dashboard/style.css"]').remove()
          $('link[href="ajax/setting/style.css"]').remove()
          $('link[href="ajax/absensi/style.css"]').remove()
          addCloseClass()
        }
      );
    }
    if(event.target.closest(".dashboard-setting")){
      $.get("ajax/setting/index.php",
        function (response) {
          $('main').html(response)
          $('head').append('<link rel="stylesheet" type="text/css" href="ajax/setting/style.css" />');
          $('link[href="ajax/data/style.css"]').remove()
          $('link[href="ajax/dashboard/style.css"]').remove()
          $('link[href="ajax/keuangan/style.css"]').remove()
          $('link[href="ajax/absensi/style.css"]').remove()
          addCloseClass()
        }
      );
    }
  
  });
})

