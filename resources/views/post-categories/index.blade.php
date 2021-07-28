@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\PostCategory::class)
		<x-layout.toolbar.button action="custom" svg="post-category" title="Dodaj Kategorię" href="{{ route('post-categories.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'post-categories']) }}" />
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
	<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/post-categories/index.js') }}" type="text/javascript"></script>
@endpush
