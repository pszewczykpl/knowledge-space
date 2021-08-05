var options = {
    'lengthMenu': [5, 15, 30, 60, 100],
    'pageLength': 15,
    'buttons': [
        {
            extend: 'copyHtml5',
            exportOptions: {
                columns: [':not(:last-child):visible'],
                orthogonal: 'export'
            }
        },
        {
            extend: 'csvHtml5',
            fieldSeparator: ';',
            charset: 'utf-8',
            exportOptions: {
                columns: [':not(:last-child):visible'],
                orthogonal: 'export'
            }
        },
        {
            extend: 'excelHtml5',
            autoFilter: true,
            exportOptions: {
                columns: [':not(:last-child):visible'],
                orthogonal: 'export'
            }
        },
        {
            extend: 'pdfHtml5',
            orientation: 'landscape',
            exportOptions: {
                columns: [':not(:last-child):visible'],
                orthogonal: 'export'
            }
        }
    ],
    'language': {
        "decimal": "",
        "emptyTable": "Brak danych do wyświetlenia",
        "info": "Wyświetlono _START_ - _END_ z _TOTAL_ rekordów",
        "infoEmpty": "Wyświetlono 0 z 0 rekordów",
        "infoFiltered": "(wyszukano z _MAX_ rekordów)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Pokaż _MENU_ rekordów",
        "loadingRecords": "Ładowanie...",
        "processing": "Procesowanie...",
        "search": "Szukaj:",
        "zeroRecords": "Brak pasujących rekordów",
        "paginate": {
            "first": "<<",
            "last": ">>",
            "next": ">",
            "previous": "<"
        }
    }
};

/* Produkty Inwestycyjne */
$('#investments_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/investments', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
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
                return type === 'export' ? data : '<span class="me-2">' + data + '</span>' + `<span class="badge badge-light-${(full.status === 'Aktualny' ? "success" : "primary")} fw-bolder px-4 py-3">${full.status}</span>`;
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
    searchCols: [null, null, null, null, null, null, null, { 'search': 'A' }, null, null],
    language: options['language'],
    order: [2, "desc"]
});

$("#active_or_all_investments").click(function() {
    if (!$(this)[0].checked) {
        $('#col7_filter').val('A');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Pokaż dane archiwalne');
        toastr.success("Widzisz tylko aktualnie obowiązujące komplety dokumentów");
    }
    else if ($(this)[0].checked) {
        $('#col7_filter').val('');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Ukryj dane archiwalne');
        toastr.success("Widzisz wszystkie komplety dokumentów");
    }
});

/* Produkty Ochronne */
$('#protectives_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/protectives', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
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
                return type === 'export' ? data : '<span class="me-2">' + data + '</span>' + `<span class="badge badge-light-${(full.status === 'Aktualny' ? "success" : "primary")} fw-bolder px-4 py-3">${full.status}</span>`;
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
    searchCols: [null, null, null, null, null, null, null, {'search': 'A'}, null, null],
    language: options['language'],
    order: [2, "desc"]
});

$("#active_or_all_protectives").click(function() {
    if (!$(this)[0].checked) {
        $('#col7_filter').val('A');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Pokaż dane archiwalne');
        toastr.success("Widzisz tylko aktualnie obowiązujące komplety dokumentów");
    }
    else if ($(this)[0].checked) {
        $('#col7_filter').val('');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Ukryj dane archiwalne');
        toastr.success("Widzisz wszystkie komplety dokumentów");
    }
});

/* Produkty Pracownicze */
$('#employees_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/employees', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true,
            width: '35%'
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
                return type === 'export' ? data : '<span class="me-2">' + data + '</span>' + `<span class="badge badge-light-${(full.status === 'Aktualny' ? "success" : "primary")} fw-bolder px-4 py-3">${full.status}</span>`;
            }
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/employees/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
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
        }
    ],
    searchCols: [null, null, null, null, null, {'search': 'A'}],
    language: options['language'],
    order: [1, "desc"]
});

$("#active_or_all_employees").click(function() {
    if (!$(this)[0].checked) {
        $('#col5_filter').val('A');
        $('#col5_filter').click();

        $("#active_or_all_title").html('Pokaż dane archiwalne');
        toastr.success("Widzisz tylko aktualnie obowiązujące komplety dokumentów");
    }
    else if ($(this)[0].checked) {
        $('#col5_filter').val('');
        $('#col5_filter').click();

        $("#active_or_all_title").html('Ukryj dane archiwalne');
        toastr.success("Widzisz wszystkie komplety dokumentów");
    }
});

/* Produkty Bancassurances */
$('#bancassurances_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/bancassurances', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
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
                return type === 'export' ? data : '<span class="me-2">' + data + '</span>' + `<span class="badge badge-light-${(full.status === 'Aktualny' ? "success" : "primary")} fw-bolder px-4 py-3">${full.status}</span>`;
            }
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: "",
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/bancassurances/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
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
    searchCols: [null, null, null, null, null, null, null, {'search': 'A'}, null, null],
    language: options['language'],
    order: [2, "desc"]
});

$("#active_or_all_bancassurances").click(function() {
    if (!$(this)[0].checked) {
        $('#col7_filter').val('A');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Pokaż dane archiwalne');
        toastr.success("Widzisz tylko aktualnie obowiązujące komplety dokumentów");
    }
    else if ($(this)[0].checked) {
        $('#col7_filter').val('');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Ukryj dane archiwalne');
        toastr.success("Widzisz wszystkie komplety dokumentów");
    }
});

/* Departamenty */
$('#departments_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/departments', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'code',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/departments/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        },{
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        },{
            data: 'description',
            visible: false,
            orderable: false,
            searchable: true
        }
    ],
    language: options['language'],
    order: [1, "asc"]
});

/* Kategorie dokumentów */
$('#file_categories_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/file-categories', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/file-categories/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [0, "asc"]
});

/* Dokumenty */
$('#files_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/files', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true,
            "width": "35%",
            defaultContent: '',
            render: function (data, type, full, row) {
                return type === 'export' ? data : '<a href="' + HOST_URL + '/files/' + full.id + '" class="text-dark fw-normal" target="_blank"><img src="' + HOST_URL + '/media/files/' + full.extension + '.svg' + '" style="width: 32px;" class="me-2"> '+ full.name + ' </a>';
            }
        }, {
            data: 'path',
            visible: true,
            orderable: true,
            searchable: true,
            "width": "35%"
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/files/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        },{
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        },{
            data: 'extension',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [0, "asc"]
});

/* Fundusze */
$('#funds_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/funds', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
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
            searchable: true,
            width: '40%'
        },{
            data: 'type',
            visible: true,
            orderable: true,
            searchable: false,
            render: function (data, type, row) {
                return type === 'export' ? data : `<span class="badge badge-light-primary fw-bolder px-4 py-3">${data}</span>`;
            }
        },{
            data: 'start_date',
            visible: true,
            orderable: true,
            searchable: false,
            render: function (data, type, full) {
                return type === 'export' ? data : `<span class="me-2">${(data === null ? "Brak danych" : data)}</span><span class="badge badge-light-${(full.status === 'Aktualny' ? "success" : "primary")} fw-bolder px-4 py-3">${full.status}</span>`;
            }
        },{
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/funds/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'currency',
            visible: false,
            orderable: false,
            searchable: true
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        },{
            data: 'status',
            visible: false,
            orderable: false,
            searchable: true
        }
    ],
    searchCols: [null, null, null, null, null, null, null, { 'search': 'A' }],
    language: options['language'],
    order: [3, "desc"]
});

$("#active_or_all_funds").click(function() {
    if (!$(this)[0].checked) {
        $('#col7_filter').val('A');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Pokaż fundusze nieaktywne');
        toastr.success("Widzisz tylko aktualne fundusze");
    }
    else if ($(this)[0].checked) {
        $('#col7_filter').val('');
        $('#col7_filter').click();

        $("#active_or_all_title").html('Ukryj fundusze nieaktywne');
        toastr.success("Widzisz wszystkie fundusze");
    }
});

/* Notatki */
$('#notes_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/notes', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
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
    language: options['language'],
    order: [0, "asc"]
});

/* partners */
$('#partners_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/partners', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true,
            "width": "30%"
        },{
            data: 'code',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'type',
            visible: true,
            orderable: true,
            searchable: true,
            render: function(data, type) {
                return type === 'export' ? data :  `<span class="badge badge-light-primary fw-bolder px-4 py-3">${data}</span>`;
            }
        },{
            data: 'number_rau',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'nip',
            visible: false,
            orderable: true,
            searchable: true
        },{
            data: 'regon',
            visible: false,
            orderable: true,
            searchable: true
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/partners/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [1, "asc"]
});

/* permissions */
$('#permissions_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/permissions', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'code',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'description',
            visible: true,
            orderable: false,
            searchable: true,
            "width": "50%"
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [1, "asc"]
});

/* post-categories */
$('#post_categories_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/post-categories', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/post-categories/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [0, "asc"]
});

/* risks */
$('#risks_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/risks', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
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
            searchable: true,
            "width": "45%"
        },{
            data: 'category',
            visible: true,
            orderable: true,
            searchable: true,
            render: function(data, type) {
                return type === 'export' ? data : `<span class="badge badge-light-primary fw-bolder px-4 py-3">${data}</span>`;
            }
        },{
            data: 'group',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'grace_period',
            visible: true,
            orderable: false,
            searchable: false
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/risks/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [0, "asc"]
});

/* systems */
$('#systems_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/systems', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'name',
            visible: true,
            orderable: true,
            searchable: true
        }, {
            data: 'url',
            visible: true,
            orderable: true,
            searchable: true,
            width: '40%',
            render: function (data, type, full, row) {
                return type === 'export' ? data :  `<a href="${data}" target="_blank">${data}</a>`;
            }
        }, {
            data: 'description',
            visible: true,
            orderable: true,
            searchable: true,
            width: '40%'
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/systems/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }
    ],
    language: options['language'],
    order: [0, "asc"]
});

/* users */
$('#users_datatable').DataTable( {
    responsive: true,
    processing: true,
    serverSide: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    ajax: { url: HOST_URL + '/api/datatables/users', type: 'POST', datatype: 'json' },
    deferLoading: 1418,
    buttons: options['buttons'],
    columns: [
        {
            data: 'fullname',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full) {
                return full.first_name + ' ' + full.last_name;
            }
        },{
            data: 'email',
            visible: true,
            orderable: true,
            searchable: true
        },{
            data: 'phone',
            visible: true,
            orderable: true,
            searchable: true
        }, {
            data: 'actions',
            visible: true,
            orderable: false,
            searchable: false,
            defaultContent: '',
            render: function (data, type, full, row) {
                return '<a href="' + HOST_URL + '/users/' + full.id + '" class="btn btn-light btn-sm" title="Wyświetl">Wyświetl</a>';
            }
        }, {
            data: 'id',
            visible: false,
            orderable: false,
            searchable: false
        }, {
            data: 'first_name',
            visible: false,
            orderable: false,
            searchable: true
        }, {
            data: 'last_name',
            visible: false,
            orderable: false,
            searchable: true
        }, {
            data: 'username',
            visible: false,
            orderable: false,
            searchable: true
        }, {
            data: 'position',
            visible: false,
            orderable: false,
            searchable: true
        }
    ],
    language: options['language'],
    order: [1, "asc"]
});

$("#bancassurances_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#departments_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#employees_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#file_categories_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [1, "desc"]
});

$("#files_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#funds_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#investments_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#notes_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#partners_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#post_categories_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#protectives_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#risks_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#systems_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

$("#users_trash_datatable").DataTable( {
    responsive: true,
    processing: true,
    lengthMenu: options['lengthMenu'],
    pageLength: options['pageLength'],
    language: options['language'],
    "order": [2, "desc"]
});

function filterGlobal () {
    $('.datatable').DataTable().search(
        $('#global_filter').val()
    ).draw();
}

function filterColumn (i) {
    $('.datatable').DataTable().column(i).search(
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
    $('.datatable').DataTable().button( '.buttons-csv' ).trigger();
});

$("#export_to_excel").on("click", function() {
    $('.datatable').DataTable().button( '.buttons-excel' ).trigger();
});

$("#export_to_pdf").on("click", function() {
    $('.datatable').DataTable().button( '.buttons-pdf' ).trigger();
});

if (typeof INVESTMENT_ID !== 'undefined') {
    $('#table_funds').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        lengthMenu: options['lengthMenu'],
        pageLength: options['pageLength'],
        ajax: {
            url: HOST_URL + '/api/datatables/investment/' + INVESTMENT_ID + '/funds',
            type: 'POST',
            datatype: 'json'
        },
        buttons: options['buttons'],
        columns: [
            {
                data: 'code',
                visible: true,
                orderable: true,
                searchable: true
            }, {
                data: 'name',
                visible: true,
                orderable: true,
                searchable: true
            }, {
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
        language: options['language'],
        "order": [1, "asc"]
    });

    $("#funds_tab").on("click", function () {
        $('#funds').addClass(["active", "show"]);
        $('#table_funds').DataTable().columns.adjust().draw();
    });
}

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$("#search_box_panel_button").click(function() {
    var search_box_panel = document.getElementById("search_box_panel");

    if ($(this).hasClass('active')) {
        search_box_panel.style.display = 'none';

        $(this).removeClass('active');
        $(this).blur();
        $(this).html('Pokaż Wyszukiwanie Zaawansowane');
    }
    else {
        search_box_panel.style.display = 'flex';

        $(this).addClass('active');
        $(this).blur();
        $(this).html('Ukryj Wyszukiwanie Zaawansowane');
    }
});

$("#show-draft-files").click(function() {
    var sdf = document.getElementById("show-draft-files");
    var drafts = document.getElementsByName("draft");

    if(sdf.getAttribute("name") === "non-active")
    {
        sdf.setAttribute("name","active");
        sdf.classList.add("active");

        drafts.forEach( draft => {
            draft.style.cssText = 'display:flex !important';
        });
    }
    else if(sdf.getAttribute("name") === "active")
    {
        sdf.setAttribute("name","non-active");
        sdf.classList.remove("active");

        drafts.forEach( draft => {
            draft.style.cssText = 'display:none !important';
        });
    }
});

$(".datepicker").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: "YYYY-MM-DD"
    }
});

if (document.getElementById('kt_forms_widget_1_editor') !== 'undefined') {
    var quill = new Quill(document.querySelector('#kt_forms_widget_1_editor'), {
        compatibilityMode: false,
        modules: {
            toolbar: {
                container: "#kt_forms_widget_1_editor_toolbar"
            }
        },
        placeholder: "Wpisz treść aktualności!",
        theme: "snow"
    });

    $("#kt_forms_widget_1_form").on("submit",function(){
        $("#content").val(quill.root.innerHTML);
    });
}

// function dateDiffMonth(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),i}function dateDiffYear(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),a}function policyCalcFunc(){dt1=document.getElementById("MyDate").value,dt2=document.getElementById("MyDateEnd").value,document.getElementById("miesiac").innerHTML=12*dateDiffYear(dt1,dt2)+dateDiffMonth(dt1,dt2)+1,document.getElementById("rok").innerHTML=dateDiffYear(dt1,dt2)+1}$.fn.datepicker.dates.en={days:["Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota"],daysShort:["Nd","Pon","Wt","Śr","Czw","Pt","Sb"],daysMin:["Nd","Pn","Wt","Śr","Cz","Pt","Sb"],months:["Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień"],monthsShort:["Sty.","Lut.","Marz.","Kwie.","Maj","Czerw.","Lip.","Sier.","Wrze.","Paź.","Lis.","Gru."],today:"Dziś",clear:"Wyczyść",format:"yyyy-mm-dd",titleFormat:"MM yyyy",weekStart:1},$("#MyDate").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}}),$("#MyDateEnd").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}});