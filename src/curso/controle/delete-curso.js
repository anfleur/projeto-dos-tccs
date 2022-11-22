
$(document).ready(function() {

    

    $('#table-curso').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        let ID = `ID=${$(this).attr('id')}`

        Swal.fire({
            title: 'System TCC',
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
                    url: 'src/curso/modelo/delete-curso.php',
                    success: function(dados) {
                        Swal.fire({
                            title: 'System TCC',
                            text: dados.mensagem,
                            icon: dados.tipo,
                            confirmButtonText: 'OK'
                        })

                        $('#table-curso').DataTable().ajax.reload()
                    }
                })


            }
        })
    })
})