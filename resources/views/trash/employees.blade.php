@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('employees.index') }}" />
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
								<th>Nazwa produktu</th>
								<th>Kod OWU</th>
								<th>Dokumenty ważne od</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($employees as $employee)
							<tr>
								<td>{{ $employee->name }}</td>
								<td>{{ $employee->code_owu }}</td>
								<td>{{ $employee->edit_date }}</td>
								<td>
									@can('restore', $employee)
									<a onclick='document.getElementById("employee_restore_{{ $employee->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'employees.restore', $employee->id ], 'id' => 'employee_restore_' . $employee->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $employee)
									<a onclick='document.getElementById("employee_force_destroy_{{ $employee->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'employees.forceDestroy', $employee->id ], 'id' => 'employee_force_destroy_' . $employee->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js/pages/trash/employees.js') }}" type="text/javascript"></script>
@endpush