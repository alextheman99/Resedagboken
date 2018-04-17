$(document).ready(function() {
    var password = document.getElementById("losen");
    var confirm_password = document.getElementById("ulosen");

    function validatePassword() {
      if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Lösenorden matchar inte!");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
});
