@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('notes.index') }}" />
	@can('create', App\Models\Note::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('note_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'notes.store', 'method' => 'post', 'id' => 'note_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane notatki">
                <x-pages.form-card-row label="Treść notatki">
                    <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Wpisz Treść notatki">{{ old('content') }}</textarea>
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Powiązania">
                <x-pages.form-card-row label="Ubezpieczenia Inwestycyjne">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="investment_id[]" id="investment_id[]">
                        @foreach($investments as $investment)
                            <option value="{{ $investment->id }}" @if(in_array($investment->id, old('investment_id') ?? [])) selected @endif>{{ $investment->extended_name }} od {{ $investment->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Ochronne">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="protective_id[]" id="protective_id[]">
                        @foreach($protectives as $protective)
                            <option value="{{ $protective->id }}" @if(in_array($protective->id, old('protective_id') ?? [])) selected @endif>{{ $protective->extended_name }} od {{ $protective->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Bancassurance">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]">
                        @foreach($bancassurances as $bancassurance)
                            <option value="{{ $bancassurance->id }}" @if(in_array($bancassurance->id, old('bancassurance_id') ?? [])) selected @endif>{{ $bancassurance->extended_name }} od {{ $bancassurance->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Pracownicze">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="employee_id[]" id="employee_id[]">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" @if(in_array($employee->id, old('employee_id') ?? [])) selected @endif>{{ $employee->extended_name }} od {{ $employee->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Fundusze UFK">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="fund_id[]" id="fund_id[]">
                        @foreach($funds as $fund)
                            <option value="{{ $fund->id }}" @if(in_array($fund->id, old('fund_id') ?? [])) selected @endif>{{ $fund->extended_name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Partnerzy">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="partner_id[]" id="partner_id[]">
                        @foreach($partners as $partner)
                            <option value="{{ $partner->id }}" @if(in_array($partner->id, old('partner_id') ?? [])) selected @endif>{{ $partner->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ryzyka ubezpieczeniowe">
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="risk_id[]" id="risk_id[]">
                        @foreach($risks as $risk)
                            <option value="{{ $risk->id }}" @if(in_array($risk->id, old('risk_id') ?? [])) selected @endif>{{ $risk->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop