@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $description }}</span>
			</li>
		</ul>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ url()->previous() }}" class="btn btn-md btn-clean btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
						<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
					</g>
				</svg>
			</span>
			Anuluj
		</a>
        @can('update', $user)
        <a onclick='document.getElementById("user_update_form").submit();' class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                    </g>
                </svg>
			</span>
			Zapisz
		</a>
        @endcan
	</div>
</div>
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
                                        <span class="svg-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Personalne</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#account" role="tab">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"/>
                                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Konto</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#permissions" role="tab">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <mask fill="white">
                                                        <use xlink:href="#path-1"/>
                                                    </mask>
                                                    <g/>
                                                    <path d="M15.6274517,4.55882251 L14.4693753,6.2959371 C13.9280401,5.51296885 13.0239252,5 12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L14,10 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C13.4280904,3 14.7163444,3.59871093 15.6274517,4.55882251 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                        </span>
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

@section('additional_scripts')
<script src="{{ asset('js/pages/users/edit.js') }}" type="text/javascript"></script>
@stop