@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\PostCategory::class)
		<x-layout.toolbar.button action="custom" svg="post-category" title="Dodaj Kategorię" href="{{ route('post-categories.create') }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="post_categories_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Nazwa" />
		</x-slot>
	</x-layout.datatable>
@stop