$(document).ready(function() {
  console.log("hello");
  var pattern_email = /^[a-z][a-z0-9\_]{2,31}@[a-z]{3,}(\.[a-z]{2,4}){1,2}$/;
  $("input#user").change(function() {
    var value_email = $("input#user").val();
    if (value_email.match(pattern_email)) {
      $(".error_mes_email").css("display", "none");

    } else {
      $(".error_mes_email").css("display", "block");
    }
  });
  $("input#pass").change(function() {
    var value_pass = $("input#pass").val().length;
    if (value_pass >=4 && value_pass <=8) {
      $(".error_mes_pass").css("display", "none");
    } else {
      $(".error_mes_pass").css("display", "block");
    }
  });
})
