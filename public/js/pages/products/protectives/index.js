$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [5, 15, 25, 50],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/protectives',
            type: 'POST',
            datatype: 'json'
        },
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
                    return data + `<span class="label label-light-${(full.status === 'Aktualny' ? "success" : "primary")} label-inline ml-1">${full.status}</span>`;
                }
            }, {
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: "",
                render: function (data, type, full, row) {
                    return_string = '' +
                        '<div class="dropdown dropdown-inline">' +
                            '<a class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">' +
                                '<i class="flaticon-more-1"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                                '<ul class="navi navi-hover flex-column">' +
                                    '<li class="navi-item">' +
                                        '<a class="navi-link" onclick="ShareProtectives(' + full.id + ')"><i class="navi-icon flaticon2-reply-1"></i><span class="navi-text" title="Udostępnij jako link">Udostępnij</span></a>' +
                                    '</li>' +
                                    '<div class="dropdown-divider"></div>' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/api/protectives/' + full.id + '/files/zip" class="navi-link"><i class="navi-icon flaticon2-download-2"></i><span class="navi-text" title="Pobierz dokumenty jako plik .zip">Pobierz jako zip</span></a>' +
                                    '</li>';
                        if(PERMISSIONS.includes('protectives-update')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/protectives/' + full.id + '/edit" class="navi-link"><i class="navi-icon flaticon2-edit"></i><span class="navi-text">Edytuj</span></a>' +
                                    '</li>';
                        }
                        if(PERMISSIONS.includes('protectives-create')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/protectives/' + full.id + '/duplicate" class="navi-link"><i class="navi-icon flaticon2-copy"></i><span class="navi-text">Duplikuj</span></a>' +
                                    '</li>';
                        }
                        return_string += '' +
                                '</ul>' +
                            '</div>' +
                        '</div>' + 
                        '<a href="' + HOST_URL + '/protectives/' + full.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>';
                        return return_string;
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
});

$("#active_or_all").click(function() {
    if ($(this).hasClass('btn-success')) {
        $('#col7_filter').val('A');
        $('#col7_filter').click();

        $(this).removeClass('btn-success');
        $(this).addClass('btn-primary');
        $(this).html('Pokaż Archiwalne')

        $.notify({
            message: 'Widzisz tylko aktualnie obowiązujące komplety dokumentów',
        },{
            type: 'success',
            allow_dismiss: false,
            newest_on_top: true
        });
    }
    else if ($(this).hasClass('btn-primary')) {
        $('#col7_filter').val('');
        $('#col7_filter').click();

        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        $(this).html('Pokaż tylko Aktualne')

        $.notify({
            message: 'Widzisz wzystkie komplety dokumentów',
        },{
            type: 'primary',
            allow_dismiss: false,
            newest_on_top: true
        });
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

function ShareProtectives(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/protectives/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano link do schowka!',
      },{
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  }