$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [5, 15, 25, 50],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/funds',
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
                searchable: true,
                width: '40%'
            },{
                data: 'type',
                visible: true,
                orderable: true,
                searchable: false,
                render: function (data, type, row) {
                    if(data=='D') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">Depozytowy</span>';
                    }
                    else if(data=='Z') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">Inwestycyjny</span>';
                    }
                    else if(data=='M') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">Modelowy</span>';
                    }
                    else if(data=='U') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">UFK</span>';
                    }
                    else if(data=='S') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">SOK</span>';
                    }
                    else if(data=='T') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">Tracker</span>';
                    }
                    else {
                        return data;
                    }
                }
            },{
                data: 'start_date',
                visible: true,
                orderable: true,
                searchable: false
            },{
                data: 'status',
                visible: true,
                orderable: false,
                searchable: true,
                render: function (data, type, row) {
                    if(data=='N') {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">Nieaktywny</span>';
                    }
                    else if(data=='A') {
                        return '<span class="label font-weight-bold label-lg label-light-success label-inline">Aktywny</span>';
                    }
                    else {
                        return 'Brak danych'
                    }
                }
            }, {
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: '',
                render: function (data, type, full, row) {
                    return_string = '' +
                        '<div class="dropdown dropdown-inline">' +
                            '<a class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">' +
                                '<i class="flaticon-more-1"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                                '<ul class="navi navi-hover flex-column">' +
                                    '<li class="navi-item">' +
                                        '<a class="navi-link" onclick="ShareFunds(' + full.id + ')"><i class="navi-icon flaticon2-reply-1"></i><span class="navi-text" title="Udostępnij jako link">Udostępnij</span></a>' +
                                    '</li>';
                        if(PERMISSIONS.includes('funds-update')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/funds/' + full.id + '/edit" class="navi-link"><i class="navi-icon flaticon2-edit"></i><span class="navi-text">Edytuj</span></a>' +
                                    '</li>';
                        }
                        if(PERMISSIONS.includes('funds-create')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/funds/' + full.id + '/duplicate" class="navi-link"><i class="navi-icon flaticon2-copy"></i><span class="navi-text">Duplikuj</span></a>' +
                                    '</li>';
                        }
                        return_string += '' +
                                '</ul>' +
                            '</div>' +
                        '</div>' + 
                        '<a href="' + HOST_URL + '/funds/' + full.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>';
                        return return_string;
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
        "order": [3, "desc"]
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
        $('#col4_filter').val('A');
        $('#col4_filter').click();

        $(this).removeClass('btn-success');
        $(this).addClass('btn-primary');
        $(this).html('Pokaż Wszystkie')

        $.notify({
            message: 'Widzisz tylko aktywne fundusze',
        },{
            type: 'success',
            allow_dismiss: false,
            newest_on_top: true
        });
    }
    else if ($(this).hasClass('btn-primary')) {
        $('#col4_filter').val('');
        $('#col4_filter').click();

        $(this).removeClass('btn-primary');
        $(this).addClass('btn-success');
        $(this).html('Pokaż tylko Aktywne')

        $.notify({
            message: 'Widzisz wzystkie fundusze',
        },{
            type: 'primary',
            allow_dismiss: false,
            newest_on_top: true
        });
    }
});

function ShareFunds(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/funds/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano do schowka!',
      },{
          // settings
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  }