@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Risk::class)
		<x-layout.toolbar.button action="custom" svg="risk" title="Dodaj Ryzyko Ubezpieczeniowe" href="{{ route('risks.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'risks']) }}" />
	@endcan
@stop


@section('content')
	<x-layout.datatable :columns='["Symbol", "Nazwa", "Kategoria", "Grupa", "Okres karencji", "Akcje"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Symbol" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Kategoria" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Grupa" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('scripts')
	<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/risks/index.js') }}" type="text/javascript"></script>
@endpush
