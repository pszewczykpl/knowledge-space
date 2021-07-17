@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Note::class)
		<x-layout.toolbar.button action="custom" svg="note" title="Dodaj Notatkę" href="{{ route('notes.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'notes']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Treść", "Akcje"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Treść" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('scripts')
	<script src="{{ asset('js/pages/notes/index.js') }}" type="text/javascript"></script>
@endpush
