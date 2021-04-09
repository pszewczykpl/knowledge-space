@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	</div>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
			<x-cards.trash-menu />
        </div>
        <div class="col-12 col-md-8">
            <div class="card card-custom gutter-b">
				<div class="card-body">
					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<th>Nazwa</th>
								<th>Ścieżka</th>
								<th>Kategoria dokumentu</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($files as $file)
							<tr>
								<td>{{ $file->name }}</td>
								<td>{{ $file->path }}</td>
								<td>{{ $file->file_category->name }}</td>
								<td>
									@can('restore', $file)
									<a onclick='document.getElementById("file_restore_{{ $file->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'files.restore', $file->id ], 'id' => 'file_restore_' . $file->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $file)
									<a onclick='document.getElementById("file_force_destroy_{{ $file->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'files.forceDestroy', $file->id ], 'id' => 'file_force_destroy_' . $file->id ]) }}{{ Form::close() }}
									@endcan
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
@stop

@section('additional_scripts')
{{-- <script src="{{ asset('js/pages/trash/files.js') }}" type="text/javascript"></script> --}}
<script>
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
</script>
@stop