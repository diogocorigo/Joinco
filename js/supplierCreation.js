$(document).ready(function () {
    // adicionar email à datatable    
    var tL = $('#emailList').DataTable();
    var counterEmailDatatable = 1;
    $('#addEmail').on('click', function () {
        tL.row.add([
            email = $("#cr_supplierEmail").val(),
            radio = "<input type='radio' name='setAsDefaultEmail'></input>"
        ]).draw(false);
        counterEmailDatatable++;
    })
    // adicionar cat à datatable
    var tC = $('#catList').DataTable();
    var counterCatDatabase = 1;
    $('#addCat').on('click', function () {
        tC.row.add([
            Category = $("#cr_supplierCategory").val(),
        ]).draw(false);
        counterCatDatabase++;
    })
    // adicionar img à datatable
    var tI = $('#imgList').DataTable();
    var counterImgDatabase = 1;
    $('#addImg').on('click', function () {
        tI.row.add([
            Img = $("#cr_supplierImage").val(),
        ]).draw(false);
        counterImgDatabase++;
    })

    $('#newSupplierCreation').on('click', function () {
        if ($("cr_supplierName").val() == '') {
            $("supplierCreationError").text("Preencha o Nome");
        } else {
            if ($("cr_supplierContact").val() == '') {
                $("supplierCreationError").text("Preencha o Contacto");
            } else {
                if ($("cr_supplierAddress").val() == '') {
                    $("supplierCreationError").text("Preencha o Address");
                } else {
                    if ($("cr_supplierCountry").val() == '') {
                        $("supplierCreationError").text("Selecione um Country");
                    } else {
                        if ($("cr_supplierCardFront").val() == '') {
                            $("supplierCreationError").text("Selecione uma imagem correspondente ao Card Front");
                        } else {
                            if ($("cr_supplierCardBack").val() == '') {
                                $("supplierCreationError").text("Selecione uma imagem correspondente ao Card Back");
                            } else {
                                $.ajax({
                                    url: "./includes/___ php onde será feito o insert na bd ___.php",
                                    type: "get",
                                    data: {
                                        nome: $("cr_supplierName").val(),
                                        contact: $("cr_supplierContact").val(),
                                        adress: $("cr_supplierAdress").val(),
                                        country: $("cr_supplierCountry").val(),
                                        cardFront: $("cr_supplierCardFront").val(),
                                        cardBack: $("cr_supplierCardBack").val(),
                                        notes: $("cr_supplierNotes").val(),
                                    },
                                })
                                //Envia dados para o php para inserir imagens 
                                for (let i = 1; i < counterImgDatabase - 1; i++) {
                                    $.ajax({
                                        url: "./includes/inserir_img.php",
                                        type: "get",
                                        data: {
                                            img: tI.row[i].Img.val(),
                                        },
                                    })
                                }

                                //Envia dados para o php para inserir categorias
                                for (let j = 1; j < counterCatDatabase - 1; j++) {
                                    $.ajax({
                                        url: "./includes/inserir_categories.php",
                                        type: "get",
                                        data: {
                                            cat: tC.row[j].Category.val(),
                                        },
                                    })
                                }

                                //Envia dados para o php para inserir email's
                                for (let k = 1; k < counterEmailDatabase - 1; k++) {
                                    $.ajax({
                                        url: "./includes/inserir_emails.php",
                                        type: "get",
                                        data: {
                                            email: tE.row[k].email.val(),
                                            radio: tE.row[k].radio.val(),
                                        },
                                    })
                                }
                            }
                        }
                    }
                }
            }
        }
    })

});