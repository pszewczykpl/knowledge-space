@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('post-categories.index') }}" />
	@can('update', $postCategory)
		<x-layout.toolbar.button action="edit" href="{{ route('post-categories.edit', $postCategory) }}" />
	@endcan
	@can('delete', $postCategory)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('post_categories_destroy_{{ $postCategory->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'post-categories.destroy', $postCategory ], 'id' => 'post_categories_destroy_' . $postCategory->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
    <x-pages.form>
        <x-pages.form-card title="Dane podstawowe">
            <x-pages.form-card-row label="Nazwa">
                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $postCategory->name }}" placeholder="Wpisz Nazwę" disabled>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Opis">
                <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" value="{{ $postCategory->description }}" placeholder="Wpisz Opis" disabled>
            </x-pages.form-card-row>
        </x-pages.form-card>
    </x-pages.form>
@stop