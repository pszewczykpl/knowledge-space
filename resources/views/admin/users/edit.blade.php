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

		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-arrow-left"></i>Anuluj
		</a>

        <input type="submit" class="btn btn-light-primary btn-icon-sm ml-1" form="user_update_form" value="Zapisz">

	</div>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
	    
        <div class="col-12 col-md-4">
            <div class="card card-custom gutter-b">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-column pt-4 h-100">
						<div class="pb-5">
							<div class="d-flex flex-column flex-center">
								<div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
									<span class="symbol-label">
										<img src="{{ asset('storage/uploads/avatars/') }}/{{ $user->avatar_filename }}" class="h-100" alt="" />
									</span>
								</div>
								<div class="pt-2 text-center">
                                    <span class="text-dark-75 text-primary card-title font-weight-bold font-size-h4">
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    </span>
                                </div>
                                <div class="pt-2 text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <path d="M20,8 L18.173913,8 C17.0693435,8 16.173913,8.8954305 16.173913,10 L16.173913,12 C16.173913,12.5522847 15.7261978,13 15.173913,13 L8.86956522,13 C8.31728047,13 7.86956522,12.5522847 7.86956522,12 L7.86956522,10 C7.86956522,8.8954305 6.97413472,8 5.86956522,8 L4,8 L4,6 C4,4.34314575 5.34314575,3 7,3 L17,3 C18.6568542,3 20,4.34314575 20,6 L20,8 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M6.15999985,21.0604779 L8.15999985,17.5963763 C8.43614222,17.1180837 9.04773263,16.9542085 9.52602525,17.2303509 C10.0043179,17.5064933 10.168193,18.1180837 9.89205065,18.5963763 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 Z M17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L14.1000004,18.5660262 C13.823858,18.0877335 13.9877332,17.4761431 14.4660258,17.2000008 C14.9443184,16.9238584 15.5559088,17.0877335 15.8320512,17.5660262 L17.8320512,21.0301278 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M20,10 L20,15 C20,16.6568542 18.6568542,18 17,18 L7,18 C5.34314575,18 4,16.6568542 4,15 L4,10 L5.86956522,10 L5.86956522,12 C5.86956522,13.6568542 7.21271097,15 8.86956522,15 L15.173913,15 C16.8307673,15 18.173913,13.6568542 18.173913,12 L18.173913,10 L20,10 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ $user->position }}
                                    </span>
                                </div>
                                <div class="pt-6 text-center">
                                    <span class="text-dark-75 font-weight-normal font-size-lg">
                                        {{ $user->description }}
                                    </span>
                                </div>
                                <div class="pt-8 text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                                <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                                <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ $user->company }}
                                    </span>
                                </div>
                                <div class="pt-2 text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ $user->location }}
                                    </span>
                                </div>
                                <div class="pt-2 text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ $user->department->name }}
                                    </span>
                                </div>
                                <div class="pt-8 text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ $user->email }}
                                    </span>
                                </div>
                                <div class="pt-2 text-center">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M8,2.5 C7.30964406,2.5 6.75,3.05964406 6.75,3.75 L6.75,20.25 C6.75,20.9403559 7.30964406,21.5 8,21.5 L16,21.5 C16.6903559,21.5 17.25,20.9403559 17.25,20.25 L17.25,3.75 C17.25,3.05964406 16.6903559,2.5 16,2.5 L8,2.5 Z M8,1 L16,1 C17.5187831,1 18.75,2.23121694 18.75,3.75 L18.75,20.25 C18.75,21.7687831 17.5187831,23 16,23 L8,23 C6.48121694,23 5.25,21.7687831 5.25,20.25 L5.25,3.75 C5.25,2.23121694 6.48121694,1 8,1 Z M9.5,1.75 L14.5,1.75 C14.7761424,1.75 15,1.97385763 15,2.25 L15,3.25 C15,3.52614237 14.7761424,3.75 14.5,3.75 L9.5,3.75 C9.22385763,3.75 9,3.52614237 9,3.25 L9,2.25 C9,1.97385763 9.22385763,1.75 9.5,1.75 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="text-dark-75 font-weight-bold">
                                        {{ $user->phone }}
                                    </span>
                                </div>
                                <div class="d-flex flex-center pt-8">
									<a href="{{ route('users.show', $user->id) }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">Odwiedź profil</a>
								</div>
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div>

        <div class="col-12 col-md-8">

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
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                                                    <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Dane personalne</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#files" role="tab">
                                    <span class="nav-icon mr-2">
                                        <span class="svg-icon mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M14.8875071,12.8306874 L12.9310336,12.8306874 L12.9310336,10.8230161 C12.9310336,10.5468737 12.707176,10.3230161 12.4310336,10.3230161 L11.4077349,10.3230161 C11.1315925,10.3230161 10.9077349,10.5468737 10.9077349,10.8230161 L10.9077349,12.8306874 L8.9512614,12.8306874 C8.67511903,12.8306874 8.4512614,13.054545 8.4512614,13.3306874 C8.4512614,13.448999 8.49321518,13.5634776 8.56966458,13.6537723 L11.5377874,17.1594334 C11.7162223,17.3701835 12.0317191,17.3963802 12.2424692,17.2179453 C12.2635563,17.2000915 12.2831273,17.1805206 12.3009811,17.1594334 L15.2691039,13.6537723 C15.4475388,13.4430222 15.4213421,13.1275254 15.210592,12.9490905 C15.1202973,12.8726411 15.0058187,12.8306874 14.8875071,12.8306874 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                        </span>
                                    </span>
                                    <span class="nav-text font-weight-bold">Konto</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body px-0">
                    {!! Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT', 'id' => 'user_update_form']) !!}
                    {!! Form::token() !!}
                        <div class="tab-content">
                            <div class="tab-pane active px-7" id="info" role="tabpanel">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-8">
                                        
                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Dane użytkownika:</h6>
                                            </div>
                                        </div>

                                        <div class="form-group row">
											<label class="col-xl-3 col-lg-3 text-right col-form-label">Avatar</label>
											<div class="col-lg-9 col-xl-9">
												<div class="image-input image-input-outline image-input-circle" id="kt_user_avatar">
													<div class="image-input-wrapper" style="background-image: url({{ asset('storage/uploads/avatars/') }}/{{ $user->avatar_filename }})"></div>
													<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Zmień avatar">
														<i class="fa fa-pen icon-sm text-muted"></i>
														<input type="file" name="profile_avatar" id="profile_avatar" accept=".png, .jpg, .jpeg" />
														<input type="hidden" name="profile_avatar_remove" />
													</label>
													<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Usuń avatar">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>
													<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Usuń avatar">
														<i class="ki ki-bold-close icon-xs text-muted"></i>
													</span>
												</div>
											</div>
										</div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Imię</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->first_name }}" name="first_name" id="first_name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Nazwisko</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->last_name }}" name="last_name" id="last_name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">E-mail</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->email }}" name="email" id="email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Telefon</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->phone }}" name="phone" id="phone">
                                            </div>
                                        </div>

                                        <div class="separator separator-dashed my-10"></div>

                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Praca:</h6>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa firmy</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->company }}" name="company" id="company">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Lokalizacja</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->location }}" name="location" id="location">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Departament</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->department }}" name="department" id="department">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Stanowisko</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" type="text" value="{{ $user->position }}" name="position" id="position">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Opis</label>
                                            <div class="col-9">
                                                <textarea class="form-control form-control-lg form-control-solid" rows="4" name="description" id="description">{{ $user->description }}</textarea>
                                            </div>
                                        </div>
                                                
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane px-7" id="files" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-2"></div>
                                    <div class="col-xl-7 my-2">
                        
                                        <div class="row">
                                            <label class="col-3"></label>
                                            <div class="col-9">
                                                <h6 class="text-dark font-weight-bold mb-10">Dane konta:</h6>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Nazwa użytkownika</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="text" value="{{ $user->username }}" name="username" id="username">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-form-label col-3 text-lg-right text-left">Hasło</label>
                                            <div class="col-9">
                                                <input class="form-control form-control-lg form-control-solid" style="width: 100% !important;" type="password" value="{{ $user->password }}" name="password" id="password">
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

    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/admin/users/edit.js') }}" type="text/javascript"></script>
@stop