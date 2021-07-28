$(document).ready(function() {
    var table = $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        lengthMenu: [5, 15, 25, 50, 100],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/protectives',
            type: 'POST',
            datatype: 'json'
        },
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        columns: [
            {
                data: 'name',
                visible: true,
                orderable: true,
                searchable: true,
                width: "32%"
            }, {
                data: 'dist_short',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'code',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'code_owu',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'edit_date',
                visible: true,
                orderable: true,
                searchable: false,
                render: function (data, type, full) {
                    return '<span class="me-2">' + data + '</span>' + `<span class="badge badge-light-${(full.status === 'Aktualny' ? "success" : "primary")} fw-bolder px-4 py-3">${full.status}</span>`;
                }
            }, {
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: "",
                render: function (data, type, full, row) {
                    return '<a href="' + HOST_URL + '/protectives/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
                }
            }, {
                data: 'id',
                visible: false,
                orderable: false,
                searchable: false
            }, {
                data: 'status',
                visible: false,
                orderable: false,
                searchable: true
            }, {
                data: 'dist',
                visible: false,
                orderable: false,
                searchable: true
            }, {
                data: 'subscription',
                visible: false,
                orderable: false,
                searchable: false
            }
        ],
        searchCols: [
            null,null, null, null,null, null,null,
            {
                'search': 'A'
            },
            null,null
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
        "order": [2, "desc"]
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

    $("#export_to_csv").on("click", function() {
        table.button( '.buttons-csv' ).trigger();
    });

    $("#export_to_excel").on("click", function() {
        table.button( '.buttons-excel' ).trigger();
    });

    $("#export_to_pdf").on("click", function() {
        table.button( '.buttons-pdf' ).trigger();
    });
});