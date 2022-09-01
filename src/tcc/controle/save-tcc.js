$(document).ready(function() {

    $('.btn-save').click(function(e) {
        e.preventDefault()

        let dados = $('#form-tcc').serialize()

        dados += `&operacao=${$('.btn-save').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/tcc/modelo/save-tcc.php',
            success: function(dados) {
                Swal.fire({
                    title: 'Sistema organizador de TCCs',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-tcc').modal('hide')
                $('#table-tcc').DataTable().ajax.reload()
            }
        })
    })

})