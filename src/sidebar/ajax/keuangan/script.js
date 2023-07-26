$('#modalTambah').on('submit', function (e) {
    e.preventDefault()
    e.stopPropagation();
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
    e.stopPropagation();
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
// $('#tunggakan').on('submit', function (e) {
//     console.log('kmsDD')
//     e.preventDefault();
//     e.stopPropagation();
//     var formData = {
//         value : $('#tunggakan #tunggakan-value').val(),
//         id : $('#tunggakan #tunggakan-id').val()
//     }
//     $.ajax({
//         type: "POST",
//         url: "ajax/keuangan/tunggakan.php",
//         data: {
//             json: JSON.stringify(formData)
//         },
//         success: function (response) {
//             // console.log(response)
//             $.get("ajax/keuangan/index.php",
//             function (response) {
//               $('main').html(response)
//               $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
//               $('.modal-backdrop').removeClass('modal-backdrop fade show');
//               $('body').css("overflow", "visible")
//               $('body').css("padding","0px")
//               $.getScript("ajax/keuangan/script.js")
//             })
//         }
//     });
// });
// $('#surplus').on('submit', function (e) {
//     console.log('kms')
//     e.preventDefault()
//     e.stopPropagation();
//     var formData = {
//         value : $('#surplus-value').val(),
//         id : $('#surplus #surplus-id').val()
//     }
//     $.ajax({
//         type: "POST",
//         url: "ajax/keuangan/surplus-kas.php",
//         data: {
//             json: JSON.stringify(formData)
//         },
//         success: function (response) {
//             // console.log(response)
//             $.get("ajax/keuangan/index.php",
//             function (response) {
//               $('main').html(response)
//               $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
//               $('.modal-backdrop').removeClass('modal-backdrop fade show');
//               $('body').css("overflow", "visible")
//               $('body').css("padding","0px")
//               $.getScript("ajax/keuangan/script.js")
//             })
//         }
//     });
// });
// $('#minus-tunggakan').on('submit', function (e) {
//     console.log('kmsDD')
//     e.preventDefault()
//     e.stopPropagation();
//     var formData = {
//         value : $('#minus-tunggakan-value').val(),
//         id : $('#minus-tunggakan-id').val()
//     }
//     $.ajax({
//         type: "POST",
//         url: "ajax/keuangan/minus-tunggakan.php",
//         data: {
//             json: JSON.stringify(formData)
//         },
//         success: function (response) {
//             // console.log(response)
//             $.get("ajax/keuangan/index.php",
//             function (response) {
//               $('main').html(response)
//               $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
//               $('.modal-backdrop').removeClass('modal-backdrop fade show');
//               $('body').css("overflow", "visible")
//               $('body').css("padding","0px")
//               $.getScript("ajax/keuangan/script.js")
//             })
//         }
//     });
// });
// $('#minus-surplus').on('submit', function (e) {
//     console.log('kmsDD')
//     e.preventDefault()
//     e.stopPropagation();
//     var formData = {
//         value : $('#minus-surplus-value').val(),
//         id : $('#minus-surplus-id').val()
//     }
//     $.ajax({
//         type: "POST",
//         url: "ajax/keuangan/minus-surplus.php",
//         data: {
//             json: JSON.stringify(formData)
//         },
//         success: function (response) {
//             // console.log(response)
//             $.get("ajax/keuangan/index.php",
//             function (response) {
//               $('main').html(response)
//               $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
//               $('.modal-backdrop').removeClass('modal-backdrop fade show');
//               $('body').css("overflow", "visible")
//               $('body').css("padding","0px")
//               $.getScript("ajax/keuangan/script.js")
//             })
//         }
//     });
// });



// console.log(modal_tunggakan)
// document.getElementById('knhw').querySelector
function rincicanKasUtility(modal,modal_value,modal_id,directory){
    Array.from($(modal)).forEach(element => {
        element.addEventListener('submit', (e)=>{
            e.preventDefault();
            e.stopPropagation();
            // console.log(element)
            let formData = {
                        value : element.querySelector('#' + modal_value).value,
                        id : element.querySelector('#' + modal_id).value
             }
                    $.ajax({
                        type: "POST",
                        url: "ajax/keuangan/" + directory,
                        data: {
                            json: JSON.stringify(formData)
                        },
                        success: function (response) {
            //                 // console.log(response)
                            $.get("ajax/keuangan/index.php",
                            function (response) {
                              $('main').html(response)
            //                   $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
                              $('.modal-backdrop').removeClass('modal-backdrop fade show');
                              $('body').css("overflow", "visible")
                              $('body').css("padding","0px")
                              $.getScript("ajax/keuangan/script.js")
                            }
                            )
                        }
                    });
        })
    })
}

rincicanKasUtility('.modal-tunggakan','tunggakan-value','tunggakan-id','tunggakan.php')
rincicanKasUtility('.modal-surplus','surplus-value','surplus-id','surplus-kas.php')
rincicanKasUtility('.modal-minus-tunggakan','minus-tunggakan-value','minus-tunggakan-id','minus-tunggakan.php')
rincicanKasUtility('.modal-minus-surplus','minus-surplus-value','minus-surplus-id','minus-surplus.php')

// Array.from($('.modal-tunggakan')).forEach(element => {
//     element.addEventListener('submit', (e)=>{
//         e.preventDefault();
//         e.stopPropagation();
//         console.log(element)
//         let formData = {
//                     value : element.querySelector('#tunggakan-value').value,
//                     id : element.querySelector('#tunggakan-id').value
//          }
//                 $.ajax({
//                     type: "POST",
//                     url: "ajax/keuangan/tunggakan.php",
//                     data: {
//                         json: JSON.stringify(formData)
//                     },
//                     success: function (response) {
//         //                 // console.log(response)
//                         $.get("ajax/keuangan/index.php",
//                         function (response) {
//                           $('main').html(response)
//         //                   $('head').append('<link rel="stylesheet" type="text/css" href="ajax/keuangan/style.css" />');
//                           $('.modal-backdrop').removeClass('modal-backdrop fade show');
//                           $('body').css("overflow", "visible")
//                           $('body').css("padding","0px")
//                           $.getScript("ajax/keuangan/script.js")
//                         }
//                         )
//                     }
//                 });
//     })
// })