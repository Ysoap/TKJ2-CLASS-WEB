
$.map($("input"), function (val,i) {
    $(val).on("keyup", function () {
        if ($(this).val() != '') {
            $(this).next().css("transform", "translateY(-40px)")
        }
        else{
            $(this).next().css("transform", "translateY(-20px)")
            $(".container input").focus(function() {
                $(this).next("label").css({
                  "transform": "translateY(-40px)",
                  "transition": "transform 0.3s ease-in-out"
                });
              });
            // $(".container input").blur(function() {
            //     $(this).next("label").css({
            //         "transform": "translateY(-20px)",
            //         "transition": "transform 0.3s ease-in-out"
            //       });
            // });
        }
   });
});
$('#tanggallahir').focus(function(){
    $(this).attr('type','date')
})
$('#tanggallahir').blur(function(){
    $(this).attr('type','text')
})
$('#profile-picture').change(function(){
    const file = this.files[0];
    console.log(file);
    if (file){
      let reader = new FileReader();
      reader.onload = function(event){
        console.log(event.target.result);
        $('#imgPreview').attr('src', event.target.result);
      }
      reader.readAsDataURL(file);
    }
  });