$(document).ready(function() {

    $('.btn-save').click(function(e) {
        e.preventDefault()

        let dados = $('#form-curso').serialize()

        dados += `&operacao=${$('.btn-save').attr('data-operation')}`

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            data: dados,
            url: 'src/curso/modelo/save-curso.php',
            success: function(dados) {
                Swal.fire({ // Inicialização do SweetAlert
                    title: 'System TCC', // Título da janela SweetAlert
                    text: dado.mensagem, // Mensagem retornada do microserviço
                    type: dado.tipo, // Retorna sendo success, info ou error
                    confirmButtonText: 'OK'
                })
                // Esconde a modal
                $('#modal-curso').modal('hide')
                $('#table-curso').DataTable().ajax.reload()
            }
        })
    })

})