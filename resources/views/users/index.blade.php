@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="users_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="5" --placeholder="Imię" />
			<x-datatables.search-box --size="3" --number="6" --placeholder="Nazwisko" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="E-mail" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Telefon" />
		</x-slot>
	</x-layout.datatable>
@stop