@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Note::class)
		<x-layout.toolbar.button action="custom" svg="note" title="Dodaj Notatkę" href="{{ route('notes.create') }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="notes_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Treść" />
		</x-slot>
	</x-layout.datatable>
@stop