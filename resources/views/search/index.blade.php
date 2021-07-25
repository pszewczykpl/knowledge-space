@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
@stop


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
@stop