$(document).ready(function () {
    // CREATE NEW SUPPLIER
    $("#tb_suppliers").DataTable({
        info: false,
        dom: '<"top"fl>t<"bottom"pB>',
        language: {
            search: "",
            searchPlaceholder: "Search ...",
        },
        buttons: [
        {
            text: "Add Supplier",
            className: "btnDefault",
            action: function () {
                $("#supplierModal").removeClass("hidden");
            },
        },
        {
            extend: "pdf",
            className: "btnDefault_",
            text: "Download PDF",
        },
        ],
    });

    $("#tb_defaults").DataTable({
        info: false,
        dom: '<"top"fl>t<"bottom"pB><"clear">',
        language: {
            search: "",
            searchPlaceholder: "Search ...",
        },
        buttons: [
        {
            text: "Create New",
            className: "btnDefault",
            action: function () {
                $("#userModal").removeClass("hidden");
            },
        },
        {
            extend: "pdf",
            className: "btnDefault_",
            text: "Download PDF",
        },
        ],
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
        dom: '<"top"fl>t<"bottom"pB><"clear">',
        language: {
            search: "",
            searchPlaceholder: "Search ...",
        },
        buttons: [
        {
            text: "Create New",
            className: "btnDefault",
            action: function () {
                $("#adminModal").removeClass("hidden");
            },
        },
        {
            extend: "pdf",
            className: "btnDefault_",
            text: "Download PDF",
        },
        ],
    });

    // LOGOUT BUTTON
    $("#logOut").click(function () {
        window.location.replace("./login.php");
    });

    // SWITCH BETWEEN SCREENS ON ADMIN
    $("#btnUserList").click(function () {
        $("#tbUsers").removeClass("hidden");
        $("#tbCats").addClass("hidden");
    });

    $("#btnCategoriesValidation").click(function () {
        $("#tbUsers").addClass("hidden");
        $("#tbCats").removeClass("hidden");
    });

    // CLOSE CREATION MODALS

    $("#exitSupplierCreation").click(function () {
        $("#supplierModal").addClass("hidden");
    });

    $("#exitCategoryCreation").click(function () {
        $("#categoryModal").addClass("hidden");
    });

    $("#exitUserCreation").click(function () {
        $("#userModal").addClass("hidden");
    });

    $("#exitAdminCreation").click(function () {
        $("#adminModal").addClass("hidden");
    });

    // USERCREATION
    $("#newUserCreation").click(function () {
        if ($("#cr_userName").val() == "") {
            $("#userCreationError").text("*Por favor preencha o nome!");
            $("#userCreationError").css("color", "red");
        } else if ($("#cr_userContact").val() == "") {
            $("#userCreationError").text("*Por favor preencha o contacto!");
            $("#userCreationError").css("color", "red");
        } else if ($("#cr_userEmail").val() == "") {
            $("#userCreationError").text("*Por favor preencha o email!");
            $("#userCreationError").css("color", "red");
        } else if ($("#cr_userPassword").val() == "") {
            $("#userCreationError").text("*Por favor introduza uma palavra-passe!");
            $("#userCreationError").css("color", "red");
        } else if ($("#cr_userPassword").val() != $("#cr_userPassword2").val) {
            $("#userCreationError").text("*Palavras-passe não coincidem!");
            $("#userCreationError").css("color", "red");
        } else {
            $.ajax({
                url: "./includes/InserirUsers.php",
                type: "get",
                data: {
                    codUser: "",
                    name: $("#cr_userName").val(),
                    email: $("#cr_userEmail").val(),
                    password: $("#cr_userPassword").val(),
                    type: 1,
                    contact: $("#cr_userContact").val(),
                },
            })
            .done(function (msg) {
                $("#userCreationError").text(msg);
                $("#userCreationError").css("color", "red");
            })
            .fail(function (jqXHR, textStatus, msg) {
                $("#userCreationError").text(msg);
                $("#userCreationError").css("color", "red");
            });
        }
    });

    // ADMIN CREATION
    $("#newAdminCreation").click(function () {
        if ($("#cr_adminName").val() == "") {
            $("#adminCreationError").text("*Por favor preencha o nome!");
            $("#adminCreationError").css("color", "red");
        } else if ($("#cr_adminContact").val() == "") {
            $("#adminCreationError").text("*Por favor preencha o contacto!");
            $("#adminCreationError").css("color", "red");
        } else if ($("#cr_adminEmail").val() == "") {
            $("#adminCreationError").text("*Por favor preencha o email!");
            $("#adminCreationError").css("color", "red");
        } else if ($("#cr_adminPassword").val() == "") {
            $("#adminCreationError").text("*Por favor introduza uma palavra-passe!");
            $("#adminCreationError").css("color", "red");
        } else if ($("#cr_adminPassword").val() != $("#cr_adminPassword2").val) {
            $("#adminCreationError").text("*Palavras-passe não coincidem!");
            $("#adminCreationError").css("color", "red");
        } else {
            $.ajax({
                url: "./includes/InserirUsers.php",
                type: "get",
                data: {
                    codUser: "",
                    name: $("#cr_adminName").val(),
                    email: $("#cr_adminEmail").val(),
                    password: $("#cr_adminPassword").val(),
                    type: 2,
                    contact: $("#cr_adminContact").val(),
                },
            })
            .done(function (msg) {
                $("#adminCreationError").text(msg);
                $("#adminCreationError").css("color", "red");
            })
            .fail(function (jqXHR, textStatus, msg) {
                $("#adminCreationError").text(msg);
                $("#adminCreationError").css("color", "red");
            });
        }
    });
    
    // CREATE CATEGORY BUTTON
    $("#newCategoryCreation").click(function() {
        $("#categoryModal").removeClass("hidden");
    });

    // CATEGORIES & EMAILS DATATABLES
    $("#emailList").DataTable({
        info: false,
        dom: 'p',
        "pageLength": "5",
        "columnDefs": [
            {"width": "95%", "target": 0}   
        ]
    });

    $("#catList").DataTable({
        info: false,
        dom: 'p',
        "pageLength": "5",
    });
});

