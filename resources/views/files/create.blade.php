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
        @can('create', App\File::class)
        <a onclick='document.getElementById("file_store_form").submit();' class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
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
											<polygon points="0 0 24 0 24 24 0 24"/>
											<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
											<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
											<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
										</g>
									</svg>
                                </span>
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#relations" role="tab">
                            <span class="nav-icon mr-2">
                                <span class="svg-icon mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M11.6734943,8.3307728 L14.9993074,6.09979492 L14.1213255,5.22181303 C13.7308012,4.83128874 13.7308012,4.19812376 14.1213255,3.80759947 L15.535539,2.39338591 C15.9260633,2.00286161 16.5592283,2.00286161 16.9497526,2.39338591 L22.6066068,8.05024016 C22.9971311,8.44076445 22.9971311,9.07392943 22.6066068,9.46445372 L21.1923933,10.8786673 C20.801869,11.2691916 20.168704,11.2691916 19.7781797,10.8786673 L18.9002333,10.0007208 L16.6692373,13.3265608 C16.9264145,14.2523264 16.9984943,15.2320236 16.8664372,16.2092466 L16.4344698,19.4058049 C16.360509,19.9531149 15.8568695,20.3368403 15.3095595,20.2628795 C15.0925691,20.2335564 14.8912006,20.1338238 14.7363706,19.9789938 L5.02099894,10.2636221 C4.63047465,9.87309784 4.63047465,9.23993286 5.02099894,8.84940857 C5.17582897,8.69457854 5.37719743,8.59484594 5.59418783,8.56552292 L8.79074617,8.13355557 C9.76799113,8.00149544 10.7477104,8.0735815 11.6734943,8.3307728 Z" fill="#000000"/>
                                            <polygon fill="#000000" opacity="0.3" transform="translate(7.050253, 17.949747) rotate(-315.000000) translate(-7.050253, -17.949747) " points="5.55025253 13.9497475 5.55025253 19.6640332 7.05025253 21.9497475 8.55025253 19.6640332 8.55025253 13.9497475"/>
                                        </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-text font-weight-bold">Powiązania</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body px-0">
        {!! Form::open(['route' => 'files.store', 'method' => 'post', 'files' => true, 'id' => 'file_store_form']) !!}
        <div class="tab-content">
            <div class="tab-pane active px-7" id="info" role="tabpanel">
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-7 my-2">
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dane dokumentu:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa wyświetlana:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="name" id="name" placeholder="Wpisz Nazwę wyświetlaną">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kategoria dokumentu:</label>
                            <div class="col-9">
                                <select class="form-control form-control-lg form-control-solid" name="file_category_id" id="file_category_id">
                                    @foreach($file_categories as $file_category)
                                    <option value="{{ $file_category->id }}">{{ $file_category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Plik:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="file" name="file" id="file" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane px-7" id="relations" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-custom alert-light-primary mb-5" role="alert">
									<div class="alert-icon">
										<i class="flaticon-info"></i>
									</div>
									<div class="alert-text">
                                        Poniżej należy wskazać obiekty w których ma pojawić się dokument.<br>
                                        Jeśli chcesz usunąć widoczność dokumentu w którymkolwiek z obiektów - odznacz wybrany obiekt na liście. 
                                    </div>
								</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4 text-left">Ubezpieczenia Inwestycyjne</label>
                            <div class="col-8">
                                <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="investment_id[]" id="investment_id[]" data-actions-box="true" data-live-search="true">
                                    @foreach($investments as $investment)
                                    <option value="{{ $investment->id }}">{{ $investment->name }} ({{ $investment->code_toil }}) od {{ $investment->edit_date }}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Wskaż ubezpieczenia inwestycyjne w których ma pojawić się dokument.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4 text-left">Ubezpieczenia Ochronne</label>
                            <div class="col-8">
                                <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="protective_id[]" id="protective_id[]" data-actions-box="true" data-live-search="true">
                                    @foreach($protectives as $protective)
                                    <option value="{{ $protective->id }}">{{ $protective->name }} ({{ $protective->edit_date }})</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Wskaż ubezpieczenia ochronne w których ma pojawić się dokument.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4 text-left">Ubezpieczenia Pracownicze</label>
                            <div class="col-8">
                                <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="employee_id[]" id="employee_id[]" data-actions-box="true" data-live-search="true">
                                    @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }} ({{ $employee->edit_date }})</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Wskaż ubezpieczenia pracownicze w których ma pojawić się dokument.</span>
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
<script src="{{ asset('js/pages/files/create.js') }}" type="text/javascript"></script>
@stop