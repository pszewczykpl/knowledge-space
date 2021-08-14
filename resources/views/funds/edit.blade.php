@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('funds.show', $fund) }}" />
	@can('update', $fund)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('fund_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['funds.update', $fund->id], 'method' => 'PUT', 'id' => 'fund_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane funduszu">
                <x-pages.form-card-row label="Nazwa wyświetlana">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $fund->name }}" placeholder="Wpisz Nazwa wyświetlana">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Symbol funduszu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $fund->code }}" placeholder="Wpisz Symbol funduszu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Waluta">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="currency" id="currency" value="{{ $fund->currency }}" placeholder="Wpisz Waluta">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Typ">
                    <select class="form-control form-control-lg form-control-solid" name="type" id="type">
                        <option value="Z" @if($fund->type == 'Inwestycyjny') selected @endif>Inwestycyjny</option>
                        <option value="D" @if($fund->type == 'Depozytowy') selected @endif>Depozytowy</option>
                        <option value="M" @if($fund->type == 'Modelowy') selected @endif>Modelowy</option>
                        <option value="U" @if($fund->type == 'UFK') selected @endif>UFK</option>
                        <option value="S" @if($fund->type == 'SOK') selected @endif>SOK</option>
                        <option value="T" @if($fund->type == 'Tracker') selected @endif>Tracker</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Data udostępnienia">
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="start_date" id="start_date" value="{{ $fund->start_date }}" placeholder="Wybierz Datę udostępnienia funduszu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Status">
                    <select class="form-control form-control-lg form-control-solid" name="status" id="status">
                        <option value="A" @if($fund->status == 'Aktywny') selected @endif>Aktywny</option>
                        <option value="N" @if($fund->status == 'Nieaktywny') selected @endif>Nieaktywny</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Data likwidacji">
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="cancel_date" id="cancel_date" value="{{ $fund->cancel_date }}" placeholder="Wybierz Datę likwidacji">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Powód likwidacji">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="cancel_reason" id="cancel_reason" value="{{ $fund->cancel_reason }}" placeholder="Wpisz Powód likwidacji">
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Powiązania">
                <x-pages.form-card-row label="Ubezpieczenia Inwestycyjne">
                    @php $fund_investment = $fund->investments->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="investment_id[]" id="investment_id[]">
                        @foreach($investments as $investment)
                            <option value="{{ $investment->id }}" {{ in_array($investment->id, $fund_investment) ? "selected": "" }}>{{ $investment->extended_name }} od {{ $investment->edit_date }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop