<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '100px', lg: '150px'}">
	<div class="container d-flex align-items-center justify-content-between" id="kt_header_container">
		<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
			<h1 class="text-dark fw-bolder my-0 fs-2">{{ $title }}</h1>
		</div>

		<div class="d-flex d-lg-none align-items-center ms-n2 me-2">
			<div class="btn btn-icon btn-active-icon-primary" id="kt_aside_mobile_toggle">
				<span class="svg-icon svg-icon-2x">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
							<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
						</g>
					</svg>
				</span>
			</div>
			<a href="{{ route('home.index') }}" class="d-flex align-items-center">
				<img alt="Logo" src="{{ asset('images/logos/main.png') }}" class="h-30px" />
			</a>
		</div>
		<div class="d-flex flex-shrink-0">
			@yield('toolbar')

			<span class="h-40px border-gray-300 card-shadow border-start mx-4"></span>

			<div class="d-flex align-items-center pe-3">
				<a class="btn btn-flex flex-center @if($dark_mode) btn-color-gray-600 btn-active-secondary btn-active-color-primary @else btn-bg-white btn-text-gray-500 btn-active-color-primary @endif w-40px w-md-auto h-40px px-0 px-md-4 card-rounded" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
					<span>
						@if(!$dark_mode)
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
								<g fill="none" fill-rule="none" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none" fill-rule="nonzero"></path><g fill="#000000"><path d="M100.33333,121.83333c6.90867,-27.63467 13.7385,-61.90567 -5.031,-90.01333c-0.78833,0.086 -1.60533,0.01433 -2.37933,-0.24367c-1.55517,-0.50883 -2.82367,-1.66267 -3.4615,-3.17483l-7.18817,-16.95633c-1.1825,-2.78067 -3.90583,-4.58667 -6.93017,-4.58667c-3.02433,0 -5.74767,1.806 -6.93017,4.58667l-7.18817,16.95633c-0.63783,1.51217 -1.89917,2.666 -3.4615,3.17483c-1.56233,0.50883 -3.268,0.31533 -4.67983,-0.53033l-15.781,-9.48867c-2.58717,-1.56233 -5.85517,-1.419 -8.299,0.35833c-2.44383,1.77733 -3.58333,4.8375 -2.9025,7.783l4.1495,17.93817c0.3655,1.59817 0.0215,3.28233 -0.93883,4.60817c-0.9675,1.32583 -2.45817,2.1715 -4.09217,2.31483l-18.34667,1.59817c-3.01,0.26517 -5.5685,2.3005 -6.50733,5.17433c-0.93167,2.87383 -0.05733,6.02717 2.22167,8.00517l13.90333,12.07583c1.23983,1.075 1.94933,2.63733 1.94933,4.2785c0,1.64117 -0.7095,3.2035 -1.94933,4.2785l-13.90333,12.07583c-2.279,1.978 -3.15333,5.13133 -2.22167,8.00517c0.93883,2.87383 3.49733,4.90917 6.50733,5.17433l18.34667,1.59817c1.634,0.14333 3.12467,0.989 4.09217,2.31483c0.9675,1.32583 1.3115,3.01 0.93883,4.60817l-4.1495,17.94533c-0.68083,2.9455 0.46583,6.00567 2.90967,7.783c2.44383,1.77017 5.71183,1.9135 8.299,0.35833l15.78817,-9.49583c1.40467,-0.84567 3.10317,-1.03917 4.6655,-0.53033c1.55517,0.50883 2.82367,1.66267 3.4615,3.17483l7.18817,16.95633c1.1825,2.78067 3.90583,4.58667 6.93017,4.58667c3.02433,0 5.74767,-1.806 6.93017,-4.57233l7.18817,-16.95633c0.63783,-1.51217 1.89917,-2.666 3.4615,-3.17483c0.43,-0.14333 0.8815,-0.10033 1.32583,-0.13617c3.182,-5.94833 12.03283,-11.90383 6.0845,-17.85217z" fill-rule="evenodd" opacity="0.35"></path><path d="M93.0735,56.77433c13.1365,19.565 13.1365,45.8165 0,65.3815c-4.09217,6.09883 -9.00133,11.08683 -14.43367,15.0285c-5.70467,4.128 -4.41467,13.12933 2.3435,15.12883c25.57067,7.55367 54.38067,-0.78117 71.767,-25.069c15.98167,-22.33133 15.98167,-53.2125 0.00717,-75.54383c-17.38633,-24.295 -46.2035,-32.637 -71.77417,-25.07617c-6.751,1.9995 -8.041,10.99367 -2.3435,15.12883c5.43233,3.92733 10.34867,8.91533 14.43367,15.02133z" fill-rule="nonzero"></path></g></g>
							</svg>
						@else
							<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
								<g fill="none" fill-rule="none" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none" fill-rule="nonzero"></path><g fill="#ffffff"><path d="M100.33333,121.83333c6.90867,-27.63467 13.7385,-61.90567 -5.031,-90.01333c-0.78833,0.086 -1.60533,0.01433 -2.37933,-0.24367c-1.55517,-0.50883 -2.82367,-1.66267 -3.4615,-3.17483l-7.18817,-16.95633c-1.1825,-2.78067 -3.90583,-4.58667 -6.93017,-4.58667c-3.02433,0 -5.74767,1.806 -6.93017,4.58667l-7.18817,16.95633c-0.63783,1.51217 -1.89917,2.666 -3.4615,3.17483c-1.56233,0.50883 -3.268,0.31533 -4.67983,-0.53033l-15.781,-9.48867c-2.58717,-1.56233 -5.85517,-1.419 -8.299,0.35833c-2.44383,1.77733 -3.58333,4.8375 -2.9025,7.783l4.1495,17.93817c0.3655,1.59817 0.0215,3.28233 -0.93883,4.60817c-0.9675,1.32583 -2.45817,2.1715 -4.09217,2.31483l-18.34667,1.59817c-3.01,0.26517 -5.5685,2.3005 -6.50733,5.17433c-0.93167,2.87383 -0.05733,6.02717 2.22167,8.00517l13.90333,12.07583c1.23983,1.075 1.94933,2.63733 1.94933,4.2785c0,1.64117 -0.7095,3.2035 -1.94933,4.2785l-13.90333,12.07583c-2.279,1.978 -3.15333,5.13133 -2.22167,8.00517c0.93883,2.87383 3.49733,4.90917 6.50733,5.17433l18.34667,1.59817c1.634,0.14333 3.12467,0.989 4.09217,2.31483c0.9675,1.32583 1.3115,3.01 0.93883,4.60817l-4.1495,17.94533c-0.68083,2.9455 0.46583,6.00567 2.90967,7.783c2.44383,1.77017 5.71183,1.9135 8.299,0.35833l15.78817,-9.49583c1.40467,-0.84567 3.10317,-1.03917 4.6655,-0.53033c1.55517,0.50883 2.82367,1.66267 3.4615,3.17483l7.18817,16.95633c1.1825,2.78067 3.90583,4.58667 6.93017,4.58667c3.02433,0 5.74767,-1.806 6.93017,-4.57233l7.18817,-16.95633c0.63783,-1.51217 1.89917,-2.666 3.4615,-3.17483c0.43,-0.14333 0.8815,-0.10033 1.32583,-0.13617c3.182,-5.94833 12.03283,-11.90383 6.0845,-17.85217z" fill-rule="evenodd" opacity="0.35"></path><path d="M93.0735,56.77433c13.1365,19.565 13.1365,45.8165 0,65.3815c-4.09217,6.09883 -9.00133,11.08683 -14.43367,15.0285c-5.70467,4.128 -4.41467,13.12933 2.3435,15.12883c25.57067,7.55367 54.38067,-0.78117 71.767,-25.069c15.98167,-22.33133 15.98167,-53.2125 0.00717,-75.54383c-17.38633,-24.295 -46.2035,-32.637 -71.77417,-25.07617c-6.751,1.9995 -8.041,10.99367 -2.3435,15.12883c5.43233,3.92733 10.34867,8.91533 14.43367,15.02133z" fill-rule="nonzero"></path></g></g>
							</svg>
						@endif
					</span>
				</a>
				<div class="menu menu-sub menu-sub-dropdown menu-column card-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-175px" data-kt-menu="true">
					<div class="menu-item px-3 my-1">
						<a @if($dark_mode) href="{{ route('system-configuration.dark-mode') }}" @endif class="menu-link card-rounded px-5 @if(!$dark_mode)active @endif">
							<span class="menu-title">Jasny motyw</span>
						</a>
					</div>
					<div class="menu-item px-3 my-1">
						<a @if(!$dark_mode) href="{{ route('system-configuration.dark-mode') }}" @endif class="menu-link card-rounded px-5 @if($dark_mode)active @endif">
							<span class="menu-title">Ciemny motyw</span>
						</a>
					</div>
				</div>
			</div>

			@auth
			<div class="d-flex align-items-center" id="kt_header_user_menu_toggle">
				<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
					<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" class="card-rounded">
				</div>
				<div class="menu menu-sub menu-sub-dropdown menu-column card-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
					<div class="menu-item px-3">
						<div class="menu-content d-flex align-items-center px-3">
							<div class="symbol symbol-50px me-5">
								<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" class="card-rounded">
							</div>
							<div class="d-flex flex-column">
								<div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->full_name }} </div>
								<span class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->position }}</span>
							</div>
						</div>
					</div>
					<div class="separator my-2"></div>
					<div class="menu-item px-5">
						<a href="{{ route('users.show', Auth::user()->id) }}" class="menu-link card-rounded px-5">
							<span class="menu-text">Mój profil</span>
						</a>
					</div>
					
					<div class="separator my-2"></div>

					<div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start">
						<a class="menu-link card-rounded px-5">
							<span class="menu-title position-relative">Język 
								<span class="fs-8 card-rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">Polski 
									<span class="svg-icon w-15px h-15px card-rounded ms-2">
										<svg xmlns="http://www.w3.org/2000/svg" class="w-15px h-15px card-rounded ms-2" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
											<rect y="256" style="fill:#FF4B55;" width="512" height="256"/>
											<rect style="fill:#F5F5F5;" width="512" height="256"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
										</svg>
									</span>
								</span>
							</span>
						</a>
						<div class="menu-sub menu-sub-dropdown w-175px py-4">
							<div class="menu-item px-3">
								<a class="menu-link d-flex px-5 card-rounded active">
								<span class="symbol symbol-20px me-4 card-rounded">
									<span class="svg-icon card-rounded">
										<svg xmlns="http://www.w3.org/2000/svg" class="card-rounded" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
											<rect y="256" style="fill:#FF4B55;" width="512" height="256"/>
											<rect style="fill:#F5F5F5;" width="512" height="256"/><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
										</svg>
									</span>
								</span>Polski</a>
							</div>
						</div>
					</div>

					<div class="menu-item px-5">
						<a onclick="event.preventDefault();document.getElementById('logout-form-home').submit();" class="menu-link card-rounded px-5">
							<span class="menu-text">Wyloguj</span>
						</a>
						<form id="logout-form-home" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>


				</div>
			</div>
			@else
				<a href="{{ route('login') }}" class="btn btn-flex flex-center @if($dark_mode) btn-color-gray-600 btn-active-secondary btn-active-color-primary @else btn-bg-white btn-text-gray-500 btn-active-color-primary @endif w-40px w-md-auto h-40px px-0 px-md-6 card-rounded">Zaloguj się</a>
			@endauth

		</div>
	</div>
</div>