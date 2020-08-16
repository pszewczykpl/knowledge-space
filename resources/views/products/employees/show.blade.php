@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">

		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
			
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $employee->code_owu }}</span>
			</li>

			<li class="breadcrumb-item">
				<span class="text-muted">{{ $employee->edit_date }}</span>
			</li>

		</ul>
	</div>
	<div class="d-flex align-items-center">

		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-arrow-left"></i>Powrót
		</a>

        <a onclick="ShareEmployees('{{ $employee->id }}')" class="btn btn-light-primary btn-icon-sm ml-1">
            <i class="la la-share-alt"></i>Udostępnij
        </a>

		@auth
			<a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-light-primary btn-icon-sm ml-1">
				<i class="la la-edit"></i>Edytuj
			</a>

			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'employees.destroy', $employee->id ] ]) }}
				{{ Form::submit('Usuń', ['class' => 'btn btn-light-danger btn-icon-sm ml-1']) }}
			{{ Form::close() }}
		@endauth

	</div>
</div>
@stop

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-4">
		
		@if($employee->status == 'N')
			<div class="card card-custom gutter-b">
				<div class="card-header h-auto py-3 border-0">
					<div class="card-title">
						<h3 class="card-label text-danger">Dokumenty Archiwalne</h3>
					</div>
					<div class="card-toolbar">
						<span class="label font-weight-bold label label-inline label-light-danger">Ważne</span>
					</div>
				</div>
				<div class="card-body pt-2">
					<p class="text-dark-50"><span class="font-weight-bold">Pamiętaj!</span> Dla wybranego kodu OWU istnieje nowszy komplet dokumentów.</p>
				</div>
			</div>
		@else
			<div class="card card-custom gutter-b">
				<div class="card-header h-auto py-3 border-0">
					<div class="card-title">
						<h3 class="card-label text-success">Dokumenty aktualne</h3>
					</div>
				</div>
				<div class="card-body pt-2">
					<p class="text-dark-50">To najnowszy komplet dokumentów dla wybranego kodu OWU.</p>
				</div>
			</div>
		@endif

		<div class="card card-custom">
			<div class="card-header h-auto py-sm-0">
				<div class="card-title">
					<h3 class="card-label">Szczegóły produktu
					<span class="d-block text-muted pt-2 font-size-sm">Dane produktu inwestycyjnego</span></h3>
				</div>
			</div>
			<div class="card-body py-0 pt-4">
				<div class="form-group row my-sm-0">
					<label class="col-6 col-form-label text-right">Nazwa produktu:</label>
					<div class="col-6">
						<span class="form-control-plaintext font-weight-bolder">{{ $employee->name }}</span>
					</div>
				</div>
			</div>
            <div class="card-body py-0 pb-4">
				<div class="form-group row my-sm-0">
					<label class="col-6 col-form-label text-right">Kod OWU:</label>
					<div class="col-6">
						<span class="form-control-plaintext font-weight-bolder">{{ $employee->code_owu }}</span>
					</div>
				</div>
			</div>
		</div>
        
        <div class="card card-custom mt-5">
			<div class="card-header h-auto py-sm-0">
				<div class="card-title">
					<h3 class="card-label">Historia rekordu
					<span class="d-block text-muted pt-2 font-size-sm">Historia edycji rekordu</span></h3>
				</div>
			</div>
			<div class="card-body py-0 pt-4">
				<div class="form-group row my-sm-0">
					<label class="col-6 col-form-label text-right">Ostatnia edycja:</label>
					<div class="col-6">
						<span class="form-control-plaintext font-weight-bolder">{{ $employee->updated_at }}</span>
					</div>
				</div>
			</div>
            <div class="card-body py-sm-0">
				<div class="form-group row my-sm-0">
					<label class="col-6 col-form-label text-right">Utworzone:</label>
					<div class="col-6">
						<span class="form-control-plaintext font-weight-bolder">{{ $employee->created_at }}</span>
					</div>
				</div>
			</div>
            <div class="card-body py-0 pb-4">
				<div class="form-group row my-sm-0">
					<label class="col-6 col-form-label text-right">Utworzone przez:</label>
					<div class="col-6">
						<span class="form-control-plaintext font-weight-bolder">{{ $employee->user->username }}</span>
					</div>
				</div>
			</div>
		</div>
    </div>
    <div class="col-lg-8">
        <div class="card card-custom gutter-b">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-sm nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-selected="false">
                                <span class="nav-icon mr-2">
								    <span class="svg-icon mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
                                                <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">Komentarze</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#files" role="tab" aria-selected="true">
                                <span class="nav-icon mr-2">
								    <span class="svg-icon mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M14.8875071,12.8306874 L12.9310336,12.8306874 L12.9310336,10.8230161 C12.9310336,10.5468737 12.707176,10.3230161 12.4310336,10.3230161 L11.4077349,10.3230161 C11.1315925,10.3230161 10.9077349,10.5468737 10.9077349,10.8230161 L10.9077349,12.8306874 L8.9512614,12.8306874 C8.67511903,12.8306874 8.4512614,13.054545 8.4512614,13.3306874 C8.4512614,13.448999 8.49321518,13.5634776 8.56966458,13.6537723 L11.5377874,17.1594334 C11.7162223,17.3701835 12.0317191,17.3963802 12.2424692,17.2179453 C12.2635563,17.2000915 12.2831273,17.1805206 12.3009811,17.1594334 L15.2691039,13.6537723 C15.4475388,13.4430222 15.4213421,13.1275254 15.210592,12.9490905 C15.1202973,12.8726411 15.0058187,12.8306874 14.8875071,12.8306874 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                </span>
                                <span class="nav-text">Dokumenty</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="tab-content pt-2">
                    <div class="tab-pane " id="notes" role="tabpanel">
                        
                    <div class="container">
					@auth
						{!! Form::open(['route' => 'notes.store', 'method' => 'post']) !!}
							{!! Form::token() !!}
							<div class="form-group">
								<input type="text" class="form-control form-control-lg form-control-solid mb-5" placeholder="Tytuł komentarza" id="title" name="title">
								<input type="hidden" id="type" name="type" value="employee">
								<input type="hidden" id="employee_id" name="employee_id" value="{{ $employee->id }}">
								<textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Treść komentarza"></textarea>
							</div>
							<div class="row">
								<div class="col">
									<input type="submit" class="btn btn-light-primary font-weight-bold" value="Dodaj komentarz">
								</div>
							</div>
						{!! Form::close() !!}
						<div class="separator separator-dashed my-10"></div>
					@endauth
					<div class="timeline timeline-3">
						<div class="timeline-items">
							@foreach($employee->notes as $note)
								<div class="timeline-item">
									<div class="timeline-media">
										<i class="flaticon2-notification fl text-danger"></i>
									</div>
									<div class="timeline-content">
										<div class="d-flex align-items-center justify-content-between mb-3">
											<div class="mr-2">
												<span class="text-dark-75 text-hover-primary font-weight-bold">
													{{ $note->title }}
												</span>
												<span class="text-muted ml-2">
													{{ $note->updated_at }}
												</span>
											</div>
											@auth
												{{ Form::open([ 'method'  => 'delete', 'route' => [ 'notes.destroy', $note->id ] ]) }}
													{{ Form::button('<i class="flaticon2-trash text-danger" title="Usuń"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-clean btn-icon btn-icon-sm'] )  }}
												{{ Form::close() }}
											@endauth
										</div>
										<p class="p-0">
											{{ $note->content }}
										</p>
									</div>
								</div>
							@endforeach
						</div>
					</div>
					</div>

                    </div>
                    <div class="tab-pane active" id="files" role="tabpanel">
                        
                        <x-panels.files-panel :files="$employee->files" />
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/products/employees/show.js') }}" type="text/javascript"></script>
@stop