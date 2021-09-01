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
                    <select class="form-select form-select-lg form-select-solid select2-multi" multiple="multiple" name="permission_id[]" id="permission_id[]">
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