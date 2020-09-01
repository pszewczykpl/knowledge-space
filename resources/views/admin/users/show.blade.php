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
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div>

        <div class="col-12 col-md-8">
            @if($user->id === Auth::user()->id)
			<div class="card card-custom gutter-b">
				<div class="card-body">
					<div class="d-flex align-items-center">
						<div class="symbol symbol-40 symbol-light-success mr-5">
							<span class="symbol-label" style="background-image:url('{{ asset('storage/uploads/avatars/') }}/{{ $user->avatar_filename }}')"></span>
						</div>
						<span class="text-muted font-weight-bold font-size-lg">Coś nowego, <b>{{ $user->first_name }}</b>?</span>
					</div>
					{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_2_form', 'class' => 'pt-10 ql-quil ql-quil-plain']) !!}
						{!! Form::token() !!}
						<div id="editor" name="editor" class="font-size-lg"></div>
						<textarea name="content" style="display:none" id="content"></textarea>
						<div class="border-top my-5"></div>
						<div id="kt_forms_widget_2_editor_toolbar" class="ql-toolbar d-flex align-items-center justify-content-between">
							<div class="mr-2">
								<span class="ql-formats ml-0">
									<button class="ql-bold"></button>
									<button class="ql-italic"></button>
									<button class="ql-underline"></button>
									<button class="ql-strike"></button>
									<button class="ql-image"></button>
									<button class="ql-link"></button>
								</span>
							</div>
							<div class="">
								<input type="submit" id="submit" name="submit" value="Wyślij" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2">
									{{-- <span class="svg-icon svg-icon-md svg-icon-primary pr-0">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M3,13.5 L19,12 L3,10.5 L3,3.7732928 C3,3.70255344 3.01501031,3.63261921 3.04403925,3.56811047 C3.15735832,3.3162903 3.45336217,3.20401298 3.70518234,3.31733205 L21.9867539,11.5440392 C22.098181,11.5941815 22.1873901,11.6833905 22.2375323,11.7948177 C22.3508514,12.0466378 22.2385741,12.3426417 21.9867539,12.4559608 L3.70518234,20.6826679 C3.64067359,20.7116969 3.57073936,20.7267072 3.5,20.7267072 C3.22385763,20.7267072 3,20.5028496 3,20.2267072 L3,13.5 Z" fill="#000000"/>
											</g>
										</svg>
									</span>
									Wyślij --}}
								{{-- </a> --}}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
			@endif

            @if($user->news->count() == 0)
            <div class="alert alert-custom alert-white shadow-sm fade show text-center" role="alert">
                @if($user->id === Auth::user()->id)
                <div class="alert-text">Nie posiadasz żadnych aktualności... Napisz swoją pierwszą!</div>
                @else
                <div class="alert-text">Użytkownik nie posiada żadnych aktualności...</div>
                @endif
            </div>
            @endif
            
            @foreach($user->news->sortByDesc('created_at')->take(10) as $new)
		    <div class="card card-custom gutter-b">
		    	<div class="card-body">
		    		<div>
		    			<div class="d-flex align-items-center pb-4">
		    				<div class="symbol symbol-40 symbol-light-success mr-5">
		    					<span class="symbol-label" style="background-image:url('{{ asset('storage/uploads/avatars/') }}/{{ $new->user->avatar_filename }}')"></span>
		    				</div>
		    				<div class="d-flex flex-column flex-grow-1">
		    					<a href="{{ route('users.show', $new->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $new->user->first_name }} {{ $new->user->last_name }}</a>
		    					<a href="{{ route('news.show', $new->id) }}" class="text-muted font-weight-bold">{{ $new->created_at }}</a>
		    				</div>
		    			</div>
		    			<style>.show-news p { margin-top: 0; margin-bottom: 0; }</style>
		    			<div>
		    				<div class="show-news text-dark-75 font-size-lg font-weight-normal">
		    					{!! $new->content !!}
		    				</div>
		    				<div class="d-flex align-items-center pt-4">
		    					<span class="btn btn-text-primary btn-icon-primary btn-sm btn-text-dark-50 bg-light-primary rounded font-weight-bolder font-size-sm p-2 pr-4 mr-2">
		    					<span class="svg-icon svg-icon-md svg-icon-primary pr-2">
		    						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
		    							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		    								<rect x="0" y="0" width="24" height="24" />
		    								<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
		    								<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
		    							</g>
		    						</svg>
		    					</span>{{ $new->replies->count() }}</span>
		    				</div>
    
		    				@foreach($new->replies as $reply)
		    					<div class="d-flex py-5">
		    						<div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
		    							<span class="symbol-label" style="background-image:url('{{ asset('storage/uploads/avatars/') }}/{{ $reply->user->avatar_filename }}')"></span>
		    						</div>
		    						<div class="d-flex flex-column flex-row-fluid">
		    							<div class="d-flex align-items-center flex-wrap">
		    								<a href="{{ route('users.show', $reply->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{ $reply->user->first_name }} {{ $reply->user->last_name }}</a>
		    								<span class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{ $reply->created_at }}</span>
		    								<span class="text-muted font-weight-normal font-size-sm">Odpowiedź</span>
		    							</div>
		    							<span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $reply->content }}</span>
		    						</div>
		    					</div>
		    				@endforeach

		    			</div>
		    		</div>

		    		@auth
		    		<div class="separator separator-solid mt-5 mb-4"></div>
		    		{!! Form::open(['route' => 'replies.store', 'method' => 'post', 'class' => 'position-relative']) !!}
		    			<input type="hidden" id="news_id" name="news_id" value="{{ $new->id }}">
		    			<input id="content" name="content" class="form-control form-control-sm border-0 p-0 pr-10 resize-none" placeholder="Wpisz treść odpowiedzi...">
		    			<div class="position-absolute top-0 right-0 mt-n0 mr-n2">
		    				<input type="submit" value="Odpowiedz" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2 pr-4">
		    			</div>
		    		{!! Form::close() !!}
		    		@endauth

		    	</div>
		    </div>
		    @endforeach

            <div class="text-center">
				<a href="{{ route('news.index') }}" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14">Przejdź do aktualności</a>
			</div>

        </div>

    </div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/admin/users/show.js') }}" type="text/javascript"></script>
@stop