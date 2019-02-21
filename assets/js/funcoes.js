
$(document).ready(function () {
    $('#mensagem').hide();
});




//SCRIPTS PARA CATEGORIAS//
function apagarCategoria($id) {
    var confirma = confirm('Tem certeza que deseja excluir?');
    if (confirma) {
        $.ajax({
            url: 'categoria/apagarCategoria?id_categoria=' + $id,
            type: 'GET',
            success: function (data) {
                location.href = " ";
            }

        });
    }
}

function editarCategoria($id, $nome_categoria) {
    $('#categoria').val($nome_categoria);
    $('#enviar-categoria').text('Alterar');
    $('#id_categoria').val($id);
    $('#enviar-categoria').addClass('btn btn-warning');

    $('#enviar-categoria').click(function () {
        $('#inserir-categoria').attr('action', 'categoria/alterarCategoria');
        $("#inseir-categoria").submit();
    });

}
//FIM CATEGORIAS//
//*****************
//SCRIPTS NOTICIAS//
function apagarNoticia($id) {


    var confirma = bootbox.confirm({
        title: "Apagar Notícia?",
        message: "Você tem certeza que deseja apagar esta noticia?.",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Confirm'
            }
        },
        callback: function (result) {
            if (result == true) {
                $.ajax({
                    url: 'apagarNoticia?id_noticia=' + $id,
                    type: 'GET',
                    success: function (data) {
                        bootbox.alert("Notícia apagada com sucesso!", function () {
                            location.href = "listarNoticias";
                        });
                        
                    }
                });

            }

        }
    });
}
//APAGAR USUARIO
function apagarUsuario($id) {
    var confirma = confirm('Tem certeza que deseja excluir?');
    if (confirma) {
        $.ajax({
            url: 'apagarUsuario?id_usuario=' + $id,
            type: 'GET',
            success: function (data) {
                location.href = " ";
            }
        });
    }
}


function abrirModal($id, $nome, $assunto, $email, $mensagem) {
    $('#mensagem').hide();
    $('#mensagem').show('slow');
    $('#mensagem p').html("<strong> Nome: </strong>" + $nome + "<br><strong>Assunto: </strong>" + $assunto + "<br><strong>Email: </strong>" + $email + "<br><strong>Mensagem: </strong>" + $mensagem);
}

function apagarMensagem($id) {
    var confirma = confirm('Tem certeza que deseja excluir?');
    if (confirma) {
        $.ajax({
            url: 'apagarMensagem?id=' + $id,
            type: 'GET',
            success: function (data) {
                location.href = " ";
            }
        });
    }
}

