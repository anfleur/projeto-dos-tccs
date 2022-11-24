// Lê a nova função
$(document).ready(function() {

    // A tabela referente ao eixo vai ser chamada quando o botão de delete for clicado
    $('#table-eixo').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let ID = `ID=${$(this).attr('id')}`

        Swal.fire({
            title: 'System TCC',
            text: 'Deseja realmente excluir esse registro?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'

        }).then((result => {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: ID,
                    url: 'src/eixo/modelo/delete-eixo.php',
                    success: function(dados) {
                        Swal.fire({ // Inicialização do SweetAlert
                            title: 'System TCC', // Título da janela SweetAlert
                            text: dado.mensagem, // Mensagem retornada do microserviço
                            type: dado.tipo, // Retorna sendo success, info ou error
                            confirmButtonText: 'OK'
                        })
                        $('#table-eixo').DataTable().ajax.reload()
                    }
                })
            }
        }))

    })
})
