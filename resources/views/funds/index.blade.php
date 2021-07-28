@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Fund::class)
		<x-layout.toolbar.button action="custom" svg="fund" title="Dodaj Fundusz" href="{{ route('funds.create') }}" />
	@endcan
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'funds']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Symbol", "Nazwa", "Typ", "Data początku", "Akcje"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Symbol" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="5" --placeholder="Waluta" />
			<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
		</x-slot>
	</x-layout.datatable>
@stop

@push('scripts')
	<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/funds/index.js') }}" type="text/javascript"></script>
@endpush
