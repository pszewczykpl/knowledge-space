@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('partners.index') }}" />
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
					<table class="table table-separate table-head-custom collapsed" id="partners_trash_datatable">
						<thead>
							<tr>
								<th>Nazwa</th>
								<th>Symbol</th>
								<th>Numer RAU</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($partners as $partner)
							<tr>
								<td>{{ $partner->name }}</td>
								<td>{{ $partner->code }}</td>
								<td>{{ $partner->number_rau }}</td>
								<td>
									@can('restore', $partner)
									<a onclick='document.getElementById("partner_restore_{{ $partner->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'partners.restore', $partner->id ], 'id' => 'partner_restore_' . $partner->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $partner)
									<a onclick='document.getElementById("partner_force_destroy_{{ $partner->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'partners.forceDestroy', $partner->id ], 'id' => 'partner_force_destroy_' . $partner->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/trash/partners.js') }}" type="text/javascript"></script>
@endpush