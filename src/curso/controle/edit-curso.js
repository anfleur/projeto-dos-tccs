$(document).ready(function() {

    $('#table-curso').on('click', 'button.btn-edit', function(e) {

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
            url: 'src/curso/modelo/view-curso.php',
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/curso/visao/form-curso.html', function() {
                        $('#NOME').val(dado.dados.NOME)
                        $('#EIXO_ID').empty()
                        $('#ID').val(dado.dados.ID)

                        var EIXO_ID = dado.dados.EIXO_ID

                        //Consultar todos os tipos cadastrados no banco de daods
                        $.ajax({
                            dataType: 'json',
                            type: 'POST',
                            assync: true,
                            url: 'src/eixo/modelo/all-eixo.php',
                            success: function(dados) {
                                for (const result of dados) {
                                    if (result.ID == EIXO_ID) {
                                        $('#EIXO_ID').append(`<option value="${result.ID}" selected>${result.TITULO}</option>`)
                                    } else {
                                        $('#EIXO_ID').append(`<option value="${result.ID}">${result.TITULO}</option>`)
                                    }

                                }
                            }
                        })
                    })
                    $('.btn-save').removeAttr('data-operation', 'insert')
                    $('.btn-save').show()
                    $('#modal-curso').modal('show')
                } else {
                    Swal.fire({ // Inicialização do SweetAlert
                        title: 'Sistema Gerenciador de TCCs', // Título da janela SweetAlert
                        text: dado.mensagem, // Mensagem retornada do microserviço
                        type: dado.tipo, // vendedor de retorno [success, info ou error]
                        confirmButtonText: 'OK'
                    })
                }
            }
        })

    })
})