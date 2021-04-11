@extends('layouts.app')

@section('subheader')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
        <li class="breadcrumb-item">
            <span class="text-muted">{{ $description }}</span>
        </li>
    </ul>
@stop

@section('toolbar')
        <a href="{{ route('funds.show', $fund) }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Anuluj</a>
        @can('update', $fund)
            <a onclick='document.getElementById("fund_update_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) Zapisz</a>
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
                        <a class="nav-link active" data-toggle="tab" href="#info" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.fund', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
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
        {!! Form::open(['route' => ['funds.update', $fund->id], 'method' => 'PUT', 'id' => 'fund_update_form']) !!}
        <div class="tab-content">
            <div class="tab-pane active px-7" id="info" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane funduszu:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $fund->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Symbol:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $fund->code }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Waluta:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="currency" id="currency" value="{{ $fund->currency }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Typ:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" name="type" id="type" value="{{ $fund->type }}">
                                    <option value="Z" @if($fund->status == 'Z') selected @endif>Inwestycyjny</option>
                                    <option value="D" @if($fund->status == 'D') selected @endif>Depozytowy</option>
                                    <option value="M" @if($fund->status == 'M') selected @endif>Modelowy</option>
                                    <option value="U" @if($fund->status == 'U') selected @endif>UFK</option>
                                    <option value="S" @if($fund->status == 'S') selected @endif>SOK</option>
                                    <option value="T" @if($fund->status == 'T') selected @endif>Tracker</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Data udostępnienia:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid datepicker" style="width: 100% !important;" type="text" name="start_date" id="start_date" readonly value="{{ $fund->start_date }}">
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Status:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Status funduszu:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" name="status" id="status" value="{{ $fund->status }}">
                                    <option value="A" @if($fund->status == 'A') selected @endif>Aktywny</option>
                                    <option value="N" @if($fund->status == 'N') selected @endif>Nieaktywny</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Data likwidacji:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid datepicker" style="width: 100% !important;" type="text" name="cancel_date" id="cancel_date" value="{{ $fund->cancel_date }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Powód likwidacji:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="cancel_reason" id="cancel_reason" value="{{ $fund->cancel_reason }}">
                            </div>
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
                                        Poniżej należy wskazać ubezpieczenia inwestycyjne w których ma pojawić się fundusz.<br>
                                        Jeśli chcesz usunąć widoczność funduszu w którymkolwiek z ubezpieczeń inwestycyjnych - odznacz wybrane ubezpieczenie na liście. 
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4 text-left">Ubezpieczenia Inwestycyjne</label>
                            <div class="col-8">
                                <?php $fund_investments_id = array(); foreach($fund->investments as $invest) { array_push($fund_investments_id, $invest->id); } ?>
                                <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="investment_id[]" id="investment_id[]" data-actions-box="true" data-live-search="true">
                                    @foreach($investments as $investment)
                                    <option value="{{ $investment->id }}" {{ in_array($investment->id, $fund_investments_id ?: []) ? "selected": "" }} >{{ $investment->name }} ({{ $investment->code_toil }}) od {{ $investment->edit_date }}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Wskaż ubezpieczenia inwestycyjne w których ma pojawić się fundusz.</span>
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
<script src="{{ asset('js/pages/funds/edit.js') }}" type="text/javascript"></script>
@endpush