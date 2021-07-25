@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('investments.index') }}" />
	@can('create', App\Models\Investment::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('investment_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'investments.store', 'method' => 'post', 'files' => true, 'id' => 'investment_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane produktu">
                <x-pages.form-card-row label="Nazwa produktu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod produktu">
                    <input class="form-control form-control-lg form-control-solid" type="number" name="code" id="code" value="{{ old('code') }}" placeholder="Wpisz Kod produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod OWU">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code_owu" id="code_owu" value="{{ old('code_owu') }}" placeholder="Wpisz Kod OWU">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod TOiL">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code_toil" id="code_toil" value="{{ old('code_toil') }}" placeholder="Wpisz Kod TOiL">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Grupa produktowa">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="group" id="group" value="{{ old('group') }}" placeholder="Wpisz Grupę produktową">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Typ produktu">
                    <select class="form-control form-control-lg form-control-solid" name="type" id="type">
                        <option value="indywidualny" @if(old('type') == 'indywidualny') selected @endif>Indywidualny</option>
                        <option value="grupowy" @if(old('type') == 'grupowy') selected @endif>Grupowy</option>
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Dane dystrybutora">
                <x-pages.form-card-row label="Nazwa dystrybutora">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="dist" id="dist" value="{{ old('dist') }}" placeholder="Wpisz Nazwę dystrybutora">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod dystrybutora">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="dist_short" id="dist_short" value="{{ old('dist_short') }}" placeholder="Wpisz Kod dystrybutora">
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