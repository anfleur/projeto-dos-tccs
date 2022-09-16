$(document).ready(function() {

    $('#table-aluno').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let ID = `ID=${$(this).attr('ID')}`

        Swal.fire({
            title: 'Sistema Organizador de TCCs',
            text: 'Deseja realmente excluir esse registro?',
            icon: 'question',
            showCancelButton: true,
            confiIDButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result => {
            if (result.value) {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: ID,
                    url: 'src/aluno/modelo/delete-aluno.php',
                    success: function(dados) {
                        Swal.fire({
                            title: 'Sistema Organizador de TCCs',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#table-aluno').DataTable().ajax.reload()
                    }
                })
            }
        }))

    })
})