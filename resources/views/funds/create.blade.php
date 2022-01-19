@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('funds.index') }}" />
	@can('create', App\Models\Fund::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('fund_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'funds.store', 'method' => 'post', 'files' => true, 'id' => 'fund_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane funduszu">
                <x-pages.form-card-row label="Nazwa wyświetlana" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwa wyświetlana">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Symbol funduszu" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ old('code') }}" placeholder="Wpisz Symbol funduszu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Waluta" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="currency" id="currency" value="{{ old('currency') }}" placeholder="Wpisz Waluta">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Typ" required>
                    <select class="form-control form-control-lg form-control-solid select2-single" name="type" id="type">
                        <option value="Z" @if(old('type') == 'Z') selected @endif>Inwestycyjny</option>
                        <option value="D" @if(old('type') == 'D') selected @endif>Depozytowy</option>
                        <option value="M" @if(old('type') == 'M') selected @endif>Modelowy</option>
                        <option value="U" @if(old('type') == 'U') selected @endif>UFK</option>
                        <option value="S" @if(old('type') == 'S') selected @endif>SOK</option>
                        <option value="T" @if(old('type') == 'T') selected @endif>Tracker</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Data udostępnienia">
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" placeholder="Wybierz Datę udostępnienia funduszu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Status" required>
                    <select class="form-control form-control-lg form-control-solid select2-single" name="status" id="status">
                        <option value="A" @if(old('status') == 'A') selected @endif>Aktywny</option>
                        <option value="N" @if(old('status') == 'N') selected @endif>Nieaktywny</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Data likwidacji">
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="cancel_date" id="cancel_date" value="{{ old('cancel_date') }}" placeholder="Wybierz Datę likwidacji">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Powód likwidacji">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="cancel_reason" id="cancel_reason" value="{{ old('cancel_reason') }}" placeholder="Wpisz Powód likwidacji">
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
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop