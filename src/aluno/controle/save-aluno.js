$(document).ready(function() {

    $('.btn-save').click(function(e) {
        e.preventDefault()

        let dados = $('#form-aluno').serialize()

        dados += `&operacao=${$('.btn-save').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/aluno/modelo/save-aluno.php',
            success: function(dados) {
                Swal.fire({
                    title: 'Sistema Organizador de TCCs',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-aluno').modal('hide')
                $('#table-aluno').DataTable().ajax.reload()
            }
        })
    })

})