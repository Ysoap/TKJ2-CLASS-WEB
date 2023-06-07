

$('.show-password').on('click', function () {
    function show(id){
        $('#'+ id).attr('type',function (i,val) {
            return val === 'password' ? 'text' : 'password';
          })
    }
    show('password_register')
    show('password_register_repeat')
    $('.show-password').toggleClass("bi-eye-fill");
    $('.show-password').toggleClass("bi-eye-slash-fill");
  });