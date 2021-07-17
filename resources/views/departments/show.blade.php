@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('departments.index') }}" />
	@can('update', $department)
		<x-layout.toolbar.button action="edit" href="{{ route('departments.edit', $department) }}" />
	@endcan
	@can('delete', $department)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('departments_destroy_{{ $department->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'departments.destroy', $department ], 'id' => 'departments_destroy_' . $department->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
    <x-pages.form>
        
        <x-pages.form-card title="Dane departamentu">
            <x-pages.form-card-row label="Nazwa">
                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $department->name }}" placeholder="Wpisz Nazwę" disabled>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Kod">
                <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $department->code }}" placeholder="Wpisz Kod" disabled>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Opis departamentu">
                <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ $department->description }}" placeholder="Wpisz Opis departamentu" disabled>
            </x-pages.form-card-row>
        </x-pages.form-card>

    </x-pages.form>
@stop