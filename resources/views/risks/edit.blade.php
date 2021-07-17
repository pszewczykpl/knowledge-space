@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('risks.show', $risk) }}" />
	@can('update', $risk)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('risk_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['risks.update', $risk->id], 'method' => 'PUT', 'id' => 'risk_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane ryzyka ubezpieczeniowego">
                <x-pages.form-card-row label="Nazwa ryzyka">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $risk->name }}" placeholder="Wpisz Nazwę ryzyka">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod ryzyka">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $risk->code }}" placeholder="Wpisz Kod ryzyka">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kategoria">
                    <select class="form-control form-control-lg form-control-solid" name="category" id="category">
                        <option value="WYPADKOWE" @if($risk->category == 'WYPADKOWE') selected @endif>Wypadkowe</option>
                        <option value="INNE" @if($risk->category == 'INNE') selected @endif>Inne</option>
                        <option value="CHOROBOWE" @if($risk->category == 'CHOROBOWE') selected @endif>Chorobowe</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Grupa">
                    <input class="form-control form-control-lg form-control-solid" type="number" name="group" id="group" value="{{ $risk->group }}" placeholder="Wpisz Grupa">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Okres karencji">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="grace_period" id="grace_period" value="{{ $risk->grace_period }}" placeholder="Wpisz Okres karencji">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop