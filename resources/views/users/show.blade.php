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

		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-arrow-left"></i>Powrót
		</a>

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
			@if($user->id === Auth::user()->id)
			<div class="card card-custom gutter-b">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="symbol symbol-40 symbol-white mr-5">
							<span class="symbol-label" style="background-image:url('{{ asset('storage/uploads/avatars/') }}/{{ $user->avatar_filename }}')"></span>
						</div>
						<span class="text-muted font-weight-bold font-size-lg">Coś nowego, <b>{{ $user->first_name }}</b>?</span>
					</div>
					{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_2_form', 'class' => 'pt-10 ql-quil ql-quil-plain']) !!}
						{!! Form::token() !!}
						<div id="editor" name="editor" class="font-size-lg"></div>
						<textarea name="content" style="display:none" id="content"></textarea>
						<div class="border-top my-5"></div>
						<div id="kt_forms_widget_2_editor_toolbar" class="ql-toolbar d-flex align-items-center justify-content-between">
							<div class="mr-2">
								<span class="ql-formats ml-0">
									<button class="ql-bold"></button>
									<button class="ql-italic"></button>
									<button class="ql-underline"></button>
									<button class="ql-strike"></button>
									<button class="ql-image"></button>
									<button class="ql-link"></button>
								</span>
							</div>
							<div class="">
								<input type="submit" id="submit" name="submit" value="Wyślij" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2">
									{{-- <span class="svg-icon svg-icon-md svg-icon-primary pr-0">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
											</g>
										</svg>
									</span>
									Wyślij --}}
								{{-- </a> --}}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
			@endif
			@endauth

            @if($user->news->count() == 0)
            <div class="alert alert-custom alert-white shadow-sm fade show text-center" role="alert">
                @if($user->id === Auth::user()->id)
                <div class="alert-text">Nie posiadasz żadnych aktualności... Napisz swoją pierwszą!</div>
                @else
                <div class="alert-text">Użytkownik nie posiada żadnych aktualności...</div>
                @endif
            </div>
            @endif
            
            @foreach($user->news->sortByDesc('created_at')->take(10) as $new)
		    <x-cards.news :news="$new" />
		    @endforeach

            <div class="text-center">
				<a href="{{ route('news.index') }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">Przejdź do aktualności</a>
			</div>

        </div>

    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/users/show.js') }}" type="text/javascript"></script>
@stop