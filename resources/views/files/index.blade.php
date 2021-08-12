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
			<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
			<x-datatables.search-box --size="3" --number="6" --placeholder="ID Kategorii" --hidden />
			<div class="col-md-3 pb-3 my-2 my-md-0">
				<label class="fs-6 form-label fw-normal text-gray-800">Kategoria</label>
				<select class="form-control form-control-lg form-control-solid" name="file_category_id" id="file_category_id">
						<option value="">Wszystkie</option>
					@foreach($fileCategories as $fileCategory)
						<option value="{{ $fileCategory->id }}">{{ $fileCategory->name }}</option>
					@endforeach
				</select>
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