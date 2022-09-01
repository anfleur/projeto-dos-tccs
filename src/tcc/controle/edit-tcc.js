$(document).ready(function() {

    $('#table-tcc').on('click', 'button.btn-edit', function(e) {

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
            url: 'src/tcc/modelo/view-tcc.php',
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/tcc/visao/form-tcc.html', function() {
                        $('#NOME').val(dado.dados.NOME)
                        $('#ANO').val(dado.dados.ANO)
                        $('#DESCRICAO').val(dado.dados.DESCRICAO)
                        $('#CURSO_ID').empty()
                        $('#ID').val(dado.dados.ID)

                        var CURSO_ID = dado.dados.CURSO_ID

                        //Consultar todos os tipos cadastrados no banco de daods
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            assync: true,
                            url: 'src/curso/modelo/all-curso.php',
                            success: function(dados) {
                                for (const result of dados) {
                                    if (result.ID == CURSO_ID) {
                                        $('#CURSO_ID').append(`<option value="${result.ID}" selected>${result.NOME}</option>`)
                                    } else {
                                        $('#CURSO_ID').append(`<option value="${result.ID}">${result.NOME}</option>`)
                                    }

                                }
                            }
                        })
                    })
                    $('.btn-save').removeAttr('data-operation', 'insert')
                    $('.btn-save').show()
                    $('#modal-tcc').modal('show')
                } else {
                    Swal.fire({ // Inicialização do SweetAlert
                        title: 'Sistema Organizador de TCCs', // Título da janela SweetAlert
                        text: dado.mensagem, // Mensagem retornada do microserviço
                        type: dado.tipo, // tcc de retorno [success, info ou error]
                        confirmButtonText: 'OK'
                    })
                }
            }
        })

    })
})
