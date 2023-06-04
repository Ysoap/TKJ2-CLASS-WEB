// $(document).ready(function () {

    // $('.register').on('click', function (event) {
    //     event.preventDefault()
    //     $.get("ajax/user-profile-input/index.php",
    //         function (response) {
    //             $('main').html(response)
    //         }
    //     );
    // });

    $(document).ready(function() {
        $('#register').on('submit', function(event) {
            var FormData = $(this).serialize()
        $.ajax({
            type: 'POST',
            url: 'ajax/user-profile-input/index.php',
            data: FormData,
            // dataType: "dataType",
            success: function (response) {
                $('main').html(response)
            }
        });
          event.preventDefault();
        
        });
        // $('#add').on('submit', function(event){
        //     event.preventDefault();

        // })
        // $('#add').on('submit', function(event) {
        //   event.preventDefault();
        // //   $.get("ajax/user-profile-input/index.php", function(response) {
        // //     $('main').html(response);
        // //     $('head').append('<link rel="stylesheet" href="ajax/user-profile-input/style.css" type="text/css">');
        // //   });
        // });
      });
    // $('#register').click(function () { 
    //     // e.preventDefault();
    // });
// });