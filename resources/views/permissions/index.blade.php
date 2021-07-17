@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa", "Kod", "Opis"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Opis" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('scripts')
	<script src="{{ asset('js/pages/permissions/index.js') }}" type="text/javascript"></script>
@endpush
