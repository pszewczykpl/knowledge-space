@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('systems.index') }}" />
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
					<table class="table table-separate table-head-custom collapsed" id="systems_trash_datatable">
						<thead>
							<tr>
								<th>Nazwa</th>
								<th>URL</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($systems as $system)
							<tr>
								<td>{{ $system->name }}</td>
								<td>{{ $system->url }}</td>
								<td>
									@can('restore', $system)
									<a onclick='document.getElementById("system_restore_{{ $system->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'systems.restore', $system->id ], 'id' => 'system_restore_' . $system->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $system)
									<a onclick='document.getElementById("system_force_destroy_{{ $system->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'systems.forceDestroy', $system->id ], 'id' => 'system_force_destroy_' . $system->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/trash/systems.js') }}" type="text/javascript"></script>
@endpush