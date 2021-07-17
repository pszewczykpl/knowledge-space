$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        lengthMenu: [5, 15, 25, 50, 100],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/investments',
            type: 'POST',
            datatype: 'json'
        },
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        columns: [
            {
                data: 'name',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'code_toil',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'code',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'group',
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
                defaultContent: '',
                render: function (data, type, full, row) {
                    return '<a href="' + HOST_URL + '/investments/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
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
                data: 'dist_short',
                visible: false,
                orderable: false,
                searchable: true
            }, {
                data: 'code_owu',
                visible: false,
                orderable: false,
                searchable: true
            }, {
                data: 'type',
                visible: false,
                orderable: false,
                searchable: true
            }
        ],
        searchCols: [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            {
                'search': 'A'
            },
            null,
            null
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
});

$("#active_or_all").click(function() {
    if ($(this).hasClass('btn-success')) {
        $('#col7_filter').val('A');
        $('#col7_filter').click();

        $(this).removeClass('btn-success');
        $(this).addClass('btn-primary');
        $(this).html('Pokaż Archiwalne')
        toastr.success("Widzisz tylko aktualnie obowiązujące komplety dokumentów");
    }
    else if ($(this).hasClass('btn-primary')) {
        $('#col7_filter').val('');
        $('#col7_filter').click();

        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        $(this).html('Pokaż tylko Aktualne')          
        toastr.success("Widzisz wszystkie komplety dokumentów");
    }
});

$("#search_box_panel_button").click(function() {
    var search_box_panel = document.getElementById("search_box_panel");

    if ($(this).hasClass('active')) {
        search_box_panel.style.display = 'none';

        $(this).removeClass('active');
        $(this).blur();
    }
    else {
        search_box_panel.style.display = 'flex';

        $(this).addClass('active');
        $(this).blur();
    }
});