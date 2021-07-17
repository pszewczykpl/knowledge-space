@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('file-categories.index') }}" />
	@can('update', $fileCategory)
		<x-layout.toolbar.button action="edit" href="{{ route('file-categories.edit', $fileCategory) }}" />
	@endcan
	@can('delete', $fileCategory)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('file_categories_destroy_{{ $fileCategory->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'file-categories.destroy', $fileCategory ], 'id' => 'file_categories_destroy_' . $fileCategory->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
    <x-pages.form>
        
            <x-pages.form-card title="Dane podstawowe">
                <x-pages.form-card-row label="Nazwa">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $fileCategory->name }}" placeholder="Wpisz Nazwę" disabled>
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Prefix">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="prefix" id="prefix" value="{{ $fileCategory->prefix }}" placeholder="Wpisz Prefix" disabled>
                </x-pages.form-card-row>
            </x-pages.form-card>

    </x-pages.form>
@stop