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
					<span class="font-size-h4 text-black font-weight-bolder ml-8 pt-5">Baza Wiedzy dla Towarzystwa Ubezpieczeniowego</span>
				</div>
			</div>
			<div class="d-flex align-items-stretch text-center flex-column py-10">
				<x-forms.search-bar :value="$value" :active="$active" />
			</div>
			<div class="py-15">
			</div>
		</div>
	</div>
	<div class="container mt-n15">

			<div class="row">
				<div class="col-12">
					<div class="card card-custom card-stretch gutter-b shadow-lg pb-8 pt-8">

						@foreach($results as $key => $data)
							@if($data->count() > 0)
								<div class="card-header border-0 pt-3">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label font-weight-bolder text-dark">{{ $meta[$key]['title'] }}</span>
										<span class="text-muted mt-1 font-weight-bold font-size-sm">{{ $data->count() }} wyszukań dla frazy <b>{{ $value }}</b></span>
									</h3>
								</div>
								<div class="card-body pt-0 pb-0">
									@foreach($data as $values)
										<x-cards.search-result :result="$values" :route="$key" :icon="$meta[$key]['icon']" />
									@endforeach
								</div>
							@endif
						@endforeach

					</div>
				</div>
			</div>

	</div>
@stop