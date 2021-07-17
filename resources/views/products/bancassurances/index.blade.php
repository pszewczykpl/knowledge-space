@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Bancassurance::class)
		<x-layout.toolbar.button action="custom" svg="bancassurance" title="Dodaj Ubezpieczenie" href="{{ route('bancassurances.create') }}" />
	@endcan
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'bancassurances']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa produktu", "Kod dystrybutora", "Kod produktu", "Kod OWU", "Ostatnia aktualizacja", "Akcje"]'>
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

@push('scripts')
	<script src="{{ asset('js/pages/products/bancassurances/index.js') }}" type="text/javascript"></script>
@endpush