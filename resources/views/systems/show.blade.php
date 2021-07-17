@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('systems.index') }}" />
	@can('update', $system)
		<x-layout.toolbar.button action="edit" href="{{ route('systems.edit', $system) }}" />
	@endcan
	@can('delete', $system)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('systems_destroy_{{ $system->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'systems.destroy', $system ], 'id' => 'systems_destroy_' . $system->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
    <x-pages.form>
        
        <x-pages.form-card title="Dane podstawowe">
            <x-pages.form-card-row label="Nazwa">
                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $system->name }}" placeholder="Wpisz Nazwę" disabled>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="URL">
                <input class="form-control form-control-lg form-control-solid" type="text" name="url" id="url" value="{{ $system->url }}" placeholder="Wpisz URL" disabled>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Opis">
                <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ $system->description }}" placeholder="Wpisz Opis" disabled>
            </x-pages.form-card-row>
        </x-pages.form-card>

    </x-pages.form>
@stop