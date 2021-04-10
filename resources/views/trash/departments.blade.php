@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
		<li class="breadcrumb-item">
			<span class="text-muted">Przeglądaj wszystkie artykuły</span>
		</li>
	</ul>
@stop

@section('toolbar')
	<a href="{{ route('departments.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
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
								<th>Kod</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($departments as $department)
							<tr>
								<td>{{ $department->name }}</td>
								<td>{{ $department->code }}</td>
								<td>
									@can('restore', $department)
									<a onclick='document.getElementById("department_restore_{{ $department->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'departments.restore', $department->id ], 'id' => 'department_restore_' . $department->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $department)
									<a onclick='document.getElementById("department_force_destroy_{{ $department->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'departments.forceDestroy', $department->id ], 'id' => 'department_force_destroy_' . $department->id ]) }}{{ Form::close() }}
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

@push('scripts')
{{-- <script src="{{ asset('js/pages/trash/departments.js') }}" type="text/javascript"></script> --}}
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
@endpush