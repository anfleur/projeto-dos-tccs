$(document).ready(function() {
    $('.btn-new').click(function(e) {
        e.preventDefault()

        $('.modal-title').empty()


        $('.modal-title').append('Adicionar novo Trabalho de Conclusão de Curso')

        $('.modal-body').load('src/tcc/visao/form-tcc.html', function() {
            // Criar um ajax para buscar todos os tipos de vendedores possiveis
            $.ajax({
                dataType: 'json',
                type: 'POST',
                assync: true,
                url: 'src/curso/modelo/all-curso.php',
                success: function(dados) {
                    for (const result of dados) {
                        $('#CURSO_ID').append(`<option value="${result.ID}">${result.NOME}</option>`)
                    }
                }
            })
        })

        $('.btn-save').show()

        $('.btn-save').attr('data-operation', 'insert')

        $('#modal-tcc').modal('show')
    })

})