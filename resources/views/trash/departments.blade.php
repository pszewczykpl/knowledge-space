@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('departments.index') }}" />
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
 <script src="{{ asset('js/pages/trash/departments.js') }}" type="text/javascript"></script>
@endpush