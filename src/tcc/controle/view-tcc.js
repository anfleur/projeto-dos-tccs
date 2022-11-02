$(document).ready(function() {

    $('#table-tcc').on('click', 'button.btn-view', function(e) {

        e.preventDefault()

        // Alterar as informações do modal para apresentação dos dados

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Visualização de Trabalho de Conclusão de Curso cadastrado')

        let ID = `ID=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: ID,
            url: 'src/tcc/modelo/view-tcc.php',
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/tcc/view/form-tcc.html', function() {
                        $('#TITULO').val(dado.dados.TITULO)
                        $('#TITULO').attr('readonly', 'true')
                        $('#ANO').val(dado.dados.ANO)
                        $('#ANO').attr('readonly', 'true')
                        $('#RESUMO').val(dado.dados.RESUMO)
                        $('#RESUMO').attr('readonly', 'true')
                        $('#ORIENTADOR').val(dado.dados.ORIENTADOR)
                        $('#ORIENTADOR').attr('readonly', 'true')
                        $('#COORIENTADOR').val(dado.dados.COORIENTADOR)
                        $('#COORIENTADOR').attr('readonly', 'true')
                        $('#CURSO_ID').empty()
                    })
                    $('.btn-save').hide()
                    $('#modal-tcc').modal('show')
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