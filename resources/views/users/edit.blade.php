@extends('layouts.app')

@section('subheader')
    <x-layout.subheader :description="$description" />
@stop

@section('toolbar')
        <a href="{{ route('users.show', $user) }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Anuluj</a>
        @can('update', $user)
            <a onclick='document.getElementById("user_update_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) Zapisz</a>
        @endcan
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-4">
            <x-cards.user :user="$user" />
        </div>
        <div class="col-12 col-md-8">
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
                    {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true, 'id' => 'user_update_form']) !!}
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
												<div class="image-input-wrapper" style="background-image: url({{ Storage::url($user->avatar_path ?? 'avatars/default.jpg') }})"></div>
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
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->first_name }}" name="first_name" id="first_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Nazwisko:</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->last_name }}" name="last_name" id="last_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">E-mail:</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->email }}" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Telefon:</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->phone }}" name="phone" id="phone">
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
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->company }}" name="company" id="company">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Lokalizacja:</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->location }}" name="location" id="location">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Departament:</label>
                                        <div class="col-9">
                                            <select class="form-control form-control-lg form-control-solid" name="department_id" id="department_id" value="{{ $user->department_id }}">
                                                @foreach($departments as $department)
                                                <option value="{{ $department->id }}" @if($user->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Stanowisko:</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->position }}" name="position" id="position">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Opis:</label>
                                        <div class="col-9">
                                            <textarea class="form-control form-control-lg form-control-solid" rows="4" name="description" id="description">{{ $user->description }}</textarea>
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
                                            <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="text" value="{{ $user->username }}" name="username" id="username">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-3 text-lg-right text-left">Hasło:</label>
                                        <div class="col-9">
                                            <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="password" name="new_password" id="new_password">
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed my-10"></div>
                                    <div class="row">
                                        <label class="col-3"></label>
                                        <div class="col-9">
                                            <h6 class="text-dark font-weight-bold mb-6">Usuwanie konta:</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-custom alert-light-danger mb-5" role="alert">
                                                <div class="alert-icon">
                                                    <i class="flaticon-warning"></i>
                                                </div>
                                                <div class="alert-text">
                                                    <b>Uwaga!</b><br>
                                                    Wraz z kontem pracownika zostaną również usunięte wszystkie obiekty utworzone przez pracownika tj.<br>
                                                    Produkty Inwestycyjne <b>({{ $user->investments->count() }})</b><br>
                                                    Produkty Ochronne <b>({{ $user->protectives->count() }})</b><br>
                                                    Produkty Bancassurance <b>({{ $user->bancassurances->count() }})</b><br>
                                                    Produkty Pracownicze <b>({{ $user->employees->count() }})</b><br>
                                                    Partnerzy <b>({{ $user->partners->count() }})</b><br>
                                                    Ryzyka Ubezpieczeniowe <b>({{ $user->risks->count() }})</b><br>
                                                    Fundusze <b>({{ $user->funds->count() }})</b><br>
                                                    Aktualności <b>({{ $user->news->count() }})</b><br>
                                                    Odpowiedzi <b>({{ $user->replies->count() }})</b><br>
                                                    Notatki <b>({{ $user->notes->count() }})</b><br>
                                                    Dokumenty <b>({{ $user->files->count() }})</b><br>
                                                    Kategorie dokumentów <b>({{ $user->file_categories->count() }})</b><br>
                                                    Departamenty <b>({{ $user->file_categories->count() }})</b><br>
                                                    Systemy <b>({{ $user->systems->count() }})</b><br>
                                                    Artykuły <b>({{ $user->posts->count() }})</b><br>
                                                    Kategorie artykułów <b>({{ $user->post_categories->count() }})</b><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">    
                                        <div class="col-12 text-right">
                                            @if(Auth::user()->can('delete', $user))
                                            <a onclick='document.getElementById("users_destroy_{{ $user->id }}").submit();' class="btn btn-md btn-light-danger btn-shadow font-weight-bold ml-1">
                                            @else
                                            <a class="btn btn-md btn-light-danger btn-shadow font-weight-bold ml-1 disabled">
                                            @endif
                                                <span class="svg-icon navi-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
                                                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                                Usuń Konto
                                            </a>
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
                                                    Uprawnienia można w każdej chwili edytować. Jeśli chcesz usunąć uprawnienie - odznacz je na liście. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-4 text-left">Uprawnienia</label>
                                        <div class="col-8">
                                            <?php $user_permissions_id = array(); foreach($user->permissions as $permiss) { array_push($user_permissions_id, $permiss->id); } ?>
                                            <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="permission_id[]" id="permission_id[]" data-actions-box="true" data-live-search="true">
                                                @foreach($permissions as $permission)
                                                <option value="{{ $permission->id }}" {{ in_array($permission->id, $user_permissions_id ?: []) ? "selected": "" }} >{{ $permission->name }}</option>
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
                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', $user->id ], 'id' => 'users_destroy_' . $user->id ]) }}{{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/users/edit.js') }}" type="text/javascript"></script>
@endpush