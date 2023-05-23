// const show = document.getElementById("i");
// const password = document.querySelector(".password");
// const del_button = document.querySelector(".hapus");
// console.log(password);

// window.addEventListener("click", (e) => {
//   switch (e.target) {
//     case show:
//       if (password.type == "password") {
//         password.type = "text";
//       } else {
//         password.type = "password";
//       }
//       break;
//     case del_button:
//       break;
//     default:
//       break;
//   }
//   //   if (e.target == show) {
//   //   }
// });
$('.show-password').on('click', function () {
  $('#password').attr('type',function (i,val) {
      return val === 'password' ? 'text' : 'password';
    })
  $('.show-password').toggleClass("bi-eye-fill");
  $('.show-password').toggleClass("bi-eye-slash-fill");
});