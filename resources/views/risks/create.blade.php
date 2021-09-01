@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('risks.index') }}" />
	@can('create', App\Models\Risk::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('risk_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'risks.store', 'method' => 'post', 'id' => 'risk_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane ryzyka ubezpieczeniowego">
                <x-pages.form-card-row label="Nazwa ryzyka">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę ryzyka">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod ryzyka">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ old('code') }}" placeholder="Wpisz Kod ryzyka">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kategoria">
                    <select class="form-control form-control-lg form-control-solid select2-single" name="category" id="category">
                        <option value="WYPADKOWE" @if(old('category') == 'WYPADKOWE') selected @endif>Wypadkowe</option>
                        <option value="INNE" @if(old('category') == 'INNE') selected @endif>Inne</option>
                        <option value="CHOROBOWE" @if(old('category') == 'CHOROBOWE') selected @endif>Chorobowe</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Grupa">
                    <input class="form-control form-control-lg form-control-solid" type="number" name="group" id="group" value="{{ old('group') }}" placeholder="Wpisz Grupa">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Okres karencji">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="grace_period" id="grace_period" value="{{ old('grace_period') }}" placeholder="Wpisz Okres karencji">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop