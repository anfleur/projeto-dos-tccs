$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        // Preparação da modal para receber as novas variáveis
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
                        // Chama a chave estrangeira para o SELECT
                        $('#EIXO_ID').append(`<option value="${dado.ID}">${dado.TITULO}</option>`)
                    }
                }
            })
        })

        $('.btn-save').show()

        // O botão save receberá uma operação e irá inserir as novas informações no banco
        $('.btn-save').attr('data-operation', 'insert')

        // Mostra o modal
        $('#modal-curso').modal('show')
    })
})
