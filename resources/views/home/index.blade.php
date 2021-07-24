@extends('layouts.app')

@section('content')
<div id="kt_content_container" class="container">
    <div class="d-flex flex-column flex-md-row">
        <div class="flex-md-row-fluid">

            <form action="{{ route('search', ['scope' => 'all']) }}">
                <div class="card mb-12 card-shadow card-rounded">
                    <div class="card-body flex-column p-5">
                        <div class="d-flex align-items-center h-lg-300px p-5 p-lg-15">
                            <div class="d-flex flex-column align-items-start justift-content-center flex-equal me-5">
                                <h1 class="fw-bolder fs-4 fs-lg-1 text-gray-800 mb-5 mb-lg-10">Jak możemy Ci pomóc?</h1>
                                <div class="position-relative w-100">
                                    @include('svg.search', ['class' => 'svg-icon svg-icon-2 svg-icon-primary position-absolute top-50 translate-middle ms-8'])
                                    <input type="text" class="form-control fs-4 py-4 ps-14 text-gray-600 placeholder-gray-500 mw-500px fw-normal" name="value" id="value" @if($value ?? false) value="{{ $value }}" @endif placeholder="Wpisz treść wyszukiwania i kliknij Enter">
                                </div>
                                <span class="fw-normal fs-6 text-gray-400 mt-3 mx-1 pe-10"><b>Wskazówka!</b> Do wyszukiwarki możesz wpisać takie dane jak: <i>Nazwę produktu</i>, <i>Kod TOiL</i>, <i>Kod produktu</i> i wiele innych!</span>
                            </div>
                            <div class="flex-equal d-flex justify-content-center align-items-end ms-10">
                                <img src="{{ asset('media/bg/presentation.png') }}" alt="" class="mw-100 mh-125px mh-lg-300px mb-lg-n12">
                            </div>
                        </div>
                        <div class="card-rounded bg-light d-flex flex-stack flex-wrap p-5">
                            <ul class="nav flex-wrap border-transparent fw-bolder">
                                <li class="nav-item my-1">
                                    <button class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 text-uppercase active">
                                        Aktualności
                                    </button>
                                </li>

                            </ul>

                            @auth
                                <a href="#" class="btn btn-primary fw-bolder fs-8 fs-lg-base">Mój profil</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary fw-bolder fs-8 fs-lg-base">Zaloguj się</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </form>


            @foreach($news as $new)
				<x-cards.news :news="$new" />
			@endforeach

        </div>
    </div>
</div>

{{-- <div class="d-flex bgi-size-cover bgi-position-center" style="background-image: url({{ asset('media/bg/bg-1.jpg') }})">
	<div class="container">
		<div class="d-flex justify-content-between align-items-top py-7 pt-1">
            <img alt="Logo" src="{{ asset('media/logos/logo-std.png') }}" />
			<div class="d-flex">
				<span class="font-size-h4 text-black font-weight-bolder ml-8 pt-5">Baza Wiedzy dla Towarzystwa Ubezpieczeniowego</span>
			</div>
        </div>
         <div class="d-flex align-items-stretch text-center flex-column py-10">
            <x-forms.search-bar />
        </div>
        <div class="py-15">
		</div>
	</div>
</div>
<div class="container mt-n15">
    @guest
    <div class="card card-custom gutter-b">
    	<div class="card-body pb-0" style="box-shadow: 0px 0px 30px -20px;">
            <div class="alert alert-white pb-2" role="alert">
                <h4 class="alert-heading text-dark">Nie masz konta w Bazie Wiedzy? <a class="font-weight-bold text-primary" href="{{ route('register') }}">Zarejestruj się!</a></h4>
                <p>Dzięki rejestracji w systemie Baza Wiedzy uzyskasz dostęp do pozostałych funkcjonalności systemu!</p>
            </div>
        </div>
    </div>
    @endguest
    @auth
    <div class="card card-custom gutter-b pb-0">
		<div class="card-body pb-0" style="box-shadow: 0px 0px 30px -20px;">
			<div class="d-flex mb-6">
				<div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
					<div class="symbol symbol-50 symbol-lg-120">
						<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" alt="image">
					</div>
				</div>
				<div class="flex-grow-1">
					<div class="d-flex justify-content-between flex-wrap mt-0">
						<div class="d-flex mr-3">
							<a href="{{ route('users.show', Auth::user()->id) }}" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bolder mr-3" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="<b>Wyświetl profil</b>">{{ Auth::user()->full_name }}</a>
						</div>
						<div class="my-lg-0 my-3">
							<a onclick="event.preventDefault();document.getElementById('logout-form-home').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5 mt-0">Wyloguj</a>
                            <form id="logout-form-home" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
						</div>
					</div>
					<div class="d-flex flex-wrap justify-content-between mt-0">
						<div class="d-flex flex-column flex-grow-1 pr-8">
							<div class="d-flex flex-wrap mb-2">
                                <div class="text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <path d="M20,8 L18.173913,8 C17.0693435,8 16.173913,8.8954305 16.173913,10 L16.173913,12 C16.173913,12.5522847 15.7261978,13 15.173913,13 L8.86956522,13 C8.31728047,13 7.86956522,12.5522847 7.86956522,12 L7.86956522,10 C7.86956522,8.8954305 6.97413472,8 5.86956522,8 L4,8 L4,6 C4,4.34314575 5.34314575,3 7,3 L17,3 C18.6568542,3 20,4.34314575 20,6 L20,8 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M6.15999985,21.0604779 L8.15999985,17.5963763 C8.43614222,17.1180837 9.04773263,16.9542085 9.52602525,17.2303509 C10.0043179,17.5064933 10.168193,18.1180837 9.89205065,18.5963763 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 Z M17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L14.1000004,18.5660262 C13.823858,18.0877335 13.9877332,17.4761431 14.4660258,17.2000008 C14.9443184,16.9238584 15.5559088,17.0877335 15.8320512,17.5660262 L17.8320512,21.0301278 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M20,10 L20,15 C20,16.6568542 18.6568542,18 17,18 L7,18 C5.34314575,18 4,16.6568542 4,15 L4,10 L5.86956522,10 L5.86956522,12 C5.86956522,13.6568542 7.21271097,15 8.86956522,15 L15.173913,15 C16.8307673,15 18.173913,13.6568542 18.173913,12 L18.173913,10 L20,10 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ Auth::user()->position }}
                                    </span>
                                </div>
                                <div class="text-center pl-3">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ Auth::user()->department->name }}
                                    </span>
                                </div>
                                <div class="text-center pl-3">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ Auth::user()->company }}
                                    </span>
                                </div>
							</div>
							<div class="pt-0">
                                <div class="navi navi-spacer-x-0 p-0">
                                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="navi-item">
                                        <div class="navi-link">
                                            <div class="symbol symbol-40 mr-3">
                                                <div class="symbol-label">
                                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="navi-text">
                                                <div class="font-weight-bold">Edycja profilu</div>
                                                <div class="text-muted">Ustawienia konta i inne</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @endauth
    <div class="card card-custom gutter-b mt-8">
        <div class="card-header" style="min-height: 50px !important; padding-left: 1.8rem !important;">
            <div class="card-title">
                <small>Systemy Towarzystwa Ubezpieczeniowego</small>
            </h3>
            </div>
           </div>
        <div class="card-body" style="padding: 1.2rem !important;">
            <div class="row">
                <div class="col-12">
                    @foreach($systems as $system)
                    <a href="{{ $system->url }}" class="btn btn-sm btn-light-primary mb-1 mt-1 mr-1 ml-1" target="_blank">
                        <span class="svg-icon svg-icon-ms text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
                            </g>
                        </svg>
                    </span>
                    {{ $system->name }}
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> --}}
@stop