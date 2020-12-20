@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $description }}</span>
			</li>
		</ul>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ url()->previous() }}" class="btn btn-md btn-clean btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
						<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
					</g>
				</svg>
			</span>
			Anuluj
		</a>
        @can('update', $bancassurance)
        <a onclick='document.getElementById("bancassurance_update_form").submit();' class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                    </g>
                </svg>
			</span>
			Zapisz
		</a>
        @endcan
	</div>
</div>
@stop

@section('content')
<div class="container">
    @if(count($errors) > 0)
    <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    </div>
    @endif
    <div class="card card-custom gutter-bs">
        <div class="card-header card-header-tabs-line">
            <div class="card-toolbar">
                <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x" role="tablist">
                    <li class="nav-item mr-3">
                        <a class="nav-link active" data-toggle="tab" href="#info" role="tab">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                            <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#files" role="tab">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"></rect>
											<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"></rect>
										</g>
									</svg>
                                </span>
                            </span>
                            <span class="nav-text font-weight-bold">Dokumenty</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
        {!! Form::open(['route' => ['bancassurances.update', $bancassurance->id], 'method' => 'PUT', 'id' => 'bancassurance_update_form']) !!}
        {!! Form::token() !!}
        <div class="tab-content">
            <div class="tab-pane active px-7" id="info" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane produktu:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa produktu:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $bancassurance->name }}" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod produktu:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="number" value="{{ $bancassurance->code }}" name="code" id="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod OWU:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $bancassurance->code_owu }}" name="code_owu" id="code_owu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Subskrypcja:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="number" value="{{ $bancassurance->subscription }}" name="subscription" id="subscription">
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane dystrybutora:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa dystrybutora:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $bancassurance->dist }}" name="dist" id="dist">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod dystrybutora:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $bancassurance->dist_short }}" name="dist_short" id="dist_short">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane px-7" id="files" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="alert alert-custom alert-light-primary fade show mb-5" role="alert">
                            <div class="alert-text">
                                <b>Wskazówka!</b><br>
                                Podczas edycji ubezpieczenia uzupełniasz podstawowe informację na temat kompletu dokumentów.<br>
                                Aby dodać nowy dokument przejdź do zakładki <a href="{{ route('files.create') }}" 
                                @cannot('create', App\Models\File::class)
                                     data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="<b>Uwaga!</b> Nie posiadasz uprawnienia do dodawania dokumentów!"
                                @endcannot
                                ><b>Dodaj Dokument</b></a>.
                            </div>
                        </div>
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane dokumentów:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Dokumenty ważne od:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid datepicker" style="width: 100% !important;" type="text" value="{{ $bancassurance->edit_date }}" name="edit_date" id="edit_date" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Status dokumentów:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" value="{{ $bancassurance->status }}" name="status" id="status">
                                    <option value="A" @if($bancassurance->status == 'A') selected @endif>Aktywne</option>
                                    <option value="N" @if($bancassurance->status == 'N') selected @endif>Archiwalne</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/products/bancassurances/edit.js') }}" type="text/javascript"></script>
@stop