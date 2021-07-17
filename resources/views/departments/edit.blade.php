@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('departments.show', $department) }}" />
	@can('update', $department)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('department_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['departments.update', $department->id], 'method' => 'PUT', 'id' => 'department_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane departamentu">
                <x-pages.form-card-row label="Nazwa">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $department->name }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $department->code }}" placeholder="Wpisz Kod">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Opis departamentu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ $department->description }}" placeholder="Wpisz Opis departamentu">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop