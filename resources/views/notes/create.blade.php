@extends('layouts.app')

@section('subheader')
    <x-layout.subheader :description="$description" />
@stop

@section('toolbar')
        <a href="{{ route('notes.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) {{ __('Cancel') }}</a>
        @can('create', App\Models\Note::class)
        <a onclick='document.getElementById("note_store_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) {{ __('Save') }}</a>
        @endcan
@stop

@section('content')
<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    </div>
    @endif
    <div class="card card-custom gutter-bs">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#content" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.note', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Notatka</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#relations" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.association', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Powiązania</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
            {!! Form::open(['route' => 'notes.store', 'method' => 'post', 'id' => 'note_store_form']) !!}
                <div class="tab-content">
                    <div class="tab-pane active px-7" id="content" role="tabpanel">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label>Treść komentarza:</label>
                                    <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Treść komentarza"></textarea>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane px-7" id="relations" role="tabpanel">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-custom alert-light-primary mb-5" role="alert">
											<div class="alert-icon">
												<i class="flaticon-info"></i>
											</div>
											<div class="alert-text">
                                                Poniżej należy wskazać obiekty w których ma pojawić się komentarz.<br>
                                                Jeśli chcesz usunąć widoczność komentarza w którymkolwiek z obiektów - odznacz wybrany obiekt na liście. 
                                            </div>
										</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Inwestycyjne:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="investment_id[]" id="investment_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($investments as $investment)
                                            <option value="{{ $investment->id }}">{{ $investment->name }} ({{ $investment->code_toil }}) od {{ $investment->edit_date }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia inwestycyjne w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Ochronne:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="protective_id[]" id="protective_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($protectives as $protective)
                                            <option value="{{ $protective->id }}">{{ $protective->name }} ({{ $protective->edit_date }})</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia ochronne w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Bancassurance:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($bancassurances as $bancassurance)
                                            <option value="{{ $bancassurance->id }}">{{ $bancassurance->name }} ({{ $bancassurance->edit_date }})</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia bancassurance w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Pracownicze:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="employee_id[]" id="employee_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }} ({{ $employee->edit_date }})</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia pracownicze w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Partnerzy:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="partner_id[]" id="partner_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($partners as $partner)
                                            <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż partnerów w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ryzyka Ubezpieczeniowe:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="risk_id[]" id="risk_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($risks as $risk)
                                            <option value="{{ $risk->id }}">{{ $risk->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ryzyka ubezpieczeniowe w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Fundusze UFK:</label>
                                    <div class="col-8">
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="fund_id[]" id="fund_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($funds as $fund)
                                            <option value="{{ $fund->id }}">{{ $fund->extended_name() }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż fundusze UFK w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/notes/create.js') }}" type="text/javascript"></script>
@endpush