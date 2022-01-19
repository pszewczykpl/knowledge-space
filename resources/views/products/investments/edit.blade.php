@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('investments.show', $investment) }}" />
	@can('update', $investment)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('investment_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['investments.update', $investment->id], 'method' => 'PUT', 'id' => 'investment_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane produktu">
                <x-pages.form-card-row label="Nazwa produktu" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $investment->name }}" placeholder="Wpisz Nazwę produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod produktu" required>
                    <input class="form-control form-control-lg form-control-solid" type="number" name="code" id="code" value="{{ $investment->code }}" placeholder="Wpisz Kod produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod OWU" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code_owu" id="code_owu" value="{{ $investment->code_owu }}" placeholder="Wpisz Kod OWU">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod TOiL" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code_toil" id="code_toil" value="{{ $investment->code_toil }}" placeholder="Wpisz Kod TOiL">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Grupa produktowa" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="group" id="group" value="{{ $investment->group }}" placeholder="Wpisz Grupę produktową">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Typ produktu" required>
                    <select class="form-control form-control-lg form-control-solid select2-single" name="type" id="type">
                        <option value="I" @if($investment->type == 'Indywidualny') selected @endif>Indywidualny</option>
                        <option value="G" @if($investment->type == 'Grupowy') selected @endif>Grupowy</option>
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Dane dystrybutora">
                <x-pages.form-card-row label="Nazwa dystrybutora" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="dist" id="dist" value="{{ $investment->dist }}" placeholder="Wpisz Nazwę dystrybutora">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod dystrybutora" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="dist_short" id="dist_short" value="{{ $investment->dist_short }}" placeholder="Wpisz Kod dystrybutora">
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Dane kompletu dokumentów">
                <x-pages.form-card-row label="Dokumenty ważne od" required>
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="edit_date" id="edit_date" value="{{ $investment->edit_date }}" placeholder="Wybierz Datę pooczątku obowiązywania dokumentów">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Status rekordu" required>
                    <select class="form-control form-control-lg form-control-solid select2-single" name="status" id="status">
                        <option value="A" @if($investment->status == 'Aktualny') selected @endif>Aktualny</option>
                        <option value="N" @if($investment->status == 'Archiwalny') selected @endif>Archiwalny</option>
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop