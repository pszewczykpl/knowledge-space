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
			Powrót
		</a>
		@can('update', $user)
			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
				<span class="svg-icon navi-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
							<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
						</g>
					</svg>
				</span>
				Edytuj
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
            @auth
			@if(Auth::user()->can('create', App\Models\News::class) and $user->id == Auth::user()->id)
				<x-cards.news-store />
			@endif
			@if($user->news->count() == 0)
			<div class="alert alert-custom alert-white shadow-sm fade show text-center" role="alert">
				@if($user->id == Auth::user()->id)
				<div class="alert-text">Nie posiadasz żadnych aktualności... Napisz swoją pierwszą!</div>
				@else
				<div class="alert-text">Użytkownik nie posiada żadnych aktualności...</div>
				@endif
			</div>
			@else
				@foreach($user->news->sortByDesc('created_at')->take(10) as $new)
				<x-cards.news :news="$new" />
				@endforeach
			@endif
			@can('viewany', App\Models\News::class)
            <div class="text-center">
				<a href="{{ route('news.index') }}" class="btn btn-primary font-weight-bolder font-size-sm mt-3 py-3 px-14">Przejdź do Aktualności</a>
			</div>
			@endcan
			@endauth
			@guest
			<div class="alert alert-custom alert-white shadow-sm fade show text-center" role="alert">
                <div class="alert-text">Aby przeglądać aktualności użytkowników <a href="{{ route('login') }}">Zaloguj się</a>.</div>
			</div>
			@endguest
        </div>
    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/users/show.js') }}" type="text/javascript"></script>
@stop