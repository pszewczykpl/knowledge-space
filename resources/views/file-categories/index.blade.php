@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\FileCategory::class)
		<x-layout.toolbar.button action="custom" svg="file-category" title="Dodaj Kategorię" href="{{ route('file-categories.create') }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="file_categories_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Nazwa" />
		</x-slot>
	</x-layout.datatable>
@stop