$(document).ready(function() {
    $('#table-tcc').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "src/tcc/modelo/list-tcc.php",
            "type": "POST"
        },
        "language": {
            "url": "libs/DataTables/pt_br.json"
        },
        "columns": [{
                "data": 'ID',
                "className": 'text-center'
            },
            {
                "data": 'TITULO',
                "className": 'text-center'
            },
            {
                "data": 'ID',
                "orderable": false,
                "searchable": false,
                "className": 'text-center',
                "render": function(data, type, row, meta) {
                    return `
                    <button id="${data}" class="btn btn-info btn-sm btn-view"><i class="fas fa-eye"></i></button>
                    <button id="${data}" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash-alt"></i></button>
                    `
                }
            }
        ]
    })
})