$(document).ready(function() {

    $('#table-eixo').on('click', 'button.btn-edit', function(e) {

        e.preventDefault()

        // Altera as informações do modal para apresentação dos dados

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Editar o Eixo')

        let ID = `ID=${$(this).attr('id')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: ID,
            url: 'src/eixo/modelo/view-eixo.php',
            success: function(dado) {
                if (dado.tipo == "success") {
                    $('.modal-body').load('src/eixo/visao/form-eixo.html', function() {
                        $('#TITULO').val(dado.dados.TITULO)
                        $('#ID').val(dado.dados.ID)
                    })
                    $('.btn-save').show()
                    $('.btn-save').removeAttr('data-operation')
                    $('#modal-eixo').modal('show')
                } else {
                    Swal.fire({ // Inicialização do SweetAlert
                        title: 'System TCC', // Título da janela SweetAler
                        text: dado.mensagem, // Mensagem retornada do microserviço
                        type: dado.tipo, // Tipo de retorno [success, info ou error]
                        confirmButtonText: 'OK'
                    })
                }
            }
        })

    })
})

