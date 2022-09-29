$(document).ready(function() {

    $('#table-curso').on('click', 'button.btn-view', function(e) {

        e.preventDefault()

        // Alterar as informações do modal para apresentação dos dados

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Visualização de curso')

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
                        $('#NOME').attr('readonly', 'true')
                        var eixo = dado.dados.EIXO_ID
                        $.ajax({
                            type: 'POST',
                            dataType: 'json',
                            url: 'src/eixo/modelo/all-eixo.php',
                            success: function(dados) {
                                for (const dado of dados) {
                                    if (dado.ID == eixo) {
                                        $('#EIXO_ID').append(`<option value="${dado.ID}">${dado.TITULO}</option>`)
                                    }
                                }
                            }
                        })
                    })
                    $('.btn-save').hide()
                    $('#modal-curso').modal('show')
                } else {
                    Swal.fire({ // Inicialização do SweetAlert
                        title: 'Sistema Gerenciador de TCCs', // Título da janela SweetAler
                        text: dado.mensagem, // Mensagem retornada do microserviço
                        type: dado.tipo, // Tipo de retorno [success, info ou error]
                        confirmButtonText: 'OK'
                    })
                }
            }
        })

    })
})