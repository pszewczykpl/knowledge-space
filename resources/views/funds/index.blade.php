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

		<div class="ml-3">
			<button type="button" class="btn btn-sm btn-success" id="active_or_all">Pokaż tylko Aktywne</button>
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
						<span class="card-label font-weight-bolder text-dark">Dokumenty</span>
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj komplety dokumentów ubezpieczeniowych funduszy kapitałowych</span>
					</h3>
					
					@canany(['create'], [App\Fund::class, App\File::class])
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a class="btn btn-primary font-weight-bolder font-size-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj</a>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
								<ul class="navi navi-hover py-5">

									@can('create', App\Fund::class)
									<li class="navi-item">
										<a href="{{ route('funds.create') }}" class="navi-link">
											<span class="svg-icon navi-icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
														<path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
													</g>
												</svg>
											</span>
											<span class="navi-text">Fundusz UFK</span>
										</a>
									</li>
									@endcan

									@can('create', App\File::class)
									<li class="navi-item">
										<a href="{{ route('files.create') }}" class="navi-link">
											<span class="svg-icon navi-icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
														<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
														<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
													</g>
												</svg>
											</span>
											<span class="navi-text">Dokument</span>
										</a>
									</li>
									@endcan

								</ul>
							</div>
						</div>
					</div>
					@endcanany
					
				</div>
				<div class="card-body">
					<div class="mb-1">
						
						<div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
							<div class="alert-icon">
								<i class="flaticon-info"></i>
							</div>
							<div class="alert-text">
								<b>Wskazówka!</b><br>
								Poniżej znajdują się ubezpieczeniowe fundusze kapitałowe, które mogą być już nieaktywne.<br>
								Jeśli chcesz przeglądać tylko aktywne fundusze, kliknij Pokaż tylko Aktywne.<br>
							</div>
							<div class="alert-close">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">
										<i class="ki ki-close"></i>
									</span>
								</button>
							</div>
						</div>

						<div class="row align-items-center">
							<div class="col-12">
								<div class="row align-items-center">
									
									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col0" data-column="0">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Symbol" id="col0_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col1" data-column="1">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Nazwa" id="col1_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col6" data-column="6">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Waluta" id="col6_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0" style="display: none;">
										<div class="input-icon" id="filter_col4" data-column="4">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Status" id="col4_filter" />
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
								<td>Symbol</td>
								<td>Nazwa</td>
								<td>Typ</td>
								<td>Data startu</td>
								<td>Status</td>
								<td>Akcje</td>
							</tr>
						</thead>
					</table>

				</div>
			</div>

			<div class="card card-custom gutter-b mt-8" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Brakuje funduszu?</h3>
						<div class="text-dark-50 font-size-lg mt-2">Jeśli nie widzisz na liście interesującego Cię funduszu - skontaktuj się!</div>
					</div>
					<a href="mailto:piotr.szewczyk@openlife.pl" target="_blank" class="btn btn-primary font-weight-bold py-3 px-6">Kontakt</a>
				</div>
			</div>							

		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/funds/index.js') }}" type="text/javascript"></script>
@stop
