@extends('layouts.app')

@section('subheader')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
        <li class="breadcrumb-item">
            <span class="text-muted">{{ $description }}</span>
        </li>
    </ul>
@stop

@section('toolbar')
        <a href="{{ route('notes.show', $note) }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Anuluj</a>
        @can('update', $note)
            <a onclick='document.getElementById("note_update_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) Zapisz</a>
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
                                <span class="svg-icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
                                            <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-text font-weight-bold">Powiązania</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
            {!! Form::open(['route' => ['notes.update', $note->id], 'method' => 'PUT', 'id' => 'note_update_form']) !!}
                <div class="tab-content">
                    <div class="tab-pane active px-7" id="content" role="tabpanel">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <div class="form-group">
                                    <label>Treść komentarza:</label>
                                    <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Treść komentarza">{{ $note->content }}</textarea>
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
                                        @php $note_investment = $note->investments->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="investment_id[]" id="investment_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($investments as $investment)
                                            <option value="{{ $investment->id }}" {{ in_array($investment->id, $note_investment) ? "selected": "" }}>{{ $investment->fullname() }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia inwestycyjne w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Ochronne:</label>
                                    <div class="col-8">
                                        @php $note_protective = $note->protectives->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="protective_id[]" id="protective_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($protectives as $protective)
                                            <option value="{{ $protective->id }}" {{ in_array($protective->id, $note_protective) ? "selected": "" }}>{{ $protective->extended_name() }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia ochronne w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Bancassurance:</label>
                                    <div class="col-8">
                                        @php $note_bancassurance = $note->bancassurances->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($bancassurances as $bancassurance)
                                            <option value="{{ $bancassurance->id }}" {{ in_array($bancassurance->id, $note_bancassurance) ? "selected": "" }}>{{ $bancassurance->extended_name() }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia bancassurance w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ubezpieczenia Pracownicze:</label>
                                    <div class="col-8">
                                        @php $note_employee = $note->employees->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="employee_id[]" id="employee_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ in_array($employee->id, $note_employee) ? "selected": "" }}>{{ $employee->extended_name() }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ubezpieczenia pracownicze w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Partnerzy:</label>
                                    <div class="col-8">
                                        @php $note_partner = $note->partners->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="partner_id[]" id="partner_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($partners as $partner)
                                            <option value="{{ $partner->id }}" {{ in_array($partner->id, $note_partner) ? "selected": "" }}>{{ $partner->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż partnerów w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Ryzyka Ubezpieczeniowe:</label>
                                    <div class="col-8">
                                        @php $note_risk = $note->risks->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="risk_id[]" id="risk_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($risks as $risk)
                                            <option value="{{ $risk->id }}" {{ in_array($risk->id, $note_risk) ? "selected": "" }}>{{ $risk->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Wskaż ryzyka ubezpieczeniowe w których ma pojawić się komentarz.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-4 text-left">Fundusze UFK:</label>
                                    <div class="col-8">
                                        @php $note_fund = $note->funds->pluck('id')->toArray(); @endphp
                                        <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="fund_id[]" id="fund_id[]" data-actions-box="true" data-live-search="true">
                                            @foreach($funds as $fund)
                                            <option value="{{ $fund->id }}" {{ in_array($fund->id, $note_fund) ? "selected": "" }}>{{ $fund->extended_name() }}</option>
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
<script src="{{ asset('js/pages/notes/edit.js') }}" type="text/javascript"></script>
@endpush