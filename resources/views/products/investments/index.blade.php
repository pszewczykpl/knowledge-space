@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Investment::class)
		<x-layout.toolbar.button action="custom" svg="investment" title="Dodaj Ubezpieczenie" href="{{ route('investments.create') }}" />
	@endcan
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'investments']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa produktu", "Kod TOiL", "Kod produktu", "Grupa produktowa", "Ostatnia aktualizacja", "Akcje", "ID"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa produktu" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod TOiL" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Kod produktu" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Grupa produktowa" />
			<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
			<x-datatables.search-box --size="3" --number="8" --placeholder="Nazwa dystrybutora" />
			<x-datatables.search-box --size="3" --number="9" --placeholder="Kod dystrybutora" />
			<x-datatables.search-box --size="3" --number="10" --placeholder="Kod OWU" />
			<x-datatables.search-box --size="3" --number="11" --placeholder="Typ produktu" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('scripts')
	<script src="{{ asset('js/pages/products/investments/index.js') }}" type="text/javascript"></script>
@endpush