@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('post-categories.index') }}" />
	@can('create', App\Models\PostCategory::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('post_category_store_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => 'post-categories.store', 'method' => 'post', 'id' => 'post_category_store_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane podstawowe">
                <x-pages.form-card-row label="Nazwa">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Wpisz Nazwę">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Opis">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ old('description') }}" placeholder="Wpisz Opis">
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop