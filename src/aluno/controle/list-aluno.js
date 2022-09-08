$(document).ready(function() {
    $('#table-aluno').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "src/aluno/modelo/list-aluno.php",
            "type": "POST"
        },
        "language": {
            "url": "libs/DataTables/pt_br.json"
        },
        "columns": [{
                "data": 'RM',
                "className": 'text-center'
            },
            {
                "data": 'NOME',
                "className": 'text-center'
            },
            {
                "data": 'EMAIL',
                "className": 'text-center'
            },
            {
                "data": 'SENHA',
                "className": 'text-center'
            },
            {
                "data": 'RM',
                "orderable": false,
                "searchable": false,
                "className": 'text-center',
                "render": function(data, type, row, meta) {
                    return `
                    <button id="${data}" class="btn btn-info btn-sm btn-view"><i class="fa-solid fa-eye"></i></button>
                    <button id="${data}" class="btn btn-primary btn-sm btn-edit"><i class="fa-solid fa-marker"></i></button>
                    <button id="${data}" class="btn btn-danger btn-sm btn-delete"><i class="fa-solid fa-trash"></i></button>
                    `
                }
            }
        ]
    })
})