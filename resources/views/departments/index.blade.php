@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Department::class)
		<x-layout.toolbar.button action="custom" svg="department" title="Dodaj Department" href="{{ route('departments.create') }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="departments_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod" />
		</x-slot>
	</x-layout.datatable>
@stop