@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" --active --advanced />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-light btn-sm mx-1">@include('svg.back', ['class' => 'svg-icon']) Powrót</a>
	@can('create', App\Models\Investment::class)
		<a href="{{ route('investments.create') }}" class="btn btn-light-primary btn-sm mx-1">@include('svg.investment', ['class' => 'svg-icon']) Dodaj Ubezpieczenie</a>
	@endcan
	@can('create', App\Models\File::class)
		<a href="{{ route('files.create') }}" class="btn btn-light-primary btn-sm mx-1">@include('svg.file', ['class' => 'svg-icon']) Dodaj Dokument</a>
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<a href="{{ route('trash.index', ['model' => 'investments']) }}" class="btn btn-light-danger btn-sm mx-1">@include('svg.trash', ['class' => 'svg-icon']) Elementy usunięte</a>
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa produktu", "Kod TOiL", "Kod produktu", "Grupa produktowa", "Ostatnia aktualizacja", "Akcje"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa produktu" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod TOiL" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Kod produktu" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Grupa produktowa" />
			<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
		</x-slot>
		<x-slot name="advanced_search">
			<x-datatables.search-box --size="3" --number="8" --placeholder="Nazwa dystrybutora" />
			<x-datatables.search-box --size="3" --number="9" --placeholder="Kod dystrybutora" />
			<x-datatables.search-box --size="3" --number="10" --placeholder="Kod OWU" />
			<x-datatables.search-box --size="3" --number="11" --placeholder="Typ produktu" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/pages/products/investments/index.js') }}" type="text/javascript"></script>
@endpush