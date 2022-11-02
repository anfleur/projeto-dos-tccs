$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Adicionar novo usuario')

        $('.modal-body').load('src/usuario/visao/form-usuario.html', function() {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                assync: true,
                url: 'src/tipo/modelo/all-tipo.php',
                success: function(dados) {
                    for (const dado of dados) {
                        $('#TIPO_ID').append(`<option value="${dado.ID}">${dado.NOME}</option>`)
                    }
                }
            })
        })

        $('.btn-save').show()

        $('.btn-save').attr('data-operation', 'insert')

        $('#modal-usuario').modal('show')
    })
})