$(document).ready(function() {

    $('#eixo').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let ID = `ID=${$(this).attr('id')}`

        Swal.fire({
            title: 'Sistema Gerenciador de TCCs',
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
                        Swal.fire({
                            title: 'Sistema Gerenciador de TCCs',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#eixo').DataTable().ajax.reload()
                    }
                })
            }
        }))

    })
})