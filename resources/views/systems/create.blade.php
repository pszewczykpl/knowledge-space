@extends('layouts.app')

@section('subheader')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
        <li class="breadcrumb-item">
            <span class="text-muted">{{ $description }}</span>
        </li>
    </ul>
@stop

@section('toolbar')
        <a href="{{ route('systems.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Anuluj</a>
        @can('create', App\Models\System::class)
        <a onclick='document.getElementById("system_store_form").submit();' class="btn btn-light-primary btn-sm ml-1">@include('svg.save', ['class' => 'navi-icon']) Zapisz</a>
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
                                <span class="svg-icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"/>
                                            <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
        {!! Form::open(['route' => 'systems.store', 'method' => 'post', 'id' => 'system_store_form']) !!}
        <div class="tab-content">
            <div class="tab-pane active px-7" id="info" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane podstawowe:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" placeholder="Wpisz Nazwę" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">URL:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="url" id="url" placeholder="Wpisz URL" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Opis:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="description" id="description" placeholder="Wpisz Opis">
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