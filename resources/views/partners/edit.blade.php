@extends('layouts.app')

@section('subheader')
    <x-layout.subheader :description="$description" />
@stop

@section('toolbar')
        <a href="{{ route('partners.show', $partner) }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Anuluj</a>
        @can('update', $partner)
            <a onclick='document.getElementById("partner_update_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) Zapisz</a>
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
                                @include('svg.partner', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
        {!! Form::open(['route' => ['partners.update', $partner->id], 'method' => 'PUT', 'id' => 'partner_update_form']) !!}
        <div class="tab-content">
            <div class="tab-pane active px-7" id="info" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane partnera:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $partner->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $partner->code }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Typ:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" name="type" id="type" value="{{ $partner->type }}">
                                    <option value="Dystrybutor" @if($partner->type == 'Dystrybutor') selected @endif>Dystrybutor</option>
                                    <option value="Multiagencja" @if($partner->type == 'Multiagencja') selected @endif>Multiagencja</option>
                                    <option value="Agent" @if($partner->type == 'Agent') selected @endif>Agent</option>
                                    <option value="Broker" @if($partner->type == 'Broker') selected @endif>Broker</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">NIP:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="nip" id="nip" value="{{ $partner->nip }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">REGON:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="regon" id="regon" value="{{ $partner->regon }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Numer RAU/P:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="number_rau" id="number_rau" value="{{ $partner->number_rau }}">
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