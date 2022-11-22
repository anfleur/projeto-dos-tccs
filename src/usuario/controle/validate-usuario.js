$(document).ready(function() {

        $.ajax({
            type: 'POST',
            dataType: 'json',
            assync: true,
            //data: dados,
            url: 'src/usuario/modelo/validate-usuario.php',
            success: function(dados) {

                if(dados.tipo == 'error'){

                    $(location).attr('href', 'index.php')
                } 

                else {
                Swal.fire({
                    title: 'System TCC',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })  

            }
        }
    })

})

