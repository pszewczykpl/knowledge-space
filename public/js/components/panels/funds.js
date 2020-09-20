$(document).ready(function() {
    $('#table_funds').DataTable( {
        responsive: true,
        processing: true,
        serverSide: true,
        dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
        lengthMenu: [8, 16, 32, 64],
        pageLength: 8,
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
                data: 'actions',
                visible: true,
                orderable: false,
                searchable: false,
                defaultContent: '',
                render: function (data, type, full, row) {
                    return '' +
                        '<div class="dropdown dropdown-inline">' +
                            '<a class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">' +
                                '<i class="flaticon-more-1"></i>' +
                            '</a>' +
                            '<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">' +
                                '<ul class="navi navi-hover flex-column">' +
                                    '<li class="navi-item">' +
                                        '<a class="navi-link" onclick="ShareFunds(' + full.id + ')"><i class="navi-icon flaticon2-reply-1"></i><span class="navi-text" title="Udostępnij jako link">Udostępnij</span></a>' +
                                    '</li>' +
                                '</ul>' +
                            '</div>' +
                        '</div>' +
                        '<a href="' + HOST_URL + '/funds/' + full.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>';
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