$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        lengthMenu: [5, 15, 25, 50, 100],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/notes',
            type: 'POST',
            datatype: 'json'
        },
        columns: [
            {
                data: 'content',
                visible: true,
                orderable: true,
                searchable: true,
                "width": "60%"
            }, {
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: '',
                render: function (data, type, full, row) {
                    return '<a href="' + HOST_URL + '/notes/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
                }
            }, {
                data: 'id',
                visible: false,
                orderable: false,
                searchable: false
            }
        ],
        language: {
            "decimal":        "",
            "emptyTable":     "Brak danych do wyświetlenia",
            "info":           "Wyświetlono _START_ - _END_ z _TOTAL_ rekordów",
            "infoEmpty":      "Wyświetlono 0 z 0 rekordów",
            "infoFiltered":   "(wyszukano z _MAX_ rekordów)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Pokaż _MENU_ rekordów",
            "loadingRecords": "Ładowanie...",
            "processing":     "Procesowanie...",
            "search":         "Szukaj:",
            "zeroRecords":    "Brak pasujących rekordów",
            "paginate": {
                "first":      "<<",
                "last":       ">>",
                "next":       ">",
                "previous":   "<"
            }
        },
        "order": [0, "asc"]
    });

    function filterGlobal () {
        $('#table').DataTable().search(
            $('#global_filter').val()
        ).draw();
    }
    
    function filterColumn (i) {
        $('#table').DataTable().column(i).search(
            $('#col'+i+'_filter').val()
        ).draw();
    }

    $('input.global_filter').on('keyup change click', function() {
        filterGlobal();
    });

    $('input.column_filter').on('keyup change click', function() {
        filterColumn($(this).parents('div').attr('data-column'));
    });
});