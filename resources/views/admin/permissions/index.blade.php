@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">

		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

		<div class="input-icon" id="filter_global">
			<input type="text" class="form-control form-control-solid form-control-sm global_filter" placeholder="Szukaj..." id="global_filter">
			<span>
				<i class="flaticon2-search-1 text-muted"></i>
			</span>
		</div>

	</div>
	<div class="d-flex align-items-center">

		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-arrow-left"></i>Powrót
		</a>

	</div>
</div>
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-column flex-md-row">
		
		<div class="flex-md-row-fluid">
			<div class="card card-custom">
				<div class="card-header flex-wrap border-0 pt-6 pb-0">
					
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label font-weight-bolder text-dark">{{ $title }}</span>
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj wszystkie uprawnienia</span>
					</h3>
					
				</div>
				<div class="card-body pt-1">

					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<td>Nazwa</td>
								<td>Kod</td>
								<td>Opis</td>
							</tr>
						</thead>
						<tbody>
							@foreach($permissions as $permission)
							<tr>
								<td>{{ $permission->name }}</td>
								<td>{{ $permission->code }}</td>
								<td>{{ $permission->description }}</td>
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
<script src="{{ asset('js/pages/admin/permissions/index.js') }}" type="text/javascript"></script>
@stop
