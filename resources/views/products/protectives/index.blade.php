@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" --active --advanced />
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
	<x-layout.datatable :columns='["Nazwa produktu", "Kod dystrybutora", "Kod produktu", "Kod OWU", "Data aktualizacji", "Akcje"]' --info --help-us >
		<x-slot name="info_text">
			Ubezpieczenie Ochronne może posiadać kilka komletów dokumentów, które obowiązywały w różnych okresach czasu.<br>
			Oznaczenie <span class="label font-weight-bold label-md label-white text-success label-inline">Aktualne</span> informuje, że jest to najnowszy komplet dokumentów.<br>
			Jeśli chcesz przeglądać również <span class="label font-weight-bold label-md label-white text-primary label-inline">Archiwalne</span> komplety dokumentów - kliknij Pokaż Archiwalne.<br>
		</x-slot>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa produktu" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod dystrybutora" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Kod produktu" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Kod OWU" />
			<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
		</x-slot>
		<x-slot name="advanced_search">
			<x-datatables.search-box --size="3" --number="8" --placeholder="Nazwa dystrybutora" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/pages/products/protectives/index.js') }}" type="text/javascript"></script>
@endpush