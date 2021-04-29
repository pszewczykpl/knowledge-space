@extends('layouts.app')

@section('subheader')
    <x-layout.subheader :description="$description" />
@stop

@section('toolbar')
        <a href="{{ route('files.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) {{ __('Cancel') }}</a>
        @can('create', App\Models\File::class)
        <a onclick='document.getElementById("file_store_form").submit();' class="btn btn-light-primary btn-sm">@include('svg.save', ['class' => 'navi-icon']) {{ __('Save') }}</a>
        @endcan
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
                                @include('svg.file', ['class' => 'mr-3'])
                            </span>
                            <span class="nav-text font-weight-bold">Szczegóły</span>
                        </a>
                    </li>
                    <li class="nav-item mr-3">
                        <a class="nav-link" data-toggle="tab" href="#relations" role="tab">
                            <span class="nav-icon mr-2">
                                @include('svg.association', ['class' => 'mr-3'])
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
                                    @foreach($fileCategories as $file_category)
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
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Dokument roboczy:</label>
                            <div class="col-9">
                                <label class="checkbox checkbox-lg mt-2">
                                    <input type="checkbox" name="draft_checkbox" id="draft_checkbox">
                                    <span></span>
                                </label>
                                <span class="form-text text-muted">Czy to dokument roboczy?</span>
                            </div>
                        </div>
                        <div class="separator separator-dashed my-10"></div>
                        <div class="row">
							<label class="col-3"></label>
							<div class="col-9">
								<h6 class="text-dark font-weight-bold mb-10">Dokument w API:</h6>
							</div>
						</div>
                        <div class="form-group row">
                            <label class="col-form-label col-3 text-lg-right text-left">Kod dokumentu:</label>
                            <div class="col-9">
                                <input class="form-control form-control-lg form-control-solid" type="text" name="code" id="code" placeholder="Wpisz Kod dokumentu">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-custom alert-light-primary mb-5" role="alert">
									<div class="alert-icon">
										<i class="flaticon-info"></i>
									</div>
									<div class="alert-text">
                                        Kod dokumentu wykorzystywany jest w API systemu.<br>
                                        Aby nadać poprawny kod dokumentu - zapoznaj się z Instrukcją systemu <b>Knowledge Space</b>.
                                    </div>
								</div>
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
                                    <option value="{{ $investment->id }}" @if($fileable_type == 'investment' and $fileable_id == $investment->id) selected @endif>{{ $investment->full_name }}</option>
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
                                    <option value="{{ $protective->id }}" @if($fileable_type == 'protective' and $fileable_id == $protective->id) selected @endif>{{ $protective->extended_name() }}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Wskaż ubezpieczenia ochronne w których ma pojawić się dokument.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4 text-left">Ubezpieczenia Bancassurance</label>
                            <div class="col-8">
                                <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="bancassurance_id[]" id="bancassurance_id[]" data-actions-box="true" data-live-search="true">
                                    @foreach($bancassurances as $bancassurance)
                                    <option value="{{ $bancassurance->id }}" @if($fileable_type == 'bancassurance' and $fileable_id == $bancassurance->id) selected @endif>{{ $bancassurance->extended_name() }}</option>
                                    @endforeach
                                </select>
                                <span class="form-text text-muted">Wskaż ubezpieczenia bancassurance w których ma pojawić się dokument.</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4 text-left">Ubezpieczenia Pracownicze</label>
                            <div class="col-8">
                                <select class="form-control form-control-lg form-control-solid selectpicker" multiple="multiple" name="employee_id[]" id="employee_id[]" data-actions-box="true" data-live-search="true">
                                    @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" @if($fileable_type == 'employee' and $fileable_id == $employee->id) selected @endif>{{ $employee->extended_name() }}</option>
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

@push('scripts')
<script src="{{ asset('js/pages/files/create.js') }}" type="text/javascript"></script>
@endpush