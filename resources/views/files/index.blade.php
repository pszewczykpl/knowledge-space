@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	@can('create', App\Models\File::class)
		<a href="{{ route('files.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.file', ['class' => 'navi-icon']) Dodaj Dokument
		</a>
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<a href="{{ route('trash.index', ['model' => 'files']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa", "Ścieżka", "Akcje"]' --info>
		<x-slot name="info_text">
			Poniżej znajdują się dokumenty dodane we wszystkich obiektach dostępnch w systemie.<br>
			Pojedynczy dokument może być powiązany z wieloma obiektami.
		</x-slot>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Ścieżka" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/files/index.js') }}" type="text/javascript"></script>
@endpush
