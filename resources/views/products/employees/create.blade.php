@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('employees.index') }}" />
	@can('create', App\Models\Employee::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('employee_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'employees.store', 'method' => 'post', 'files' => true, 'id' => 'employee_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane produktu">
                <x-pages.form-card-row label="Nazwa produktu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod OWU">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code_owu" id="code_owu" value="{{ old('code_owu') }}" placeholder="Wpisz Kod OWU">
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Dane kompletu dokumentów">
                <x-pages.form-card-row label="Dokumenty ważne od">
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="edit_date" id="edit_date" value="{{ old('edit_date') }}" placeholder="Wybierz Datę pooczątku obowiązywania dokumentów">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Status dokumentów">
                    <select class="form-control form-control-lg form-control-solid" name="status" id="status">
                        <option value="A" @if(old('status') == 'A') selected @endif>Aktywne</option>
                        <option value="N" @if(old('status') == 'N') selected @endif>Archiwalne</option>
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop

@push('scripts')
    <script src="{{ asset('js/pages/products/employees/create.js') }}" type="text/javascript"></script>
    <script>
        $("#edit_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: "YYYY-MM-DD"
            }
        });
    </script>
@endpush