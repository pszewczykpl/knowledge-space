@extends('layouts.app')

@section('subheader')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
        <li class="breadcrumb-item">
            <span class="text-muted">Przeglądaj</span>
        </li>
    </ul>
@stop

@section('toolbar')
        <a href="{{ route('notes.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
        @can('update', $note)
        <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
        @endcan
        @can('delete', $note)
            <a onclick='document.getElementById("notes_destroy_{{ $note->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
            {{ Form::open([ 'method'  => 'delete', 'route' => [ 'notes.destroy', $note->id ], 'id' => 'notes_destroy_' . $note->id ]) }}{{ Form::close() }}
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
            <div class="tab-content">
                <div class="tab-pane active px-7" id="content" role="tabpanel">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <div class="form-group">
                                <label>Treść komentarza:</label>
                                <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Treść komentarza" disabled>{{ $note->content }}</textarea>
                            </div>   
                        </div>

                        <div class="col-12 col-md-8">
                            @include('svg.attachment', ['class' => 'svg-icon-primary svg-icon-2x'])
                            <span class="text-dark-50 font-weight-md font-size-lg">Załączniki</span>
                        </div>
                        <div class="col-12 col-md-8 pt-5">
                            @if($note->attachments()->count() > 0)
                                @foreach($note->attachments as $attachment)
                                    <div class="pb-3">
                                        <a href="{{ route('attachments.show', $attachment->id) }}" target="_blank" class="pr-3">
                                            <img src="{{ asset('/media/files/' . $attachment->extension . '.svg') }}" style="width: 24px;" title="{{ $attachment->name }}">
                                            <span class="text-dark-75 font-weight-bold pl-1 font-size-md">{{ $attachment->name }}</span>
                                        </a>
                                        <a onclick='document.getElementById("attachments_destroy_{{ $attachment->id }}").submit();' class="">
                                            <span class="text-danger pl-1 font-size-md">Usuń</span>
                                        </a>
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'attachments.destroy', $attachment->id ], 'id' => 'attachments_destroy_' . $attachment->id ]) }}{{ Form::close() }}
                                    </div>
                                @endforeach
                            @else
                                <span class="text-dark-50 font-weight-bold pl-1 font-size-md">Brak załączników</span>
                            @endif

                            @can('create', \App\Models\Attachment::class)
                                {!! Form::open(['route' => 'attachments.store', 'method' => 'post', 'files' => true, 'id' => 'attachment_store_form']) !!}
                                <div class="col-12 col-md-8 pt-3 pl-0 d-flex">
                                    <div>
                                        <input class="form-control form-control-sm form-control-solid" type="file" name="attachment" id="attachment" />
                                        <input type="hidden" id="attachmentable_id" name="attachmentable_id" value="{{ $note->id }}">
                                        <input type="hidden" id="attachmentable_type" name="attachmentable_type" value="App\Models\Note">
                                    </div>
                                    <a onclick='document.getElementById("attachment_store_form").submit();' class="btn btn-light-primary btn-sm ml-3">@include('svg.save', ['class' => 'navi-icon']) Dodaj załącznik</a>
                                </div>
                                {!! Form::close() !!}
                            @endcan
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
                                            Poniżej wskazane są obiekty w których widoczny jest komentarz.<br>
                                        </div>
									</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Ubezpieczenia Inwestycyjne:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="investment_id[]" id="investment_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->investments as $investment)
                                        <option value="{{ $investment->id }}" selected >{{ $investment->name }} ({{ $investment->code_toil }}) od {{ $investment->edit_date }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Ubezpieczenia inwestycyjne w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Ubezpieczenia Ochronne:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="protective_id[]" id="protective_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->protectives as $protective)
                                        <option value="{{ $protective->id }}" selected >{{ $protective->name }} ({{ $protective->edit_date }})</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Ubezpieczenia ochronne w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Ubezpieczenia Bancassurance:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->bancassurances as $bancassurance)
                                        <option value="{{ $bancassurance->id }}" selected >{{ $bancassurance->name }} ({{ $bancassurance->edit_date }})</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Ubezpieczenia bancassurance w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Ubezpieczenia Pracownicze:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="employee_id[]" id="employee_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->employees as $employee)
                                        <option value="{{ $employee->id }}" selected>{{ $employee->name }} ({{ $employee->edit_date }})</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Ubezpieczenia pracownicze w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Partnerzy:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="partner_id[]" id="partner_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->partners as $partner)
                                        <option value="{{ $partner->id }}" selected>{{ $partner->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Partnerzy w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Ryzyka Ubezpieczeniowe:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="risk_id[]" id="risk_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->risks as $risk)
                                        <option value="{{ $risk->id }}" selected>{{ $risk->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Ryzyka ubezpieczeniowe w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Fundusze UFK:</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="fund_id[]" id="fund_id[]" data-actions-box="true" data-live-search="true" disabled>
                                        @foreach($note->funds as $fund)
                                        <option value="{{ $fund->id }}" selected>{{ $fund->extended_name() }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Fundusze UFK w których widoczny jest komentarz.</span>
                                </div>
                            </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/notes/show.js') }}" type="text/javascript"></script>
@endpush