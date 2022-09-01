$(document).ready(function() {

    $('#table-tcc').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let ID = `ID=${$(this).attr('id')}`

        Swal.fire({
            title: 'Sistema Organizador de TCCs',
            text: "Deseja realmente excluir esse registro?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Sim',
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: ID,
                    url: 'src/tcc/modelo/delete-tcc.php',
                    success: function(dados) {
                        Swal.fire({
                            title: 'Sistema Organizador de TCCs',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#table-tcc').DataTable().ajax.reload()
                    }
                })


            }
        })
    })
})