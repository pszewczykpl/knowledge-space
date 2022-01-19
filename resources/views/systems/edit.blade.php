@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('systems.show', $system) }}" />
	@can('update', $system)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('system_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['systems.update', $system->id], 'method' => 'PUT', 'id' => 'system_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane podstawowe">
                <x-pages.form-card-row label="Nazwa" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $system->name }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="URL" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="url" id="url" value="{{ $system->url }}" placeholder="Wpisz URL">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Opis">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ $system->description }}" placeholder="Wpisz Opis">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop