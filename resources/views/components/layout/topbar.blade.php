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
				<img alt="Logo" src="{{ asset('media/logos/logo-std.png') }}" class="h-30px" />
			</a>
		</div>
		<div class="d-flex flex-shrink-0">
			@yield('toolbar')

			@auth
			<span class="h-40px border-gray-300 card-shadow border-start mx-4"></span>

			<div class="d-flex align-items-center" id="kt_header_user_menu_toggle">
				<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
					<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" class="card-rounded">
				</div>
				<div class="menu menu-sub menu-sub-dropdown menu-column card-rounded menu-gray-600 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true" style="">
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
					<div class="menu-item px-5">
						<a onclick="event.preventDefault();document.getElementById('logout-form-home').submit();" class="menu-link card-rounded px-5">
							<span class="menu-text">Wyloguj</span>
						</a>
						<form id="logout-form-home" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
					<div class="separator my-2"></div>
					<div class="menu-item px-5">
						<a href="{{ route('system-configuration.dark-mode') }}" class="menu-link card-rounded px-5">
							<span class="menu-text">Wypróbuj Tryb ciemny</span>
						</a>
					</div>
				</div>
			</div>
			@else
				<span class="h-40px border-gray-300 card-shadow border-start mx-4"></span>
				<a href="{{ route('login') }}" class="btn btn-outline btn-outline-dashed card-rounded btn-outline-default">Zaloguj się</a>
			@endauth

		</div>
	</div>
</div>