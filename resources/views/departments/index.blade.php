@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	@can('create', App\Models\Department::class)
		<a href="{{ route('departments.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.department', ['class' => 'navi-icon']) Dodaj Departament</a>
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<a href="{{ route('trash.index', ['model' => 'departments']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa", "Kod", "Akcje"]' --help-us >
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/departments/index.js') }}" type="text/javascript"></script>
@endpush
