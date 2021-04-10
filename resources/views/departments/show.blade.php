@extends('layouts.app')

@section('subheader')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
        <li class="breadcrumb-item">
            <span class="text-muted">Przeglądaj</span>
        </li>
    </ul>
@stop

@section('toolbar')
        <a href="{{ route('departments.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $department)
			<a href="{{ route('departments.edit', $department->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $department)
			<a onclick='document.getElementById("departments_destroy_{{ $department->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'departments.destroy', $department->id ], 'id' => 'departments_destroy_' . $department->id ]) }}{{ Form::close() }}
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
                                            <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"/>
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
            <div class="tab-content">
                <div class="tab-pane active px-7" id="info" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">Dane departamentu:</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Nazwa:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $department->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Kod:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" value="{{ $department->code }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Opis departamentu:</label>
                                <div class="col-9">
                                    <textarea class="form-control form-control-lg form-control-solid" rows="4" name="description" id="description" disabled>{{ $department->description }}</textarea>
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