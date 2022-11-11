$(document).ready(function() {

    $('.btn-save').click(function(e) {
        e.preventDefault()

        let dados = $('#form-eixo').serialize()

        dados += `&operacao=${$('.btn-save').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/eixo/modelo/save-eixo.php',
            success: function(dados) {
                Swal.fire({
                    title: 'Sistema Gerenciador de TCCs',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-eixo').modal('hide')
                $('#table-eixo').DataTable().ajax.reload()
            }
        })
    })

})