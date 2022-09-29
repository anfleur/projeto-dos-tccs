$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()
        $('.modal-body').empty()

        $('.modal-title').append('Adicionar novo curso')

        $('.modal-body').load('src/curso/visao/form-curso.html', function() {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                assync: true,
                url: 'src/eixo/modelo/all-eixo.php',
                success: function(dados) {
                    for (const dado of dados) {
                        $('#EIXO_ID').append(`<option value="${dado.ID}">${dado.TITULO}</option>`)
                    }
                }
            })
        })

        $('.btn-save').show()

        $('.btn-save').attr('data-operation', 'insert')

        $('#modal-curso').modal('show')
    })
})