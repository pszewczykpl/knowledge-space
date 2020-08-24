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
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj wszystkich użytkowników</span>
					</h3>

					@can('create', App\User::class)
					<div class="card-toolbar">
						<div class="dropdown dropdown-inline">
							<a class="btn btn-primary font-weight-bolder font-size-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj</a>
							<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
								<ul class="navi navi-hover py-5">

									<li class="navi-item">
										<a href="{{ route('users.create') }}" class="navi-link">
											<span class="svg-icon navi-icon">
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<polygon points="0 0 24 0 24 24 0 24"/>
														<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
														<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
													</g>
												</svg>
											</span>
											<span class="navi-text">Użytkownik</span>
										</a>
									</li>

								</ul>
							</div>
						</div>
					</div>
					@endcan
					
				</div>
				<div class="card-body pt-1">

					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<td>Imię i Nazwisko</td>
								<td>E-mail</td>
								<td>Telefon</td>
								<td>Akcje</td>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{ $user->first_name }} {{ $user->last_name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->phone }}</td>
								<td>
									<a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edytuj"><i class="flaticon2-edit"></i></a>
									<a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl"><i class="flaticon2-expand"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

				</div>
			</div>						

		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/admin/users/index.js') }}" type="text/javascript"></script>
@stop
