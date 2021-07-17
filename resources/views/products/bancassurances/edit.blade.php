@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('bancassurances.show', $bancassurance) }}" />
	@can('update', $bancassurance)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('bancassurance_update_form').submit();" />
	@endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['bancassurances.update', $bancassurance->id], 'method' => 'PUT', 'id' => 'bancassurance_update_form']) !!}
        {!! Form::token() !!}
        
            <x-pages.form-card title="Dane produktu">
                <x-pages.form-card-row label="Nazwa produktu">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $bancassurance->name }}" placeholder="Wpisz Nazwę produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod produktu">
                    <input class="form-control form-control-lg form-control-solid" type="number" name="code" id="code" value="{{ $bancassurance->code }}" placeholder="Wpisz Kod produktu">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod OWU">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="code_owu" id="code_owu" value="{{ $bancassurance->code_owu }}" placeholder="Wpisz Kod OWU">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Subskrypcja">
                    <input class="form-control form-control-lg form-control-solid" type="number" name="subscription" id="subscription" value="{{ $bancassurance->subscription }}" placeholder="Wpisz Subskrypcję">
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Dane dystrybutora">
                <x-pages.form-card-row label="Nazwa dystrybutora">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="dist" id="dist" value="{{ $bancassurance->dist }}" placeholder="Wpisz Nazwę dystrybutora">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Kod dystrybutora">
                    <input class="form-control form-control-lg form-control-solid" type="text" name="dist_short" id="dist_short" value="{{ $bancassurance->dist_short }}" placeholder="Wpisz Kod dystrybutora">
                </x-pages.form-card-row>
            </x-pages.form-card>

            <x-pages.form-card title="Dane kompletu dokumentów">
                <x-pages.form-card-row label="Dokumenty ważne od">
                    <input class="form-control form-control-lg form-control-solid datepicker" type="text" name="edit_date" id="edit_date" value="{{ $bancassurance->edit_date }}" placeholder="Wybierz Datę pooczątku obowiązywania dokumentów">
                </x-pages.form-card-row>
                <x-pages.form-card-row label="Status dokumentów">
                    <select class="form-control form-control-lg form-control-solid" name="status" id="status">
                        <option value="A" @if($bancassurance->status == 'A') selected @endif>Aktywne</option>
                        <option value="N" @if($bancassurance->status == 'N') selected @endif>Archiwalne</option>
                    </select>
                </x-pages.form-card-row>
            </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop

@push('scripts')
    <script src="{{ asset('js/pages/products/bancassurances/edit.js') }}" type="text/javascript"></script>
    <script>
        $("#edit_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: "YYYY-MM-DD"
            }
        });
    </script>
@endpush