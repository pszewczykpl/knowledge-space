@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-3">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-3 bg-gray-200"></div>

		<x-datatables.search-box-global />
		<button type="button" class="btn btn-clean btn-sm mr-3" id="search_box_panel_button">Zaawansowane</button>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-3 bg-gray-200"></div>
		<button type="button" class="btn btn-primary btn-sm" id="active_or_all">Pokaż Archiwalne</button>

	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\Bancassurance::class)
			<a href="{{ route('bancassurances.create') }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.bancassurance', ['class' => 'navi-icon']) Dodaj Ubezpieczenie</a>
		@endcan
		@can('create', App\Models\File::class)
			<a href="{{ route('files.create') }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.file', ['class' => 'navi-icon']) Dodaj Dokument</a>
		@endcan
		@can('viewAny', App\Models\Trash::class)
			<a href="{{ route('trash.index', ['model' => 'bancassurances']) }}" class="btn btn-light-danger btn-sm">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
		@endcan
	</div>
</div>
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-column flex-md-row">
		<div class="flex-md-row-fluid">
			<div class="card card-custom">
				<div class="card-body">
					<div class="mb-1">
						<div class="alert alert-custom alert-light-primary alert-shadow fade show mb-5" role="alert">
							<div class="alert-icon">
								<i class="flaticon-info"></i>
							</div>
							<div class="alert-text">
								Ubezpieczenie Bancassurance może posiadać kilka komletów dokumentów, które obowiązywały w różnych okresach czasu.<br>
								Oznaczenie <span class="label font-weight-bold label-md label-white text-success label-inline">Aktualne</span> informuje, że jest to najnowszy komplet dokumentów.<br>
								Jeśli chcesz przeglądać również <span class="label font-weight-bold label-md label-white text-primary label-inline">Archiwalne</span> komplety dokumentów - kliknij Pokaż Archiwalne.<br>
							</div>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true"><i class="ki ki-close"></i></span>
								</button>
							</div>
						</div>
						<div class="row align-items-center">
							<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa produktu" />
							<x-datatables.search-box --size="3" --number="1" --placeholder="Kod dystrybutora" />
							<x-datatables.search-box --size="3" --number="2" --placeholder="Kod produktu" />
							<x-datatables.search-box --size="3" --number="3" --placeholder="Kod OWU" />
							<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
						</div>
						<div class="row align-items-center" id="search_box_panel" style="display: none;">
							<x-datatables.search-box --size="3" --number="8" --placeholder="Nazwa dystrybutora" />
						</div>
					</div>
					<div class="pl-3 pr-3">
						<table class="table table-separate table-head-custom collapsed" id="table">
							<thead>
								<tr>
									<td>Nazwa produktu</td>
									<td>Kod dystrybutora</td>
									<td>Kod produktu</td>
									<td>Kod OWU</td>
									<td>Dokumenty ważne od</td>
									<td>Akcje</td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="card card-custom gutter-b bg-diagonal bg-diagonal-light-primary mt-10">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
						<div class="d-flex flex-column mr-5">
							<span class="h4 font-weight-bold text-dark">
								Brakuje czegoś?
							</span>
							<p class="text-dark-50 h6">
								Brakuje ubezpieczenia? Znalazłeś/aś błąd? Zgłoś to!
							</p>
						</div>
						<div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
							<a href="mailto:piotr.szewczyk@openlife.pl" target="_blank" class="btn font-weight-bolder text-uppercase btn-primary py-4 px-6">
								Zgłoś to!
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('additional_css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('additional_scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/products/bancassurances/index.js') }}" type="text/javascript"></script>
@stop