@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('departments.index') }}" />
	@can('create', App\Models\Department::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('department_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'departments.store', 'method' => 'post', 'id' => 'department_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane departamentu">
                <x-pages.form-card-row label="Nazwa" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ old('code') }}" placeholder="Wpisz Kod">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Opis departamentu" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ old('description') }}" placeholder="Wpisz Opis departamentu">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop