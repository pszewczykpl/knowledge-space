	$(document).ready(function() {
		$("#table").DataTable( {
			responsive: true,
			processing: true,
			dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
			lengthMenu: [5, 15, 25, 50],
			pageLength: 15,
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
	});