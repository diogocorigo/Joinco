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

  $("#tb_suppliers").DataTable({
    info: false,
    dom: '<"top"fl>t<"bottom"p><"clear">',
    language: {
      search: "",
      searchPlaceholder: "Search ...",
    },
  });

  $("#tb_defaults").DataTable({
    info: false,
    dom: '<"top"fl>t<"bottom"p><"clear">',
    language: {
      search: "",
      searchPlaceholder: "Search ...",
    },
  });

  $("#tb_validate_supplier").DataTable({
    info: false,
    dom: '<"top"fl>t<"bottom"p><"clear">',
    language: {
      search: "",
      searchPlaceholder: "Search ...",
    },
  });

  $("#tb_admin").DataTable({
    info: false,
    dom: '<"top"fl>t<"bottom"p><"clear">',
    language: {
      search: "",
      searchPlaceholder: "Search ...",
    },
  });

  $("#default").click(function () {
    $("#defaultScreen").removeClass("hidden");
    $("#adminScreen").addClass("hidden");
    $("#superScreen").addClass("hidden");

    $("#default").addClass("active");
    $("#admin").removeClass("active");
    $("#super").removeClass("active");
  });

  $("#admin").click(function () {
    $("#defaultScreen").addClass("hidden");
    $("#adminScreen").removeClass("hidden");
    $("#superScreen").addClass("hidden");

    $("#default").removeClass("active");
    $("#admin").addClass("active");
    $("#super").removeClass("active");
  });

  $("#super").click(function () {
    $("#defaultScreen").addClass("hidden");
    $("#adminScreen").addClass("hidden");
    $("#superScreen").removeClass("hidden");

    $("#default").removeClass("active");
    $("#admin").removeClass("active");
    $("#super").addClass("active");
  });

  $("#logOut").click(function () {
    window.location.replace("./login.php");
  });

  $("#btnUserList").click(function () {
    $("#tbUsers").removeClass("hidden");
    $("#tbCats").addClass("hidden");
  });

  $("#btnCategoriesValidation").click(function () {
    $("#tbUsers").addClass("hidden");
    $("#tbCats").removeClass("hidden");
  });
});
