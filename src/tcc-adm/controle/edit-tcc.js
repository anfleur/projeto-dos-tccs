$(document).ready(function() {

    $('#table-tcc-adm').on('click', 'button.btn-edit', function(e) {

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
            url: 'src/tcc-adm/modelo/view-tcc.php',
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/tcc-adm/visao/form-tcc.html', function() {
                        $('#TITULO').val(dado.dados.TITULO)
                        $('#ANO').val(dado.dados.ANO)
                        $('#RESUMO').val(dado.dados.RESUMO)
                        $('#AUTOR_1').val(dado.dados.AUTOR_1)
                        $('#AUTOR_2').val(dado.dados.AUTOR_2)
                        $('#AUTOR_3').val(dado.dados.AUTOR_3)
                        $('#AUTOR_4').val(dado.dados.AUTOR_4)
                        $('#COORDENADOR').val(dado.dados.COORDENADOR)
                        $('#ORIENTADOR').val(dado.dados.ORIENTADOR)
                        $('#ARQUIVO').val(dado.dados.ARQUIVO)
                        $('#CURSO_ID').empty()
                        $('#VALIDACAO').val(dado.dados.VALIDACAO)
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
                    $('#modal-tcc-adm').modal('show')
                } else {
                    Swal.fire({ // Inicialização do SweetAlert
                        title: 'System TCC', // Título da janela SweetAlert
                        text: dado.mensagem, // Mensagem retornada do microserviço
                        type: dado.tipo, // vendedor de retorno [success, info ou error]
                        confirmButtonText: 'OK'
                    })
                }
            }
        })

    })
})