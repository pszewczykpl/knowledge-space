@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">

		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

		<div class="input-icon" id="filter_global">
			<input type="text" class="form-control form-control-solid form-control-sm global_filter" placeholder="Szukaj..." id="global_filter">
			<span>
				<i class="flaticon2-search-1 text-muted"></i>
			</span>
		</div>

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
	<div class="d-flex flex-column flex-md-row">
		
		<div class="flex-md-row-fluid">
			<div class="card card-custom">
				<div class="card-header flex-wrap border-0 pt-6 pb-0">
					
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label font-weight-bolder text-dark">{{ $title }}</span>
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj partnerów oraz dystrybutorów Towarzystwa Ubezpieczeń</span>
					</h3>
					
					@can('create', App\Partner::class)
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a class="btn btn-primary font-weight-bolder font-size-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj</a>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
								<ul class="navi navi-hover py-5">

									<li class="navi-item">
										<a href="{{ route('partners.create') }}" class="navi-link">
											<span class="svg-icon navi-icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z" fill="#000000" opacity="0.3"/>
														<path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"/>
													</g>
												</svg>
											</span>
											<span class="navi-text">Partnera/Dystrybutora</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					@endcan
					
				</div>
				<div class="card-body">
					<div class="mb-1">
						
						<div class="row align-items-center">
							<div class="col-12">
								<div class="row align-items-center">
									
									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col0" data-column="0">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Nazwa" id="col0_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col1" data-column="1">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Symbol" id="col1_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col2" data-column="2">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Typ" id="col2_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col3" data-column="3">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Numer RAU" id="col3_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col4" data-column="4">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="NIP" id="col4_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col5" data-column="5">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="REGON" id="col5_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>

					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<td>Nazwa</td>
								<td>Symbol</td>
								<td>Typ</td>
								<td>Numer RAU</td>
								<td>NIP</td>
								<td>REGON</td>
							</tr>
						</thead>
					</table>

				</div>
			</div>

			<div class="card card-custom gutter-b mt-8" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Brakuje partnera/dystrybutora?</h3>
						<div class="text-dark-50 font-size-lg mt-2">Jeśli nie widzisz na liście interesującego Cię partnera/dystrybutora - skontaktuj się!</div>
					</div>
					<a href="mailto:piotr.szewczyk@openlife.pl" target="_blank" class="btn btn-primary font-weight-bold py-3 px-6">Kontakt</a>
				</div>
			</div>							

		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/partners/index.js') }}" type="text/javascript"></script>
@stop
