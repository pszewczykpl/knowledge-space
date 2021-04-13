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
				<x-forms.search-bar />
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