@extends('layouts.app')

@section('subheader')
	<x-layout.subheader type="datatables" --active custom-active-text="Pokaż Nieaktywne" --advanced />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	@can('create', App\Models\Fund::class)
		<a href="{{ route('funds.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.fund', ['class' => 'navi-icon']) Dodaj Fundusz
		</a>
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<a href="{{ route('trash.index', ['model' => 'funds']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
	@endcan
@stop

@section('content')
	<x-layout.datatable :columns='["Symbol", "Nazwa", "Typ", "Data startu", "Status", "Akcje"]' --active --info --help-us>
		<x-slot name="info_text">
			Oznaczenie <span class="label font-weight-bold label-md label-white text-success label-inline">Aktywne</span> informuje, że ubezpieczeniowy fundusz kapitałowy jest aktywny.<br>
			Jeśli chcesz przeglądać również <span class="label font-weight-bold label-md label-white text-primary label-inline">Nieaktywne</span> fundusze - kliknij Pokaż Nieaktywne.<br>
		</x-slot>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Symbol" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="6" --placeholder="Waluta" />
			<x-datatables.search-box --size="3" --number="4" --placeholder="Status" --hidden />
		</x-slot>
	</x-layout.datatable>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/pages/funds/index.js') }}" type="text/javascript"></script>
@endpush
