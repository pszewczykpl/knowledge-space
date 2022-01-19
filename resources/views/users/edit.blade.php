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
    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-size: 100%; background-image: url('{{ Storage::url('avatars/default.jpg') }}')">
        <div class="image-input-wrapper w-125px h-125px bgi-position-center" style="background-size: 100%; background-image: url('{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}')"></div>
        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Edytuj avatar">
            @include('svg.edit', ['class' => 'svg-icon svg-icon-3'])
            <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" />
            <input type="hidden" name="avatar_remove" id="avatar_remove" />
        </label>
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Anuluj avatar">
			@include('svg.trash', ['class' => 'svg-icon svg-icon-3'])
		</span>
        @if(auth()->user()->avatar_path)
        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Usuń avatar">
			@include('svg.trash', ['class' => 'svg-icon svg-icon-3'])
		</span>
        @endif
    </div>
    <div class="form-text">Dozwolone pliki: png, jpg, jpeg.</div>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Imię" required>
                <input class="form-control form-control-lg form-control-solid" type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="Wpisz Imię">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Nazwisko" required>
                <input class="form-control form-control-lg form-control-solid" type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" placeholder="Wpisz Nazwisko">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="E-mail" required>
                <input class="form-control form-control-lg form-control-solid" type="text" name="email" id="email" value="{{ $user->email }}" placeholder="Wpisz E-mail">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Telefon">
                <input class="form-control form-control-lg form-control-solid" type="text" name="phone" id="phone" value="{{ $user->phone }}" placeholder="Wpisz Telefon">
            </x-pages.form-card-row>
        </x-pages.form-card>

        <x-pages.form-card title="Praca">
            <x-pages.form-card-row label="Nazwa firmy" required>
                <input class="form-control form-control-lg form-control-solid" type="text" name="company" id="company" value="{{ $user->company }}" placeholder="Wpisz Nazwa firmy">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Lokalizacja firmy" required>
                <input class="form-control form-control-lg form-control-solid" type="text" name="location" id="location" value="{{ $user->location }}" placeholder="Wpisz Lokalizacja firmy">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Departament" required>
                <select class="form-control form-control-lg form-control-solid" name="department_id" id="department_id">
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}" @if($user->department_id == $department->id) selected @endif>{{ $department->name }}</option>
                    @endforeach
                </select>
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Stanowisko" required>
                <input class="form-control form-control-lg form-control-solid" type="text" name="position" id="position" value="{{ $user->position }}" placeholder="Wpisz Stanowisko">
            </x-pages.form-card-row>
            <x-pages.form-card-row label="Opis stanowiska">
                <textarea class="form-control form-control-lg form-control-solid" name="description" id="description" rows="3" placeholder="Wpisz Opis stanowiska">{{ $user->description }}</textarea>
            </x-pages.form-card-row>
        </x-pages.form-card>

        <x-pages.form-card title="Konto">
            <x-pages.form-card-row label="Login" required>
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