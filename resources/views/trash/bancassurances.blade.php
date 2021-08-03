@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('bancassurances.index') }}" />
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
					<table class="table table-separate table-head-custom collapsed" id="bancassurances_trash_datatable">
						<thead>
							<tr>
								<th>Nazwa produktu</th>
								<th>Kod dystrybutora</th>
								<th>Kod produktu</th>
								<th>Dokumenty ważne od</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($bancassurances as $bancassurance)
							<tr>
								<td>{{ $bancassurance->name }}</td>
								<td>{{ $bancassurance->dist_short }}</td>
								<td>{{ $bancassurance->code }}</td>
								<td>{{ $bancassurance->edit_date }}</td>
								<td>
									@can('restore', $bancassurance)
									<a onclick='document.getElementById("bancassurance_restore_{{ $bancassurance->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'bancassurances.restore', $bancassurance->id ], 'id' => 'bancassurance_restore_' . $bancassurance->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $bancassurance)
									<a onclick='document.getElementById("bancassurance_force_destroy_{{ $bancassurance->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'bancassurances.forceDestroy', $bancassurance->id ], 'id' => 'bancassurance_force_destroy_' . $bancassurance->id ]) }}{{ Form::close() }}
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
	<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/trash/bancassurances.js') }}" type="text/javascript"></script>
@endpush