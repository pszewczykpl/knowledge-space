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
						<span class="card-label font-weight-bolder text-dark">Dokumenty</span>
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj dokumenty ryzyk ubezpieczeniowych</span>
					</h3>
					
					@canany(['create'], [App\Risk::class, App\File::class])
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a class="btn btn-primary font-weight-bolder font-size-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj</a>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
								<ul class="navi navi-hover py-5">

									@can('create', App\Risk::class)
									<li class="navi-item">
										<a href="{{ route('risks.create') }}" class="navi-link">
											<span class="svg-icon navi-icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
														<path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000"/>
													</g>
												</svg>
											</span>
											<span class="navi-text">Ryzyko ubezpieczeniowe</span>
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
										<div class="input-icon" id="filter_col2" data-column="2">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Kategoria" id="col2_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col3" data-column="3">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Grupa" id="col3_filter" />
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
								<td>Kategoria</td>
								<td>Grupa</td>
								<td>Okres karencji</td>
							</tr>
						</thead>
					</table>

				</div>
			</div>

			<div class="card card-custom gutter-b mt-8" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Brakuje ryzyka?</h3>
						<div class="text-dark-50 font-size-lg mt-2">Jeśli nie widzisz na liście interesującego Cię ryzyka - skontaktuj się!</div>
					</div>
					<a href="mailto:piotr.szewczyk@openlife.pl" target="_blank" class="btn btn-primary font-weight-bold py-3 px-6">Kontakt</a>
				</div>
			</div>							

		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/risks/index.js') }}" type="text/javascript"></script>
@stop
