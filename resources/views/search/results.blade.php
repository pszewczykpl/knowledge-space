@extends('layouts.app')

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
					<div class="card card-custom card-stretch gutter-b shadow-lg">
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Ubezpieczenia Inwestycyjne</span>
								<span class="text-muted mt-1 font-weight-bold font-size-sm">{{ $investments->count() }} wyszukań dla frazy <b>{{ $value }}</b></span>
							</h3>
						</div>
						<div class="card-body pt-4">
							@foreach($investments as $investment)
								<a href="{{ route('investments.show', $investment) }}">
									<div class="d-flex align-items-center mb-2 bg-hover-light-primary p-4 rounded-xl">
										<div class="symbol symbol-40 symbol-light-primary mr-5">
											<span class="symbol-label">
												<span class="svg-icon svg-icon-xl svg-icon-primary">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
															<path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
														</g>
													</svg>
												</span>
											</span>
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-bold">
											<span class="text-dark mb-1 font-size-lg">{{ $investment->fullname() }}</span>

											<div class="d-flex">
												<span class="text-muted pr-1">Kod produktu:</span><span class="text-dark font-size-lg pr-2">{{ $investment->code }}</span>
												<span class="text-muted pr-1">Grupa produktowa:</span><span class="text-dark font-size-lg pr-2">{{ $investment->group }}</span>
											</div>
										</div>
											@if($investment->status == 'A')
												<span class="label font-weight-bold label-lg label-light-success label-inline">Aktualne</span>
											@else
												<span class="label font-weight-bold label-lg label-light-primary label-inline">Archiwalne</span>
											@endif
									</div>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card card-custom card-stretch gutter-b shadow-lg">
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Ubezpieczenia Ochronne</span>
								<span class="text-muted mt-1 font-weight-bold font-size-sm">{{ $protectives->count() }} wyszukań dla frazy <b>{{ $value }}</b></span>
							</h3>
						</div>
						<div class="card-body pt-4">
							@foreach($protectives as $protective)
								<a href="{{ route('protectives.show', $protective) }}">
									<div class="d-flex align-items-center mb-2 bg-hover-light-primary p-4 rounded-xl">
										<div class="symbol symbol-40 symbol-light-primary mr-5">
												<span class="symbol-label">
													<span class="svg-icon svg-icon-xl svg-icon-primary">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
															<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"></rect>
																<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
																<path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															</g>
														</svg>
													</span>
												</span>
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-bold">
											<span class="text-dark mb-1 font-size-lg">{{ $protective->extended_name() }}</span>
											<div class="d-flex">
												<span class="text-muted pr-1">Kod produktu:</span><span class="text-dark font-size-lg pr-2">{{ $protective->code }}</span>
											</div>
										</div>
										@if($protective->status == 'A')
											<span class="label font-weight-bold label-lg label-light-success label-inline">Aktualne</span>
										@else
											<span class="label font-weight-bold label-lg label-light-primary label-inline">Archiwalne</span>
										@endif
									</div>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card card-custom card-stretch gutter-b shadow-lg">
						<div class="card-header border-0 pt-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Ubezpieczenia Pracownicze</span>
								<span class="text-muted mt-1 font-weight-bold font-size-sm">{{ $employees->count() }} wyszukań dla frazy <b>{{ $value }}</b></span>
							</h3>
						</div>
						<div class="card-body pt-4">
							@foreach($employees as $employee)
								<a href="{{ route('employees.show', $employee) }}">
									<div class="d-flex align-items-center mb-2 bg-hover-light-primary p-4 rounded-xl">
										<div class="symbol symbol-40 symbol-light-primary mr-5">
													<span class="symbol-label">
														<span class="svg-icon svg-icon-xl svg-icon-primary">
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"></path>
																	<path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
																</g>
															</svg>
														</span>
													</span>
										</div>
										<div class="d-flex flex-column flex-grow-1 font-weight-bold">
											<span class="text-dark mb-1 font-size-lg">{{ $employee->extended_name() }}</span>
											<div class="d-flex">
												<span class="text-muted pr-1">Kod OWU:</span><span class="text-dark font-size-lg pr-2">{{ $employee->code_owu }}</span>
											</div>
										</div>
										@if($employee->status == 'A')
											<span class="label font-weight-bold label-lg label-light-success label-inline">Aktualne</span>
										@else
											<span class="label font-weight-bold label-lg label-light-primary label-inline">Archiwalne</span>
										@endif
									</div>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>

	</div>
@stop