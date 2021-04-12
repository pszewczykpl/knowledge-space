@extends('layouts.app')

@section('subheader')
	<x-datatables.search-box-global />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\Risk::class)
			<a href="{{ route('risks.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.risk', ['class' => 'navi-icon']) Dodaj Ryzyko
			</a>
		@endcan
		@can('viewAny', App\Models\Trash::class)
			<a href="{{ route('trash.index', ['model' => 'risks']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
		@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Symbol", "Nazwa", "Kategoria", "Grupa", "Okres karencji", "Akcje"]' --help-us>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Symbol" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Kategoria" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Grupa" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/risks/index.js') }}" type="text/javascript"></script>
@endpush
