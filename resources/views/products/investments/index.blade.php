@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Investment::class)
		<x-layout.toolbar.button action="custom" svg="investment" title="Dodaj Ubezpieczenie" href="{{ route('investments.create') }}" />
	@endcan
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'investments']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="investments_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Nazwa produktu" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod TOiL" />
			<x-datatables.search-box --size="3" --number="11" --placeholder="Typ" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Typ produktu</label>
				<div class="nav-group nav-group-fluid">
					<label>
						<input type="radio" class="btn-check" id="type_all_investments" name="type" value="" checked="checked">
						<span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bolder px-4">Wszystkie</span>
					</label>
					<label>
						<input type="radio" class="btn-check" id="type_i_investments" name="type" value="indywidualny">
						<span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bolder px-4">Indywidualne</span>
					</label>
					<label>
						<input type="radio" class="btn-check" id="type_g_investments" name="type" value="grupowy">
						<span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bolder px-4">Grupowe</span>
					</label>
				</div>
			</div>
			<x-datatables.search-box --size="3" --number="2" --placeholder="Kod produktu" />
			<x-datatables.search-box --size="3" --number="10" --placeholder="Kod OWU" />
			<x-datatables.search-box --size="3" --number="3" --placeholder="Grupa produktowa" />
			<x-datatables.search-box --size="3" --number="9" --placeholder="Kod dystrybutora" />
			<x-datatables.search-box --size="3" --number="8" --placeholder="Nazwa dystrybutora" />
			<x-datatables.search-box --size="3" --number="7" --placeholder="Status" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Dane archiwalne</label>
				<div class="form-check form-switch form-check-custom form-check-solid mt-1">
					<input class="form-check-input" type="checkbox" id="active_or_all_investments" />
					<label class="form-check-label" for="active_or_all_investments" id="active_or_all_title">Pokaż dane archiwalne</label>
				</div>
			</div>

		</x-slot>
	</x-layout.datatable>
@stop