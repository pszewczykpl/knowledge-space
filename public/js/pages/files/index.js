$(document).ready(function() {
    $('#table').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [5, 15, 25, 50],
        pageLength: 15,
        ajax: {
            url: HOST_URL + '/api/datatables/files',
            type: 'POST',
            datatype: 'json'
        },
        columns: [
            {
                data: 'name',
                visible: true,
                orderable: true,
                searchable: true,
                "width": "25%"
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
                    return_string = '';
                    if(PERMISSIONS.includes('files-update')) {
                        return_string += '<a href="' + HOST_URL + '/files/' + full.id + '/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edytuj"><i class="flaticon2-edit"></i></a>';
                    }
                    return_string += '<a href="' + HOST_URL + '/files/' + full.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>';
                    return return_string;
                }
            },{
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

function ShareFiles(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/files/' + id;
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