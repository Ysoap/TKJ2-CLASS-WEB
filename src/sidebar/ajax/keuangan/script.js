$('#modalTambah').on('submit', function (e) {
    e.preventDefault()
    var formData = {
        deskripsi : $('#modalTambah #deskripsi').val(),
        value : $('#modalTambah #value').val()
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
              $('body').css("overflow","visible")
              $('body').css("padding","0px")
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});
$('#modalKeluar').on('submit', function (e) {
    e.preventDefault()
    var formData = {
        deskripsi : $('#modalKeluar #deskripsi').val(),
        value : $('#modalKeluar #value').val()
    }
    $.ajax({
        type: "POST",
        url: "ajax/keuangan/min.php",
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
              $('body').css("overflow", "visible")
              $('body').css("padding","0px")
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});
$('#tunggakan').on('submit', function (e) {
    console.log('kmsDD')
    e.preventDefault()
    var formData = {
        value : $('#tunggakan #tunggakan-value').val(),
        id : $('#tunggakan #tunggakan-id').val()
    }
    $.ajax({
        type: "POST",
        url: "ajax/keuangan/tunggakan.php",
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
              $('body').css("overflow", "visible")
              $('body').css("padding","0px")
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});
$('#surplus').on('submit', function (e) {
    console.log('kms')
    e.preventDefault()
    e.stopPropagation();
    var formData = {
        value : $('#surplus-value').val(),
        id : $('#surplus #surplus-id').val()
    }
    $.ajax({
        type: "POST",
        url: "ajax/keuangan/surplus-kas.php",
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
              $('body').css("overflow", "visible")
              $('body').css("padding","0px")
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});
$('#minus-tunggakan').on('submit', function (e) {
    console.log('kmsDD')
    e.preventDefault()
    var formData = {
        value : $('#minus-tunggakan-value').val(),
        id : $('#minus-tunggakan-id').val()
    }
    $.ajax({
        type: "POST",
        url: "ajax/keuangan/minus-tunggakan.php",
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
              $('body').css("overflow", "visible")
              $('body').css("padding","0px")
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});
$('#minus-surplus').on('submit', function (e) {
    console.log('kmsDD')
    e.preventDefault()
    e.stopPropagation();
    var formData = {
        value : $('#minus-surplus-value').val(),
        id : $('#minus-surplus-id').val()
    }
    $.ajax({
        type: "POST",
        url: "ajax/keuangan/minus-surplus.php",
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
              $('body').css("overflow", "visible")
              $('body').css("padding","0px")
              $.getScript("ajax/keuangan/script.js")
            })
        }
    });
});