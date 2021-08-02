@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Employee::class)
		<x-layout.toolbar.button action="custom" svg="employee" title="Dodaj Ubezpieczenie" href="{{ route('employees.create') }}" />
	@endcan
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'employees']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable id="employees_datatable" :columns='["Nazwa produktu", "Kod OWU", "Ostatnia aktualizacja", "Akcje"]'>
		<x-slot name="search">
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa produktu" />
			<x-datatables.search-box --size="3" --number="1" --placeholder="Kod OWU" />
			<x-datatables.search-box --size="3" --number="5" --placeholder="Status" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Dane archiwalne</label>
				<div class="form-check form-switch form-check-custom form-check-solid mt-1">
					<input class="form-check-input" type="checkbox" id="active_or_all_employees" />
					<label class="form-check-label" for="active_or_all_employees" id="active_or_all_title">Pokaż dane archiwalne</label>
				</div>
			</div>
		</x-slot>
	</x-layout.datatable>
@stop