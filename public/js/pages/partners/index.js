$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [5, 15, 25, 50],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/partners',
            type: 'POST',
            datatype: 'json'
        },
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
                render: function(data) {
                    if(data) {
                        return '<span class="label font-weight-bold label-lg label-light-primary label-inline">' + data + '</span>';
                    } else {
                        return '';
                    }
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
                    return_string = '' +
                        '<div class="dropdown dropdown-inline">' +
                            '<a class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">' +
                                '<i class="flaticon-more-1"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                                '<ul class="navi navi-hover flex-column">' +
                                    '<li class="navi-item">' +
                                        '<a class="navi-link" onclick="SharePartners(' + full.id + ')"><i class="navi-icon flaticon2-reply-1"></i><span class="navi-text" title="Udostępnij jako link">Udostępnij</span></a>' +
                                    '</li>';
                        if(PERMISSIONS.includes('partners-update')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/partners/' + full.id + '/edit" class="navi-link"><i class="navi-icon flaticon2-edit"></i><span class="navi-text">Edytuj</span></a>' +
                                    '</li>';
                        }
                        if(PERMISSIONS.includes('partners-create')) {
                            return_string += '' + 
                                    '<li class="navi-item">' +
                                        '<a href="' + HOST_URL + '/partners/' + full.id + '/duplicate" class="navi-link"><i class="navi-icon flaticon2-copy"></i><span class="navi-text">Duplikuj</span></a>' +
                                    '</li>';
                        }
                        return_string += '' +
                                '</ul>' +
                            '</div>' +
                        '</div>' + 
                        '<a href="' + HOST_URL + '/partners/' + full.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>';
                        return return_string;
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

function SharePartners(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/partners/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano link do schowka!',
      },{
          // settings
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  }