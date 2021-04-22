@extends('layouts.app')

@section('subheader')
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
        <li class="breadcrumb-item">
            <span class="text-muted">Przeglądaj</span>
        </li>
    </ul>
@stop

@section('toolbar')
        <a href="{{ route('file-categories.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
        @can('update', $fileCategory)
        <a href="{{ route('file-categories.edit', $fileCategory->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
        @endcan
        @can('delete', $fileCategory)
            <a onclick='document.getElementById("file_categories_destroy_{{ $fileCategory->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
            {{ Form::open([ 'method'  => 'delete', 'route' => [ 'file-categories.destroy', $fileCategory->id ], 'id' => 'file_categories_destroy_' . $fileCategory->id ]) }}{{ Form::close() }}
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
                                @include('svg.file-category', ['class' => 'mr-2'])
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
								<h6 class="text-dark font-weight-bold mb-10">Dane podstawowe:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $fileCategory->name }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-9">
                                <div class="alert alert-custom alert-light-primary mb-5" role="alert">
									<div class="alert-icon">
										<i class="flaticon-info"></i>
									</div>
									<div class="alert-text">
                                        Prefix jest dodawany przed nazwą dokumentu przypisanego do tej kategorii przy generowaniu archiwum <b>.zip</b><br>
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Prefix:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="prefix" id="prefix" value="{{ $fileCategory->prefix }}" disabled>
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