@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
@stop

@section('content')
	<x-layout.datatable :columns='["Nazwa", "Kod", "Opis"]' --info --help-us>
		<x-slot name="info_text">
			Uprawnienia systemowe zdefiniowane są w sposób stały.<br>
		</x-slot>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod" />
			<x-datatables.search-box --size="3" --number="2" --placeholder="Opis" />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/permissions/index.js') }}" type="text/javascript"></script>
@endpush
