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
                                    <input type="text" class="form-control fs-4 py-4 ps-14 text-gray-600 placeholder-gray-500 mw-500px fw-normal card-rounded" name="value" id="value" @if($value ?? false) value="{{ $value }}" @endif placeholder="Wpisz treść wyszukiwania i kliknij Enter">
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
                                    <button class="btn btn-color-gray-600 btn-active-white btn-active-color-primary fw-boldest fs-8 fs-lg-base nav-link px-3 px-lg-8 mx-1 card-rounded text-uppercase active">
                                        Panel główny
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-8">
                    <div class="d-flex flex-wrap flex-stack pb-7">
                        <div class="d-flex flex-wrap align-items-center my-1">
                            <h3 class="fw-bolder me-5 my-1">Aktualności
                                <span class="text-gray-400 fs-6 mx-2">od Najnowszych ↓</span>
                            </h3>
                        </div>
                    </div>
                    @foreach($news as $new)
                        <x-cards.news :news="$new" />
                    @endforeach
                    <div class="text-center">
                        <a href="{{ route('news.index') }}" class="btn btn-primary fw-bold mt-3 w-100 card-rounded card-shadow">Przejdź do Aktualności</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="flex-column flex-lg-row-auto">
                        <div class="card card-rounded p-10 mb-8 card-shadow">
                            <h2 class="text-dark fw-bolder mb-11">Na skróty...</h2>
                            <a href="{{ route('investments.index') }}">
                                <div class="d-flex align-items-center mb-10">
                                    @include('svg.investment', ['class' => 'svg-icon svg-icon-1 svg-icon-primary me-5'])
                                    <div class="d-flex flex-column">
                                        <h5 class="text-gray-800 fw-bold">Ubezpieczenia Inwestycyjne</h5>
                                        <div class="fw-normal">
                                            <span class="text-muted">Przeglądaj wszystkie ubezpieczenia inwestycyjne wraz z dokumentami.</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('protectives.index') }}">
                                <div class="d-flex align-items-center mb-10">
                                    @include('svg.protective', ['class' => 'svg-icon svg-icon-1 svg-icon-danger me-5'])
                                    <div class="d-flex flex-column">
                                        <h5 class="text-gray-800 fw-bold">Ubezpieczenia Ochronne</h5>
                                        <div class="fw-normal">
                                            <span class="text-muted">Przeglądaj wszystkie ubezpieczenia ochronne wraz z dokumentami.</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('bancassurances.index') }}">
                                <div class="d-flex align-items-center mb-10">
                                    @include('svg.bancassurance', ['class' => 'svg-icon svg-icon-1 svg-icon-info me-5'])
                                    <div class="d-flex flex-column">
                                        <h5 class="text-gray-800 fw-bold">Ubezpieczenia Bancassurance</h5>
                                        <div class="fw-normal">
                                            <span class="text-muted">Przeglądaj wszystkie ubezpieczenia bancassurance wraz z dokumentami.</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('employees.index') }}">
                                <div class="d-flex align-items-center mb-10">
                                    @include('svg.employee', ['class' => 'svg-icon svg-icon-1 svg-icon-success me-5'])
                                    <div class="d-flex flex-column">
                                        <h5 class="text-gray-800 fw-bold">Ubezpieczenia Pracownicze</h5>
                                        <div class="fw-normal">
                                            <span class="text-muted">Przeglądaj wszystkie ubezpieczenia pracownicze wraz z dokumentami.</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('funds.index') }}">
                                <div class="d-flex align-items-center mb-5">
                                    @include('svg.fund', ['class' => 'svg-icon svg-icon-1 svg-icon-primary me-5'])
                                    <div class="d-flex flex-column">
                                        <h5 class="text-gray-800 fw-bold">Fundusze UFK</h5>
                                        <div class="fw-normal">
                                            <span class="text-muted">Przeglądaj wszystkie fundusze ubezpieczeniowe wraz z dokumentami.</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="d-flex flex-wrap align-items-center my-1 mb-7">
                            <h3 class="fw-bolder me-5 my-1">Artykuły
                                <span class="text-gray-400 fs-6 mx-2">ostatnio dodane</span>
                            </h3>
                        </div>
                        @foreach($post as $post)
                            <a href="{{ route('posts.show', $post) }}">
                                <div class="card bgi-no-repeat card-xl-stretch mb-6 card-rounded card-shadow" style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('media/bg/abstract-4.svg') }})">
                                    <div class="card-body pt-3 mt-0">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-30px symbol-circle me-3">
                                                <img src="{{ Storage::url($post->user->avatar_path ?? 'avatars/default.jpg') }}" class="" alt="">
                                            </div>
                                            <div class="fw-normal text-primary my-7">{{ $post->created_at }}</div>
                                        </div>
                                        <span class="text-dark fw-bold fs-4 m-0">{{ $post->title }}</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop