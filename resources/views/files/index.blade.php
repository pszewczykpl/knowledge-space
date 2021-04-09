@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
		<x-datatables.search-box-global />
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\File::class)
			<a href="{{ route('files.create') }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.file', ['class' => 'navi-icon']) Dodaj Dokument
			</a>
		@endcan
		@can('viewAny', App\Models\Trash::class)
			<a href="{{ route('trash.index', ['model' => 'files']) }}" class="btn btn-light-danger btn-sm">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
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
						<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
							<div class="alert-icon">
								<i class="flaticon-info"></i>
							</div>
							<div class="alert-text">
								<b>Pamiętaj!</b><br>
								Poniżej znajdują się dokumenty dodane we wszystkich obiektach dostępnch w systemie.<br>
								Pojedynczy dokument może być powiązany z wieloma obiektami.
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
							<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
							<x-datatables.search-box --size="3" --number="1" --placeholder="Ścieżka" />
						</div>
					</div>
					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<td>Nazwa</td>
								<td>Ścieżka</td>
								<td>Kategoria dokumentu</td>
								<td>Akcje</td>
							</tr>
						</thead>
					</table>
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
<script src="{{ asset('js/pages/files/index.js') }}" type="text/javascript"></script>
@stop
