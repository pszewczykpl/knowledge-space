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
		<a href="{{ route('users.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $user)
			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $user)
			<a onclick='document.getElementById("users_destroy_{{ $user->id }}").submit();' class="btn btn-light-danger btn-sm">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', $user->id ], 'id' => 'users_destroy_' . $user->id ]) }}{{ Form::close() }}
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
            @auth
			@if(Auth::user()->can('create', App\Models\News::class) and $user->id == Auth::user()->id)
				<x-cards.news-store />
			@endif
			@endauth
				@if($user->news->count() == 0)
					<div class="alert alert-custom alert-white shadow-sm fade show text-center" role="alert">
						@auth
						@if($user->id == Auth::user()->id)
							<div class="alert-text">Nie posiadasz żadnych aktualności... Napisz swoją pierwszą!</div>
						@else
							<div class="alert-text">Użytkownik nie posiada żadnych aktualności...</div>
						@endif
						@else
							<div class="alert-text">Użytkownik nie posiada żadnych aktualności...</div>
							@endauth
					</div>
				@else
					@foreach($user->news()->orderBy('created_at', 'desc')->get()->take(20) as $new)
						<x-cards.news :news="$new" />
					@endforeach
				@endif
				<div class="text-center">
						<a href="{{ route('news.index') }}" class="btn btn-primary font-weight-bolder font-size-sm mt-3 py-3 px-14">Przejdź do Aktualności</a>
					</div>
        </div>
    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/users/show.js') }}" type="text/javascript"></script>
@stop