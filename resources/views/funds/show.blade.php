@extends('master')

@section('subheader')
<!--  Content Head -->
<div class="kt-container  kt-container--fluid ">
	<div class="kt-subheader__main">
        <!-- Title -->
		<h3 class="kt-subheader__title">
			Szczegóły
		</h3>
        <!-- End: Title -->
		<span class="kt-subheader__separator kt-subheader__separator--v"></span>
		<!-- Description -->

        <div class="kt-subheader__breadcrumbs">
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">{{ $fund->code }}</span>
            </div>
        </div>
		<!-- End: Description -->
    </div>
    <div class="kt-subheader__toolbar">
        <a href="{{ route('funds.index') }}" class="btn btn-clean btn-icon-sm">
            <i class="la la-long-arrow-left"></i>Powrót
        </a>
        <a class="btn btn-label-brand btn-bold" onclick="CopyView({{ $fund->id }}, 'funds')">Udostępnij</a>
    </div>

</div>
@stop

@section('content')
    



    <div class="row">
        <div class="col-lg-4">
            <div class="kt-portlet">
                <div class="kt-portlet__head">

                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Szczegóły funduszu
                        </h3>
                    </div>
                    
                </div>
                <div class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Nazwa funduszu:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->name }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Kod funduszu:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->code }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Rodzaj:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->type }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Status:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->status }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Waluta:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->currency }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Data udostępnienia:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->start_date }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Data likwidacji:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->cancel_date }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Powód likwidacji:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext kt-font-bolder">{{ $fund->cance_reason }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End:: Product Details -->
        
            <div class="kt-portlet">
                
                <div class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Ostatnia edycja:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext">{{ $fund->updated_at }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Utworzone:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext">{{ $fund->created_at }}</span>
                            </div>
                        </div>
                        <div class="form-group form-group-xs row">
                            <label class="col-5 col-form-label">Utworzone przez:</label>
                            <div class="col-7">
                                <span class="form-control-plaintext">sds</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--End:: Product Details -->
        </div>

        <div class="col-lg-8">
            <!--Begin:: Portlet-->
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-line-2x" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#comments" role="tab" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
                                            <path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg> Komentarze
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#files" role="tab" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M14.8875071,12.8306874 L12.9310336,12.8306874 L12.9310336,10.8230161 C12.9310336,10.5468737 12.707176,10.3230161 12.4310336,10.3230161 L11.4077349,10.3230161 C11.1315925,10.3230161 10.9077349,10.5468737 10.9077349,10.8230161 L10.9077349,12.8306874 L8.9512614,12.8306874 C8.67511903,12.8306874 8.4512614,13.054545 8.4512614,13.3306874 C8.4512614,13.448999 8.49321518,13.5634776 8.56966458,13.6537723 L11.5377874,17.1594334 C11.7162223,17.3701835 12.0317191,17.3963802 12.2424692,17.2179453 C12.2635563,17.2000915 12.2831273,17.1805206 12.3009811,17.1594334 L15.2691039,13.6537723 C15.4475388,13.4430222 15.4213421,13.1275254 15.210592,12.9490905 C15.1202973,12.8726411 15.0058187,12.8306874 14.8875071,12.8306874 Z" fill="#000000"/>
                                        </g>
                                    </svg> Dokumenty
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#funds" role="tab" aria-selected="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"></path>
                                            <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"></path>
                                        </g>
                                    </svg> Fundusze
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <!--Begin:: Tab Content-->
                        <div class="tab-pane " id="comments" role="tabpanel">
                            <div class="kt-notes kt-scroll kt-scroll--pull" data-scroll="true">
                                <div class="kt-notes__items">

                                    <div class="kt-notes__item">
                                        <div class="kt-notes__media">
                                            <span class="kt-notes__icon">
                                                <i class="flaticon2-notification kt-font-danger"></i>
                                            </span>
                                                    </div>
                                                    <div class="kt-notes__content">
                                                        <div class="kt-notes__section">
                                                            <div class="kt-notes__info">
                                                                <a class="kt-notes__title">
                                                                    Porozumienie UOKiK
                                                                </a>
                                                                <span class="kt-notes__desc">
                                                        00:00 01 Marca, 2020
                                                    </span>
                                                                <span class="kt-badge kt-badge--danger kt-badge--inline">ważne</span>
                                                            </div>
                                                            <div class="kt-notes__dropdown">
                                                                <a href="#" class="btn btn-sm btn-icon-md btn-icon" data-toggle="dropdown">
                                                                    <i class="flaticon-more-1 kt-font-brand"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="kt-nav">
                                                                        <li class="kt-nav__item">
                                                                            <a class="kt-nav__link disabled" >
                                                                                <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                                                <span class="kt-nav__link-text">Usuń</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="kt-notes__body">
                                                Produkt został objęty Porozumieniem UOKiK z dnia 20 grudnia 2016r.
                                            </span>
                                        </div>
                                    </div>

                                    <div class="kt-notes__item">
                                        <div class="kt-notes__media">
                                            <span class="kt-notes__icon">
                                                <i class="flaticon2-menu-1 kt-font-brand"></i>
                                            </span>
                                                    </div>
                                                    <div class="kt-notes__content">
                                                        <div class="kt-notes__section">
                                                            <div class="kt-notes__info">
                                                                <a class="kt-notes__title">
                                                                    Zakładka Notowania Funduszy
                                                                </a>
                                                                <span class="kt-notes__desc">
                                                        00:00 01 Marca, 2020
                                                    </span>
                                                                <span class="kt-badge kt-badge--brand kt-badge--inline">system</span>
                                                            </div>
                                                            <div class="kt-notes__dropdown">
                                                                <a href="#" class="btn btn-sm btn-icon-md btn-icon" data-toggle="dropdown">
                                                                    <i class="flaticon-more-1 kt-font-brand"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="kt-nav">
                                                                        <li class="kt-nav__item">
                                                                            <a href="#" class="kt-nav__link">
                                                                                <i class="kt-nav__link-icon flaticon2-trash"></i>
                                                                                <span class="kt-nav__link-text">Usuń</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span class="kt-notes__body">
                                                Kliknij <strong><a href="https://notowania.openlife.pl/?distributorId=7&productId=84" target="_blank">tutaj</a></strong>, aby przejść do zakładki Notowania Funduszy dla tego produktu.
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--End:: Tab Content-->

                        <style>
                        .kt-widget4 .kt-widget4__item .kt-widget4__title {
                            font-size: 0.96rem;
                        }
                        .kt-widget4 .kt-widget4__item .kt-widget4__pic img {
                            width: 2.35rem;
                        }
                        .kt-widget4 {
                            padding-bottom: 30px;
                        }
                        </style>


                        <!--Begin:: Tab Content-->
                        <div class="tab-pane active" id="files" role="tabpanel">

                            

                        </div>
                        <div class="tab-pane" id="funds" role="tabpanel">
                            
                        </div>
                        <!--End:: Tab Content-->

                    </div>
                </div>
            </div>
            <!--End:: Portlet-->
        </div>
    </div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/funds/show.js') }}" type="text/javascript"></script>
@stop