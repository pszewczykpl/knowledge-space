{{--@section('content')--}}
{{--
{{--
{{--
{{--
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-form-label col-3 text-lg-right text-left">Login:</label>--}}
{{--                                        <div class="col-9">--}}
{{--                                            <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="text" value="{{ $user->username }}" name="username" id="username">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-form-label col-3 text-lg-right text-left">Hasło:</label>--}}
{{--                                        <div class="col-9">--}}
{{--                                            <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="password" name="new_password" id="new_password">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="separator separator-dashed my-10"></div>--}}
{{--                                    <div class="row">--}}
{{--                                        <label class="col-3"></label>--}}
{{--                                        <div class="col-9">--}}
{{--                                            <h6 class="text-dark font-weight-bold mb-6">Usuwanie konta:</h6>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="alert alert-custom alert-light-danger mb-5" role="alert">--}}
{{--                                                <div class="alert-icon">--}}
{{--                                                    <i class="flaticon-warning"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="alert-text">--}}
{{--                                                    <b>Uwaga!</b><br>--}}
{{--                                                    Wraz z kontem pracownika zostaną również usunięte wszystkie obiekty utworzone przez pracownika tj.<br>--}}
{{--                                                    Produkty Inwestycyjne <b>({{ $user->investments->count() }})</b><br>--}}
{{--                                                    Produkty Ochronne <b>({{ $user->protectives->count() }})</b><br>--}}
{{--                                                    Produkty Bancassurance <b>({{ $user->bancassurances->count() }})</b><br>--}}
{{--                                                    Produkty Pracownicze <b>({{ $user->employees->count() }})</b><br>--}}
{{--                                                    Partnerzy <b>({{ $user->partners->count() }})</b><br>--}}
{{--                                                    Ryzyka Ubezpieczeniowe <b>({{ $user->risks->count() }})</b><br>--}}
{{--                                                    Fundusze <b>({{ $user->funds->count() }})</b><br>--}}
{{--                                                    Aktualności <b>({{ $user->news->count() }})</b><br>--}}
{{--                                                    Odpowiedzi <b>({{ $user->replies->count() }})</b><br>--}}
{{--                                                    Notatki <b>({{ $user->notes->count() }})</b><br>--}}
{{--                                                    Dokumenty <b>({{ $user->files->count() }})</b><br>--}}
{{--                                                    Kategorie dokumentów <b>({{ $user->fileCategories->count() }})</b><br>--}}
{{--                                                    Departamenty <b>({{ $user->departments->count() }})</b><br>--}}
{{--                                                    Systemy <b>({{ $user->systems->count() }})</b><br>--}}
{{--                                                    Artykuły <b>({{ $user->posts->count() }})</b><br>--}}
{{--                                                    Kategorie artykułów <b>({{ $user->postCategories->count() }})</b><br>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">    --}}
{{--                                        <div class="col-12 text-right">--}}
{{--                                            @if(Auth::user()->can('delete', $user))--}}
{{--                                            <a onclick='document.getElementById("users_destroy_{{ $user->id }}").submit();' class="btn btn-md btn-light-danger btn-shadow font-weight-bold ml-1">--}}
{{--                                            @else--}}
{{--                                            <a class="btn btn-md btn-light-danger btn-shadow font-weight-bold ml-1 disabled">--}}
{{--                                            @endif--}}
{{--                                                <span class="svg-icon navi-icon">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                            <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                                            <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>--}}
{{--                                                            <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>--}}
{{--                                                        </g>--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}
{{--                                                Usuń Konto--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane px-7" id="permissions" role="tabpanel">--}}
{{--                            <div class="row justify-content-center">--}}
{{--                                <div class="col-12 col-md-8">--}}
{{--                                    @can('update', App\Models\Permission::class)--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="alert alert-custom alert-light-primary mb-5" role="alert">--}}
{{--                                                <div class="alert-icon">--}}
{{--                                                    <i class="flaticon-info"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="alert-text">--}}
{{--                                                    Poniżej należy wskazać uprawnienia, które ma posiadać pracownik.<br>--}}
{{--                                                    Uprawnienia można w każdej chwili edytować. Jeśli chcesz usunąć uprawnienie - odznacz je na liście. --}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-form-label col-4 text-left">Uprawnienia</label>--}}
{{--                                        <div class="col-8">--}}
{{--                                            <?php $user_permissions_id = array(); foreach($user->permissions as $permiss) { array_push($user_permissions_id, $permiss->id); } ?>--}}
{{--                                            <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="permission_id[]" id="permission_id[]" data-actions-box="true" data-live-search="true">--}}
{{--                                                @foreach($permissions as $permission)--}}
{{--                                                <option value="{{ $permission->id }}" {{ in_array($permission->id, $user_permissions_id ?: []) ? "selected": "" }} >{{ $permission->name }}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}
{{--                                            <span class="form-text text-muted">Wskaż uprawnienia które ma posiadać pracownik.</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @else--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-12">--}}
{{--                                            <div class="alert alert-custom alert-light-danger mb-5" role="alert">--}}
{{--                                                <div class="alert-icon">--}}
{{--                                                    <i class="flaticon-info"></i>--}}
{{--                                                </div>--}}
{{--                                                <div class="alert-text">--}}
{{--                                                    Nie posiadasz uprawnień do edycji uprawnień pracownikom--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    @endcan--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {!! Form::close() !!}--}}
{{--                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', $user->id ], 'id' => 'users_destroy_' . $user->id ]) }}{{ Form::close() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--@stop--}}



@extends('layouts.app')

@section('toolbar')
    <x-layout.toolbar.button action="cancel" href="{{ route('users.show', $user) }}" />
    @can('update', $user)
        <x-layout.toolbar.button action="save" onclick="document.getElementById('user_update_form').submit();" />
    @endcan
@stop

@section('content')
    <x-pages.form>
        {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'files' => true, 'id' => 'user_update_form']) !!}
        {!! Form::token() !!}

        <x-pages.form-card title="Dane użytkownika">
            <x-pages.form-card-row label="Avatar">
{{--                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" value="{{ $fund->name }}" placeholder="Wpisz Nazwa wyświetlana">--}}
                Upload avatarów chwilowo niedostępny
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Imię">
                <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="Wpisz Imię">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Nazwisko">
                <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" placeholder="Wpisz Nazwisko">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="E-mail">
                <input class="form-control form-control-lg form-control-solid" type="text" name="email" id="email" value="{{ $user->email }}" placeholder="Wpisz E-mail">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Telefon">
                <input class="form-control form-control-lg form-control-solid" type="text" name="phone" id="phone" value="{{ $user->phone }}" placeholder="Wpisz Telefon">
            </x-pages.form-card-row>
        </x-pages.form-card>

        <x-pages.form-card title="Praca">
            <x-pages.form-card-row label="Nazwa firmy">
                <input class="form-control form-control-lg form-control-solid" type="text" name="company" id="company" value="{{ $user->company }}" placeholder="Wpisz Nazwa firmy">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Lokalizacja firmy">
                <input class="form-control form-control-lg form-control-solid" type="text" name="location" id="location" value="{{ $user->location }}" placeholder="Wpisz Lokalizacja firmy">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Departament">
                <select class="form-control form-control-lg form-control-solid" name="department_id" id="department_id">
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" @if($user->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Stanowisko">
                <input class="form-control form-control-lg form-control-solid" type="text" name="position" id="position" value="{{ $user->position }}" placeholder="Wpisz Stanowisko">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Opis stanowiska">
                <textarea class="form-control form-control-lg form-control-solid" name="description" id="description" rows="3" placeholder="Wpisz Opis stanowiska">{{ $user->description }}</textarea>
            </x-pages.form-card-row>
        </x-pages.form-card>

        <x-pages.form-card title="Konto">
            <x-pages.form-card-row label="Login">
                <input class="form-control form-control-lg form-control-solid" type="text" name="username" id="username" value="{{ $user->username }}" placeholder="Wpisz Login">
            </x-pages.form-card-row>
            @can('update', App\Models\Permission::class)
                <x-pages.form-card-row label="Uprawnienia">
                    @php $user_permissions = $user->permissions->pluck('id')->toArray(); @endphp
                    <select class="form-select form-select-lg form-select-solid" multiple="multiple" name="permission_id[]" id="permission_id[]">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}" {{ in_array($permission->id, $user_permissions) ? "selected": "" }}>{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </x-pages.form-card-row>
            @endcan
        </x-pages.form-card>

        {!! Form::close() !!}
    </x-pages.form>
@stop