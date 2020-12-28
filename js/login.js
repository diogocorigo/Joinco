$(document).ready(function () {
  $("#signin").click(function () {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test($("#inputEmail").val())) {
      $("#error_vazio").text("*Por favor utilize um email autorizado!");
      $("#error_vazio").css("color", "red");
    } else {
      if ($("#inputEmail").val() != "" && $("#inputPassword").val() != "") {
        $.ajax({
          url: "./includes/_server.php",
          type: "get",
          data: {
            username: $("#inputEmail").val(),
            password: $("#inputPassword").val(),
          },
        })
          .done(function (msg) {
            if (msg == "*Pode entrar") {
              window.location.replace("./index.php");
            } else {
              $("#error_vazio").text(msg);
              $("#error_vazio").css("color", "red");
            }
          })
          .fail(function (jqXHR, textStatus, msg) {
            $("#error_vazio").text(msg);
            $("#error_vazio").css("color", "red");
          });
      } else {
        $("#error_vazio").text(
          "*Email/Username e/ou palavra-passe por preencher"
        );
        $("#error_vazio").css("color", "red");
      }
    }
  });
});
