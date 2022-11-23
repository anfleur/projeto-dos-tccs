//Lê uma função
$(document).ready(function() {


    // Especifica que a função terá ligação direta com o botão de delete
    $('#table-curso').on('click', 'button.btn-delete', function(e) {

        e.preventDefault()

        // Especificação de váriavel
        let ID = `ID=${$(this).attr('id')}`

        // Abre um sweetAlert de questionamento
        Swal.fire({
            title: 'System TCC',
            text: "Deseja realmente excluir esse registro?",
            icon: 'question',
            showCancelButton: true,
        // Sim = botão é excluído     
            confirmButtonText: 'Sim',
        // Não = Sweet fecha e nada acontece
            cancelButtonText: 'Não'
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    assync: true,
                    data: ID,
                    // Conexão ao php
                    url: 'src/curso/modelo/delete-curso.php',
                    success: function(dados) {
                        Swal.fire({ // Inicialização do SweetAlert
                            title: 'System TCC', // Título da janela SweetAlert
                            text: dado.mensagem, // Mensagem retornada do microserviço
                            type: dado.tipo, // Retorna sendo success, info ou error
                            confirmButtonText: 'OK'
                        })

                        // A tabela referente ao curso reinicia e atualiza
                        $('#table-curso').DataTable().ajax.reload()
                    }
                })


            }
        })
    })
})