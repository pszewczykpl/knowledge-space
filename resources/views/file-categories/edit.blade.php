@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('file-categories.show', $fileCategory) }}" />
	@can('update', $fileCategory)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('file_cateogry_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['file-categories.update', $fileCategory->id], 'method' => 'PUT', 'id' => 'file_cateogry_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane podstawowe">
                <x-pages.form-card-row label="Nazwa" required>
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $fileCategory->name }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Prefix">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="prefix" id="prefix" value="{{ $fileCategory->prefix }}" placeholder="Wpisz Prefix">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop