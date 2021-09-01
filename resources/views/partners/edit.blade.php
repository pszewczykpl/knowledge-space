@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('partners.show', $partner) }}" />
	@can('update', $partner)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('partner_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['partners.update', $partner->id], 'method' => 'PUT', 'id' => 'partner_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane partnera">
                <x-pages.form-card-row label="Nazwa">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $partner->name }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $partner->code }}" placeholder="Wpisz Kod">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Typ">
                    <select class="form-control form-control-lg form-control-solid select2-single" name="type" id="type">
                        <option value="Dystrybutor" @if($partner->type == 'Dystrybutor') selected @endif>Dystrybutor</option>
                        <option value="Multiagencja" @if($partner->type == 'Multiagencja') selected @endif>Multiagencja</option>
                        <option value="Agent" @if($partner->type == 'Agent') selected @endif>Agent</option>
                        <option value="Broker" @if($partner->type == 'Broker') selected @endif>Broker</option>
                    </select>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="NIP">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="nip" id="nip" value="{{ $partner->nip }}" placeholder="Wpisz NIP">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="REGON">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="regon" id="regon" value="{{ $partner->regon }}" placeholder="Wpisz REGON">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Numer RAU/P">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="number_rau" id="number_rau" value="{{ $partner->number_rau }}" placeholder="Wpisz Numer RAU/P">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop