@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('notes.show', $note) }}" />
	@can('update', $note)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('note_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['notes.update', $note->id], 'method' => 'PUT', 'id' => 'note_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane notatki">
                <x-pages.form-card-row label="Treść notatki">
                    <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Wpisz Treść notatki">{{ $note->content }}</textarea>
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Powiązania">
                <x-pages.form-card-row label="Ubezpieczenia Inwestycyjne">
                    @php $note_investment = $note->investments->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="investment_id[]" id="investment_id[]">
                        @foreach($investments as $investment)
                            <option value="{{ $investment->id }}" {{ in_array($investment->id, $note_investment) ? "selected": "" }}>{{ $investment->extended_name }} od {{ $investment->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Ochronne">
                    @php $note_protective = $note->protectives->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="protective_id[]" id="protective_id[]">
                        @foreach($protectives as $protective)
                            <option value="{{ $protective->id }}" {{ in_array($protective->id, $note_protective) ? "selected": "" }}>{{ $protective->extended_name }} od {{ $protective->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Bancassurance">
                    @php $note_bancassurance = $note->bancassurances->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]">
                        @foreach($bancassurances as $bancassurance)
                            <option value="{{ $bancassurance->id }}" {{ in_array($bancassurance->id, $note_bancassurance) ? "selected": "" }}>{{ $bancassurance->extended_name }} od {{ $bancassurance->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ubezpieczenia Pracownicze">
                    @php $note_employee = $note->employees->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="employee_id[]" id="employee_id[]">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ in_array($employee->id, $note_employee) ? "selected": "" }}>{{ $employee->extended_name }} od {{ $employee->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Fundusze UFK">
                    @php $note_fund = $note->funds->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="fund_id[]" id="fund_id[]">
                        @foreach($funds as $fund)
                            <option value="{{ $fund->id }}" {{ in_array($fund->id, $note_fund) ? "selected": "" }}>{{ $fund->extended_name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Partnerzy">
                    @php $note_partner = $note->partners->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="partner_id[]" id="partner_id[]">
                        @foreach($partners as $partner)
                            <option value="{{ $partner->id }}" {{ in_array($partner->id, $note_partner) ? "selected": "" }}>{{ $partner->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Ryzyka ubezpieczeniowe">
                    @php $note_risk = $note->risks->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="risk_id[]" id="risk_id[]">
                        @foreach($risks as $risk)
                            <option value="{{ $risk->id }}" {{ in_array($risk->id, $note_risk) ? "selected": "" }}>{{ $risk->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop