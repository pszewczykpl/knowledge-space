@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
		<li class="breadcrumb-item">
			<span class="text-muted">Przeglądaj</span>
		</li>
	</ul>
@stop

@section('toolbar')
		<a href="{{ route('users.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $user)
			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $user)
			<a onclick='document.getElementById("users_destroy_{{ $user->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'users.destroy', $user->id ], 'id' => 'users_destroy_' . $user->id ]) }}{{ Form::close() }}
		@endcan
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
				@if($user->getCachedRelation('news')->count() == 0)
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
					@foreach($user->getCachedRelation('news')->sortByDesc('created_at')->take(20) as $new)
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

@push('scripts')
<script src="{{ asset('js/pages/users/show.js') }}" type="text/javascript"></script>
@endpush