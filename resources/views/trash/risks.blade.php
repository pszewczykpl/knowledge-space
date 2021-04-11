@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
		<li class="breadcrumb-item">
			<span class="text-muted">Przeglądaj wszystkie artykuły</span>
		</li>
	</ul>
@stop

@section('toolbar')
	<a href="{{ route('risks.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
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
								<th>Symbol</th>
								<th>Nazwa</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($risks as $risk)
							<tr>
								<td>{{ $risk->code }}</td>
								<td>{{ $risk->name }}</td>
								<td>
									@can('restore', $risk)
									<a onclick='document.getElementById("risk_restore_{{ $risk->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'risks.restore', $risk->id ], 'id' => 'risk_restore_' . $risk->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $risk)
									<a onclick='document.getElementById("risk_force_destroy_{{ $risk->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'risks.forceDestroy', $risk->id ], 'id' => 'risk_force_destroy_' . $risk->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js/pages/trash/risks.js') }}" type="text/javascript"></script>
@endpush