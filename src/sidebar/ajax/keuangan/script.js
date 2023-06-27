$('form').on('submit', function (e) {
    e.preventDefault()
    var formData = {
        deskripsi : $('#deskripsi').val(),
        value : $('#value').val()
    }
    $.ajax({
        type: "POST",
        url: "ajax/keuangan/depend.php",
        data: {
            json: JSON.stringify(formData)
        },
        success: function (response) {
            // console.log(response)
            $.get("ajax/keuangan/index.php",
            function (response) {
              $('main').html(response)
              $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
              $('.modal-backdrop').removeClass('modal-backdrop fade show');
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});