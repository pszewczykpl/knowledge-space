@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('notes.index') }}" />
	@can('update', $note)
		<x-layout.toolbar.button action="edit" href="{{ route('notes.edit', $note) }}" />
	@endcan
	@can('delete', $note)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('notes_destroy_{{ $note->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'notes.destroy', $note ], 'id' => 'notes_destroy_' . $note->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
    <x-pages.form>

        <x-pages.form-card title="Dane notatki">
            <x-pages.form-card-row label="Treść notatki">
                <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Wpisz Treść notatki" disabled>{{ $note->content }}</textarea>
            </x-pages.form-card-row>
        </x-pages.form-card>

        <x-pages.form-card title="Powiązania">
            <x-pages.form-card-row label="Ubezpieczenia Inwestycyjne">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="investment_id[]" id="investment_id[]">
                    @foreach($note->investments as $investment)
                        <option value="{{ $investment->id }}">{{ $investment->extended_name }} od {{ $investment->edit_date }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Ubezpieczenia Ochronne">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="protective_id[]" id="protective_id[]">
                    @foreach($note->protectives as $protective)
                        <option value="{{ $protective->id }}">{{ $protective->extended_name }} od {{ $protective->edit_date }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Ubezpieczenia Bancassurance">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]">
                    @foreach($note->bancassurances as $bancassurance)
                        <option value="{{ $bancassurance->id }}">{{ $bancassurance->extended_name }} od {{ $bancassurance->edit_date }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Ubezpieczenia Pracownicze">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="employee_id[]" id="employee_id[]">
                    @foreach($note->employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->extended_name }} od {{ $employee->edit_date }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Fundusze UFK">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="fund_id[]" id="fund_id[]">
                    @foreach($note->funds as $fund)
                        <option value="{{ $fund->id }}">{{ $fund->extended_name }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Partnerzy">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="partner_id[]" id="partner_id[]">
                    @foreach($note->partners as $partner)
                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Ryzyka ubezpieczeniowe">
                <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="risk_id[]" id="risk_id[]">
                    @foreach($note->risks as $risk)
                        <option value="{{ $risk->id }}">{{ $risk->name }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
        </x-pages.form-card>

    </x-pages.form>
@stop

@push('scripts')
@endpush