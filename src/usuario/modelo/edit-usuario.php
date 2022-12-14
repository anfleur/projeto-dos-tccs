<?php
$(document).ready(function() {

$('#table-usuario').on('click', 'button.btn-edit', function(e) {

    e.preventDefault()

    // Alterar as informações do modal para apresentação dos dados

    $('.modal-title').empty()
    $('.modal-body').empty()

    $('.modal-title').append('Visualização de registro')

    let ID = `ID=${$(this).attr('id')}`

    $.ajax({
        type: 'POST',
        dataType: 'json',
        assync: true,
        data: ID,
        url: 'src/usuario/modelo/view-usuario.php',
        success: function(dado) {
            if (dado.tipo == "success") {
                $('.modal-body').load('src/usuario/visao/form-usuario.html', function() {
                    $('#NOME').val(dado.dados.NOME)
                    $('#EMAIL').val(dado.dados.EMAIL)
                    $('#SENHA').val(dado.dados.SENHA)
                    $('#TIPO_ID').empty()
                    $('#ID').val(dado.dados.ID)
                    $('#LOGIN').val(dado.dados.LOGIN)

                    var CURSO_ID = dado.dados.TIPO_ID

                    //Consultar todos os tipos cadastrados no banco de daods
                    $.ajax({
                        dataType: 'json',
                        type: 'POST',
                        assync: true,
                        url: 'src/tipo/modelo/all-tipo.php',
                        success: function(dados) {
                            for (const result of dados) {
                                if (result.ID == TIPO_ID) {
                                    $('#TIPO_ID').append(`<option value="${result.ID}" selected>${result.NOME}</option>`)
                                } else {
                                    $('#TIPO_ID').append(`<option value="${result.ID}">${result.NOME}</option>`)
                                }

                            }
                        }
                    })
                })
                $('.btn-save').removeAttr('data-operation', 'insert')
                $('.btn-save').show()
                $('#modal-usuario').modal('show')
            } else {
                Swal.fire({ // Inicialização do SweetAlert
                    title: 'Sistema Organizado de TCCs', // Título da janela SweetAlert
                    text: dado.mensagem, // Mensagem retornada do microserviço
                    type: dado.tipo, // tcc de retorno [success, info ou error]
                    confirmButtonText: 'OK'
                })
            }
        }
    })

})
})

?>