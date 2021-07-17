@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('funds.index') }}" />
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
								<th>Data startu</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($funds as $fund)
							<tr>
								<td>{{ $fund->code }}</td>
								<td>{{ $fund->name }}</td>
								<td>{{ $fund->start_date }}</td>
								<td>
									@can('restore', $fund)
									<a onclick='document.getElementById("fund_restore_{{ $fund->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'funds.restore', $fund->id ], 'id' => 'fund_restore_' . $fund->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $fund)
									<a onclick='document.getElementById("fund_force_destroy_{{ $fund->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'funds.forceDestroy', $fund->id ], 'id' => 'fund_force_destroy_' . $fund->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js/pages/trash/funds.js') }}" type="text/javascript"></script>
@endpush