$(document).ready(function() {
    $('.btn-save').click(function(e) {
        e.preventDefault()

        url = "src/tcc-adm/modelo/save-tcc.php"

        var formData = new FormData(document.getElementById("form-tcc"))

        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            mimeType: "multipart/form-data",
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(dados) {
                Swal.fire({
                    title: 'System TCC',
                    text: dados.mensagem,
                    icon: dados.tipo,
                    confirmButtonText: 'OK'
                })

                $('#modal-tcc-adm').modal('hide')
                    // $('#table-trabalho').DataTable().ajax.reload()
            }
        })
    })
})