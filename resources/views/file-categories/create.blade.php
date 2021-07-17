@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('file-categories.index') }}" />
	@can('create', App\Models\FileCategory::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('file_category_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'file-categories.store', 'method' => 'post', 'id' => 'file_category_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane podstawowe">
                <x-pages.form-card-row label="Nazwa">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Prefix">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="prefix" id="prefix" value="{{ old('prefix') }}" placeholder="Wpisz Prefix">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop