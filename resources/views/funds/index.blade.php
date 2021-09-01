@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Fund::class)
		<x-layout.toolbar.button action="custom" svg="fund" title="Dodaj Fundusz" href="{{ route('funds.create') }}" />
	@endcan
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'funds']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="funds_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="1" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="0" --placeholder="Symbol" />
			<x-datatables.search-box --size="3" --number="5" --placeholder="Waluta" />
			<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Fundusze nieaktywne</label>
				<div class="form-check form-switch form-check-custom form-check-solid mt-1">
					<input class="form-check-input" type="checkbox" id="active_or_all_funds" />
					<label class="form-check-label" for="active_or_all_funds" id="active_or_all_title">Pokaż fundusze nieaktywne</label>
				</div>
			</div>
		</x-slot>
	</x-layout.datatable>
@stop