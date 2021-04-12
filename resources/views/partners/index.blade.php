@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" --advanced />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\Partner::class)
			<a href="{{ route('partners.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.partner', ['class' => 'navi-icon']) Dodaj Partnera
			</a>
		@endcan
		@can('viewAny', App\Models\Trash::class)
			<a href="{{ route('trash.index', ['model' => 'partners']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
		@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa", "Symbol", "Typ", "Numer RAU/P", "NIP", "REGON", "Akcje"]' --help-us>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Symbol" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Typ" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Numer RAU" />
		</x-slot>
		<x-slot name="advanced_search">
			<x-datatables.search-box --size="3" --number="4" --placeholder="NIP" />
			<x-datatables.search-box --size="3" --number="5" --placeholder="REGON" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/partners/index.js') }}" type="text/javascript"></script>
@endpush
