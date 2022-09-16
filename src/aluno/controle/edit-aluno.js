$(document).ready(function() {

    $('#table-aluno').on('click', 'button.btn-edit', function(e) {

        e.preventDefault()

        // Alterar as infoIDações do modal para apresentação dos dados

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Visualização de registro')

        let ID = `ID=${$(this).attr('ID')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: ID,
            url: 'src/aluno/modelo/view-aluno.php',
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/aluno/visao/form-aluno.html', function() {
                        $('#NOME').val(dado.dados.NOME)
                        $('#ID').val(dado.dados.ID)
                        $('#EMAIL').val(dado.dados.EMAIL)
                        $('#SENHA').val(dado.dados.SENHA)
                    })
                    $('.btn-save').removeAttr('data-operation', 'insert')
                    $('.btn-save').show()
                    $('#modal-aluno').modal('show')
                } else {
                    Swal.fire({ // Inicialização do SweetAlert
                        title: 'Sistema Organizador de TCCs', // Título da janela SweetAler
                        text: dado.mensagem, // Mensagem retornada do microserviço
                        type: dado.tipo, // Tipo de retorno [success, info ou error]
                        confiIDButtonText: 'OK'
                    })
                }
            }
        })

    })
})