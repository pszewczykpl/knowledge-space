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
			<button type="button" class="btn btn-sm btn-success" id="active_or_all">Pokaż tylko Aktualne</button>
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
						<span class="card-label font-weight-bolder text-dark">Komplety dokumentów</span>
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj komplety dokumentów produktów inwestycyjnych</span>
					</h3>
					
					@canany(['create'], [App\Protective::class, App\File::class])
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a class="btn btn-primary font-weight-bolder font-size-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj</a>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
								<ul class="navi navi-hover py-5">

									@can('create', App\Protective::class)
									<li class="navi-item">
										<a href="{{ route('protectives.create') }}" class="navi-link">
											<span class="svg-icon navi-icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<rect fill="#000000" opacity="0.3" x="17" y="4" width="3" height="13" rx="1.5"/>
														<rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
														<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
														<rect fill="#000000" opacity="0.3" x="7" y="11" width="3" height="6" rx="1.5"/>
													</g>
												</svg>
											</span>
											<span class="navi-text">Ubezpieczenie Ochronne</span>
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
								Poniżej przedstawiono wszystkie dostępne komplety dokumentów dla produktów ochronnych.
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
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Nazwa produktu" id="col0_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col1" data-column="1">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Kod dystrybutora" id="col1_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col2" data-column="2">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Kod produktu" id="col2_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col6" data-column="6">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Kod OWU" id="col6_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col7" data-column="7">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Nazwa dystrybutora" id="col7_filter" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>

									<div class="col-md-3 pb-3 my-2 my-md-0">
										<div class="input-icon" id="filter_col8" data-column="8">
											<input type="text" class="form-control form-control-solid column_filter" placeholder="Numer subskrypcji" id="col8_filter" />
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
								<td>Nazwa produktu</td>
								<td>Kod dystrybutora</td>
								<td>Kod produktu</td>
								<td>Dokumenty ważne od</td>
								<td>Status dokumentów</td>
								<td>Akcje</td>
							</tr>
						</thead>
					</table>

				</div>
			</div>

			<div class="card card-custom gutter-b mt-8" style="height: 150px">
				<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
					<div class="mr-2">
						<h3 class="font-weight-bolder">Brakuje produktu?</h3>
						<div class="text-dark-50 font-size-lg mt-2">Jeśli nie widzisz na liście interesującego Cię produktu - skontaktuj się!</div>
					</div>
					<a href="mailto:piotr.szewczyk@openlife.pl" target="_blank" class="btn btn-primary font-weight-bold py-3 px-6">Kontakt</a>
				</div>
			</div>							

		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/products/protectives/index.js') }}" type="text/javascript"></script>
@stop