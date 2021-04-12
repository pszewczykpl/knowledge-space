@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" --active custom-active-text="Pokaż Nieaktywne" --advanced />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	@can('create', App\Models\Fund::class)
		<a href="{{ route('funds.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.fund', ['class' => 'navi-icon']) Dodaj Fundusz
		</a>
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<a href="{{ route('trash.index', ['model' => 'funds']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
	@endcan
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-column flex-md-row">
		<div class="flex-md-row-fluid">
			<div class="card card-custom">
				<div class="card-body">
					<div class="mb-1">
						<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
							<div class="alert-icon">
								<i class="flaticon-info"></i>
							</div>
							<div class="alert-text">
								<b>Wskazówka!</b><br>
								Poniżej znajdują się ubezpieczeniowe fundusze kapitałowe, które mogą być już nieaktywne.<br>
								Jeśli chcesz przeglądać tylko aktywne fundusze, kliknij Pokaż tylko Aktywne.<br>
							</div>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="ki ki-close"></i>
									</span>
								</button>
							</div>
						</div>
						<div class="row align-items-center">
							<x-datatables.search-box --size="3" --number="0" --placeholder="Symbol" />
							<x-datatables.search-box --size="3" --number="1" --placeholder="Nazwa" />
							<x-datatables.search-box --size="3" --number="6" --placeholder="Waluta" />
							<x-datatables.search-box --size="3" --number="4" --placeholder="Status" --hidden />
						</div>
					</div>
					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<td>Symbol</td>
								<td>Nazwa</td>
								<td>Typ</td>
								<td>Data startu</td>
								<td>Status</td>
								<td>Akcje</td>
							</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="card card-custom gutter-b mt-8" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Brakuje funduszu?</h3>
						<div class="text-dark-50 font-size-lg mt-2">Jeśli nie widzisz na liście interesującego Cię funduszu - skontaktuj się!</div>
					</div>
					<a href="mailto:piotr.szewczyk@openlife.pl" target="_blank" class="btn btn-primary font-weight-bold py-3 px-6">Kontakt</a>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/funds/index.js') }}" type="text/javascript"></script>
@endpush
