@extends('layouts.app')

@section('content')
	<div class="d-flex bgi-size-cover bgi-position-center" style="background-image: url({{ asset('media/bg/bg-1.jpg') }})">
		<div class="container">
			<div class="d-flex justify-content-between align-items-top py-7 pt-1">
				<img alt="Logo" src="{{ asset('media/logos/logo-std.png') }}" />
				<div class="d-flex">
					<span class="font-size-h4 text-black font-weight-bolder ml-8 pt-5">Baza Wiedzy dla Towarzysta Ubezpieczeniowego</span>
				</div>
			</div>
			<div class="d-flex align-items-stretch text-center flex-column py-10">
				<h1 class="text-dark font-weight-bolder mb-12">Jak możemy Ci pomóc?</h1>
				<form action="{{ route('search', ['scope' => 'all']) }}" class="d-flex position-relative w-75 px-lg-40 m-auto">
					<div class="input-group" style="box-shadow: 0px 0px 35px -17px;">
						<div class="input-group-prepend">
                        <span class="input-group-text bg-white border-0 py-7 px-8">
                            <span class="svg-icon svg-icon-primary svg-icon-xl">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24" />
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                    </g>
                                </svg>
                            </span>
                        </span>
						</div>
						<input type="text" class="form-control h-auto border-0 py-7 px-1 font-size-h6" name="value" id="value" placeholder="Wpisz treść wyszukiwania i kliknij Enter" />
					</div>
				</form>
			</div>
			<div class="py-15">
			</div>
		</div>
	</div>
{{--	<div class="container mt-n15">--}}

{{--			<div class="row">--}}
{{--				<div class="col-12">--}}
{{--					<div class="card card-custom card-stretch gutter-b shadow-lg">--}}
{{--						<div class="card-header border-0 pt-5">--}}
{{--							<h3 class="card-title align-items-start flex-column">--}}
{{--								<span class="card-label font-weight-bolder text-dark">Jak wyszukiwać informacje?</span>--}}
{{--								<span class="text-muted mt-1 font-weight-bold font-size-sm">Mini poradnik</span>--}}
{{--							</h3>--}}
{{--						</div>--}}
{{--						<div class="card-body pt-4">--}}
{{--							Instrukca jak byc debilem--}}
{{--						</div>--}}
{{--					</div>--}}

{{--				</div></div>--}}

{{--	</div>--}}
@stop