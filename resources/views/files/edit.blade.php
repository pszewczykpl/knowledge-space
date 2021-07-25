@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('files.show', $file) }}" />
	@can('update', $file)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('file_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['files.update', $file->id], 'method' => 'PUT', 'files' => true, 'id' => 'file_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane dokumentu">
                <x-pages.form-card-row label="Nazwa wyświetlana">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $file->name }}" placeholder="Wpisz Nazwa wyświetlana">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod dokumentu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $file->code }}" placeholder="Wpisz Kod dokumentu w API">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kategoria dokumentu">
                    <select class="form-control form-control-lg form-control-solid" name="file_category_id" id="file_category_id">
                        @foreach($fileCategories as $file_category)
                            <option value="{{ $file_category->id }}" @if($file->file_category_id == $file_category->id) selected @endif>{{ $file_category->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Plik">
                    <input class="form-control form-control-lg form-control-solid" type="file" name="file" id="file" />
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Dokument roboczy?">
                    <div class="form-check form-check-custom form-check-solid form-check-lg">
                        <input class="form-check-input" type="checkbox" name="draft_checkbox" id="draft_checkbox" value="{{ $file->draft_checkbox }}">
                    </div>
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Powiązania">
                <x-pages.form-card-row label="Ubezpieczenia Inwestycyjne">
                    @php $file_investment = $file->investments->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="investment_id[]" id="investment_id[]">
                        @foreach($investments as $investment)
                            <option value="{{ $investment->id }}" {{ in_array($investment->id, $file_investment) ? "selected": "" }}>{{ $investment->extended_name }} od {{ $investment->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                
                <x-pages.form-card-row label="Ubezpieczenia Ochronne">
                    @php $file_protective = $file->protectives->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="protective_id[]" id="protective_id[]">
                        @foreach($protectives as $protective)
                            <option value="{{ $protective->id }}" {{ in_array($protective->id, $file_protective) ? "selected": "" }}>{{ $protective->extended_name }} od {{ $protective->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                
                <x-pages.form-card-row label="Ubezpieczenia Bancassurance">
                    @php $file_bancassurance = $file->bancassurances->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]">
                        @foreach($bancassurances as $bancassurance)
                            <option value="{{ $bancassurance->id }}" {{ in_array($bancassurance->id, $file_bancassurance) ? "selected": "" }}>{{ $bancassurance->extended_name }} od {{ $bancassurance->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                
                <x-pages.form-card-row label="Ubezpieczenia Pracownicze">
                    @php $file_employee = $file->employees->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="employee_id[]" id="employee_id[]">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ in_array($employee->id, $file_employee) ? "selected": "" }}>{{ $employee->extended_name }} od {{ $employee->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop

@push('scripts')
@endpush