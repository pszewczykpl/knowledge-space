@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="custom" svg="file" title="Dodaj Dokument" href="{{ route('files.create') }}" />
	@endcan
	@can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'files']) }}" />
	@endcan
@stop

@section('content')
	<x-layout.datatable :data="$datatables" id="files_datatable">
		<x-slot name="search">
			<x-datatables.search-box --size="6" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="6" --placeholder="ID Kategorii" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Kategoria</label>
				<select class="form-control form-control-solid card-rounded" name="file_category_id" id="file_category_id">
						<option value="">Wszystkie</option>
					@foreach($fileCategories as $fileCategory)
						<option value="{{ $fileCategory->id }}">{{ $fileCategory->name }}</option>
					@endforeach
				</select>
			</div>
			<x-datatables.search-box --size="3" --number="8" --placeholder="Typ" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Typ dokumentów</label>
				<div class="nav-group nav-group-fluid card-rounded">
					<label>
						<input type="radio" class="btn-check" id="type_all_files" name="type">
						<span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bolder px-4 card-rounded">Wszystkie</span>
					</label>
					<label>
						<input type="radio" class="btn-check" id="type_p_files" name="type">
						<span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bolder px-4 card-rounded">Produktowe</span>
					</label>
					<label>
						<input type="radio" class="btn-check" id="type_i_files" name="type" checked="checked">
						<span class="btn btn-sm btn-color-muted btn-active btn-active-primary fw-bolder px-4 card-rounded">Pozostałe</span>
					</label>
				</div>
			</div>
			<x-datatables.search-box --size="3" --number="7" --placeholder="Robocze" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Dokumenty robocze</label>
				<div class="form-check form-switch form-check-custom form-check-solid mt-1">
					<input class="form-check-input" type="checkbox" id="draft_or_all_files" />
					<label class="form-check-label" for="draft_or_all_files" id="draft_or_all_files_title">Pokaż dokumenty robocze</label>
				</div>
			</div>
		</x-slot>
	</x-layout.datatable>
@stop