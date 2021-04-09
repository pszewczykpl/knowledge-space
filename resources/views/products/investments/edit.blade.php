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
        <a href="{{ route('investments.show', $investment) }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Anuluj</a>
        @can('update', $investment)
            <a onclick='document.getElementById("investment_update_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) Zapisz</a>
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
        {!! Form::open(['route' => ['investments.update', $investment->id], 'method' => 'PUT', 'id' => 'investment_update_form']) !!}
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
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->name }}" name="name" id="name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod produktu:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->code }}" name="code" id="code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod OWU:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->code_owu }}" name="code_owu" id="code_owu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod TOiL:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->code_toil }}" name="code_toil" id="code_toil">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Grupa produktowa:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->group }}" name="group" id="group">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Typ produktu:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" value="{{ $investment->type }}" name="type" id="type">
                                    <option value="indywidualny" @if($investment->type == 'indywidualny') selected @endif>Indywidualny</option>
                                    <option value="grupowy" @if($investment->type == 'grupowy') selected @endif>Grupowy</option>
                                </select>
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
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->dist }}" name="dist" id="dist">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod dystrybutora:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $investment->dist_short }}" name="dist_short" id="dist_short">
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
                                <input class="form-control form-control-lg form-control-solid datepicker" style="width: 100% !important;" type="text" value="{{ $investment->edit_date }}" name="edit_date" id="edit_date" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Status dokumentów:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" value="{{ $investment->status }}" name="status" id="status">
                                    <option value="A" @if($investment->status == 'A') selected @endif>Aktywne</option>
                                    <option value="N" @if($investment->status == 'N') selected @endif>Archiwalne</option>
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
<script src="{{ asset('js/pages/products/investments/edit.js') }}" type="text/javascript"></script>
@stop