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
						<span class="text-muted mt-1 font-weight-bold font-size-sm">Przeglądaj użytkowników systemu</span>
					</h3>
					@auth
						<div class="card-toolbar">
							<div class="dropdown dropdown-inline">
								<a class="btn btn-primary font-weight-bolder font-size-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dodaj nowy</a>
								<div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
									<ul class="navi navi-hover py-5">
										
										<li class="navi-item">
											<a href="{{ route('users.create') }}" class="navi-link">
												<span class="navi-icon">
													<i class="flaticon2-user"></i>
												</span>
												<span class="navi-text">Użytkownik</span>
											</a>
										</li>

									</ul>
								</div>
							</div>
						</div>
					@endauth
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
