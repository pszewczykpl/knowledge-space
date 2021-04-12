@extends('layouts.app')

@section('subheader')
	<x-layout.subheader description="Przeglądaj usunięte obiekty" />
@stop

@section('toolbar')
	<a href="{{ route('protectives.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
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
								<th>Kod dystrybutora</th>
								<th>Kod produktu</th>
								<th>Dokumenty ważne od</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($protectives as $protective)
							<tr>
								<td>{{ $protective->name }}</td>
								<td>{{ $protective->dist_short }}</td>
								<td>{{ $protective->code }}</td>
								<td>{{ $protective->edit_date }}</td>
								<td>
									@can('restore', $protective)
									<a onclick='document.getElementById("protective_restore_{{ $protective->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'protectives.restore', $protective->id ], 'id' => 'protective_restore_' . $protective->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $protective)
									<a onclick='document.getElementById("protective_force_destroy_{{ $protective->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'protectives.forceDestroy', $protective->id ], 'id' => 'protective_force_destroy_' . $protective->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js/pages/trash/protectives.js') }}" type="text/javascript"></script>
@endpush