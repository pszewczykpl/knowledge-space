@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Partner::class)
		<x-layout.toolbar.button action="custom" svg="partner" title="Dodaj Partnera" href="{{ route('partners.create') }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="partners_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Nazwa" />
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