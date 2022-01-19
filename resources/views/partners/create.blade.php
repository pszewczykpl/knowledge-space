@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('partners.index') }}" />
	@can('create', App\Models\Partner::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('partner_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'partners.store', 'method' => 'post', 'id' => 'partner_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane partnera">
                <x-pages.form-card-row label="Nazwa" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ old('code') }}" placeholder="Wpisz Kod">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Typ">
                    <select class="form-control form-control-lg form-control-solid select2-single" name="type" id="type">
                        <option value="Dystrybutor" @if(old('type') == 'Dystrybutor') selected @endif>Dystrybutor</option>
                        <option value="Multiagencja" @if(old('type') == 'Multiagencja') selected @endif>Multiagencja</option>
                        <option value="Agent" @if(old('type') == 'Agent') selected @endif>Agent</option>
                        <option value="Broker" @if(old('type') == 'Broker') selected @endif>Broker</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="NIP">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="nip" id="nip" value="{{ old('nip') }}" placeholder="Wpisz NIP">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="REGON">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="regon" id="regon" value="{{ old('regon') }}" placeholder="Wpisz REGON">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Numer RAU/P">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="number_rau" id="number_rau" value="{{ old('number_rau') }}" placeholder="Wpisz Numer RAU/P">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop