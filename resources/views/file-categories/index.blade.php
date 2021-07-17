@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\FileCategory::class)
		<x-layout.toolbar.button action="custom" svg="file-category" title="Dodaj Kategorię" href="{{ route('file-categories.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'file-categories']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa", "Akcje"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('scripts')
	<script src="{{ asset('js/pages/file-categories/index.js') }}" type="text/javascript"></script>
@endpush
