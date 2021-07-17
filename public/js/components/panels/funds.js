$(document).ready(function() {
    $('#table_funds').DataTable( {
        processing: true,
        serverSide: true,
        pageLength: 10,
        ajax: {
            url: HOST_URL + '/api/datatables/investment/' + INVESTMENT_ID + '/funds',
            type: 'POST',
            datatype: 'json'
        },
        columns: [
            {
                data: 'code',
                visible: true,
                orderable: true,
                searchable: true
            },{
                data: 'name',
                visible: true,
                orderable: true,
                searchable: true
            },{
                data: 'start_date',
                visible: true,
                orderable: true,
                searchable: false
            },
            {
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: '',
                render: function (data, type, full, row) {
                    return '<a href="' + HOST_URL + '/funds/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
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
        "order": [1, "asc"]
    });

    function filterColumn (i) {
        $('#table_funds').DataTable().column(i).search(
            $('#col'+i+'_filter').val()
        ).draw();
    }

    $('input.column_filter').on('keyup change click', function() {
        filterColumn($(this).parents('div').attr('data-column'));
    });

    /*
     * Adjust DataTable.net when funds table is show.
     */
    $("#funds_tab").on( "click", function() {
        $('#funds').addClass( [ "active", "show" ] );
        $('#table_funds').DataTable().columns.adjust().draw();
    });

});
