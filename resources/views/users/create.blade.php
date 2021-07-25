@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('users.index') }}" />
	@can('create', App\Models\User::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('user_store_form').submit();" />
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
                                @include('svg.user', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Personalne</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#account" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.account', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Konto</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#permissions" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.permissions', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Uprawnienia</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
            {!! Form::open(['route' => 'users.store', 'method' => 'post', 'files' => true, 'id' => 'user_store_form']) !!}
            <div class="tab-content">
                <div class="tab-pane active px-7" id="info" role="tabpanel">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">Dane użytkownika:</h6>
                                </div>
                            </div>
                            <div class="form-group row">
								<label class="col-xl-3 col-lg-3 text-right col-form-label">Avatar</label>
								<div class="col-lg-9 col-xl-9">
									<div class="image-input image-input-outline image-input-circle" id="kt_user_avatar">
										<div class="image-input-wrapper" style="background-image: url({{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }})"></div>
										<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Zmień avatar">
											<i class="fa fa-pen icon-sm text-muted"></i>
											<input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" />
											<input type="hidden" name="avatar_remove" />
										</label>
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Usuń avatar">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
										<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Usuń avatar">
											<i class="ki ki-bold-close icon-xs text-muted"></i>
										</span>
									</div>
								</div>
							</div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Imię:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" id="first_name" placeholder="Wpisz Imię">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Nazwisko:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" id="last_name" placeholder="Wpisz Nazwisko">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">E-mail:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="email" name="email" id="email" placeholder="Wpisz E-mail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Telefon:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="phone" id="phone" placeholder="Wpisz Telefon">
                                </div>
                            </div>
                            <div class="separator separator-dashed my-10"></div>
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">Praca:</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Nazwa firmy:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="company" id="company" value="Open Life TU Życie S.A." placeholder="Wpisz Nazwa firmy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Lokalizacja:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="location" id="location" value="Warszawa" placeholder="Wpisz Lokalizacja">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Departament:</label>
                                <div class="col-9">
                                    <select class="form-control form-control-lg form-control-solid" name="department_id" id="department_id">
                                        @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Stanowisko:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" type="text" name="position" id="position" value="Specjalista" placeholder="Wpisz Stanowisko">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Opis stanowiska pracy:</label>
                                <div class="col-9">
                                    <textarea class="form-control form-control-lg form-control-solid" rows="4" name="description" id="description" placeholder="Opisz krótko swoje stanowisko pracy :-) Czym się zajmujesz?"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane px-7" id="account" role="tabpanel">
                    <div class="row">
                        <div class="col-xl-2"></div>
                        <div class="col-xl-7 my-2">
                            <div class="row">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <h6 class="text-dark font-weight-bold mb-10">Dane konta:</h6>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Login:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="text" name="username" id="username" placeholder="Wpisz Login">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-3 text-lg-right text-left">Hasło:</label>
                                <div class="col-9">
                                    <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="password" name="new_password" id="new_password" placeholder="Wpisz Hasło">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane px-7" id="permissions" role="tabpanel">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-8">
                            @can('update', App\Models\Permission::class)
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-custom alert-light-primary mb-5" role="alert">
                                        <div class="alert-icon">
                                            <i class="flaticon-info"></i>
                                        </div>
                                        <div class="alert-text">
                                            Poniżej należy wskazać uprawnienia, które ma posiadać pracownik.<br>
                                            Uprawnienia można w każdej chwili edytować. Jeśli chcesz dodać uprawnienie - zaznacz je na liście. 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-4 text-left">Uprawnienia</label>
                                <div class="col-8">
                                    <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="permission_id[]" id="permission_id[]" data-actions-box="true" data-live-search="true">
                                        @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="form-text text-muted">Wskaż uprawnienia które ma posiadać pracownik.</span>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-custom alert-light-danger mb-5" role="alert">
                                        <div class="alert-icon">
                                            <i class="flaticon-info"></i>
                                        </div>
                                        <div class="alert-text">
                                            Nie posiadasz uprawnień do edycji uprawnień pracownikom
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop