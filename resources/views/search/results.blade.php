@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
@stop


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
											Wyniki wyszukiwania
										</button>
									</li>

								</ul>

								<a href="{{ route('login') }}" class="btn btn-outline btn-outline-dashed btn-outline-default active">Pokaż dane archiwalne</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

	<div class="row">
		<div class="col-12">

				@foreach($results as $key => $data)
					@if($data->count() > 0)
						<div class="d-flex flex-wrap flex-stack pb-7">
							<div class="d-flex flex-wrap align-items-center my-1">
								<h3 class="fw-bolder me-5 my-1">{{ $meta[$key]['title'] }}
									<span class="text-gray-400 fs-6 mx-2">{{ $data->count() }} wyszukań dla frazy <b><i>{{ $value }}</i></b></span>
								</h3>
							</div>
						</div>

								@foreach($data as $values)
									<div class="card card-rounded mb-5">
										<div class="card-body p-0 m-0">
												<x-cards.search-result :result="$values" :route="$key" :icon="$meta[$key]['icon']" />
										</div>
									</div>
								@endforeach
					@endif
				@endforeach

		</div>
	</div>
	</div>
@stop