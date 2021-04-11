@extends('layouts.app')

@section('subheader')
	<x-datatables.search-box-global />
	<button type="button" class="btn btn-clean btn-sm ml-1" id="search_box_panel_button">Zaawansowane</button>
	<div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-3 bg-gray-200"></div>
	<button type="button" class="btn btn-primary btn-sm ml-3" id="active_or_all">Pokaż Archiwalne</button>
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\Protective::class)
			<a href="{{ route('protectives.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.protective', ['class' => 'navi-icon']) Dodaj Ubezpieczenie</a>
		@endcan
		@can('create', App\Models\File::class)
			<a href="{{ route('files.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.file', ['class' => 'navi-icon']) Dodaj Dokument</a>
		@endcan
		@can('viewAny', App\Models\Trash::class)
			<a href="{{ route('trash.index', ['model' => 'protectives']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
		@endcan
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
								Ubezpieczenie Ochronne może posiadać kilka komletów dokumentów, które obowiązywały w różnych okresach czasu.<br>
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
			<x-cards.help-us />
		</div>
	</div>
</div>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/products/protectives/index.js') }}" type="text/javascript"></script>
@endpush