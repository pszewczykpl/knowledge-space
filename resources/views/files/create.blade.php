@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('files.index') }}" />
	@can('create', App\Models\File::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('file_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'files.store', 'method' => 'post', 'files' => true, 'id' => 'file_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane dokumentu">
                <x-pages.form-card-row label="Nazwa wyświetlana">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwa wyświetlana">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod dokumentu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ old('code') }}" placeholder="Wpisz Kod dokumentu w API">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kategoria dokumentu">
                    <select class="form-control form-control-lg form-control-solid" name="file_category_id" id="file_category_id">
                        @foreach($fileCategories as $file_category)
                            <option value="{{ $file_category->id }}" @if(old('file_category_id') == $file_category->id) selected @endif>{{ $file_category->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Plik">
                    <input class="form-control form-control-lg form-control-solid" type="file" name="file" id="file" value="{{ old('file') }}" />
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Dokument roboczy?">
                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                        <input class="form-check-input" type="checkbox" name="draft_checkbox" id="draft_checkbox" value="{{ old('draft_checkbox') }}">
                    </div>
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Powiązania">
                <x-pages.form-card-row label="Ubezpieczenia Inwestycyjne">
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="investment_id[]" id="investment_id[]">
                        @foreach($investments as $investment)
                            <option value="{{ $investment->id }}" @if($fileable_type == 'investments' and $fileable_id == $investment->id) selected @endif>{{ $investment->extended_name }} od {{ $investment->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Ochronne">
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="protective_id[]" id="protective_id[]">
                        @foreach($protectives as $protective)
                            <option value="{{ $protective->id }}" @if($fileable_type == 'protectives' and $fileable_id == $protective->id) selected @endif>{{ $protective->extended_name }} od {{ $protective->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Bancassurance">
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]">
                        @foreach($bancassurances as $bancassurance)
                            <option value="{{ $bancassurance->id }}" @if($fileable_type == 'bancassurances' and $fileable_id == $bancassurance->id) selected @endif>{{ $bancassurance->extended_name }} od {{ $bancassurance->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Pracownicze">
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="employee_id[]" id="employee_id[]">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" @if(($fileable_type == 'employees' and $fileable_id == $employee->id) or in_array($employee->id, old('employee_id') ?? [])) selected @endif>{{ $employee->extended_name }} od {{ $employee->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop

@push('scripts')
    <script src="{{ asset('js/pages/files/create.js') }}" type="text/javascript"></script>
@endpush