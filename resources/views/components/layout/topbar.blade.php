<div id="kt_header" style="" class="header align-items-stretch">
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
			<div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
				<span class="svg-icon svg-icon-2x mt-1">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24" />
							<rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
							<path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3" />
						</g>
					</svg>
				</span>
			</div>
		</div>
		<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
			<a href="{{ route('home.index') }}" class="d-lg-none">
				<img alt="Logo" src="{{ asset('media/logos/logo-std.png') }}" class="h-30px" />
			</a>
		</div>

		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<div class="d-flex align-items-stretch" id="kt_header_nav">
				<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                    @auth
						<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch" id="#kt_header_menu" data-kt-menu="true">
							<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item show menu-lg-down-accordion me-lg-1">
								<span class="menu-link py-3">
									<span class="menu-title">Administracja</span>
									<span class="menu-arrow d-lg-none"></span>
								</span>
								<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
									@can('viewany', App\Models\Note::class)
										<div class="menu-item {{ (request()->routeIs('notes.*')) ? 'here' : '' }}">
											<a class="menu-link py-3" href="{{ route('notes.index') }}">
												<span class="menu-icon">
													@include('svg.note', ['class' => 'svg-icon svg-icon-2'])
												</span>
												<span class="menu-title">Notatki</span>
											</a>
										</div>
									@endcan
									@can('viewany', App\Models\Note::class)
										<div class="menu-item {{ (request()->routeIs('permissions.*')) ? 'here' : '' }}">
											<a class="menu-link py-3" href="{{ route('permissions.index') }}">
											<span class="menu-icon">
												@include('svg.permissions', ['class' => 'svg-icon svg-icon-2'])
											</span>
												<span class="menu-title">Uprawnienia</span>
											</a>
										</div>
									@endcan
									<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion {{ ((request()->routeIs('posts.index')) or (request()->routeIs('posts.create*')) or (request()->routeIs('post-categories.index')) or (request()->routeIs('post-categories.create'))) ? 'here' : '' }}">
										<span class="menu-link py-3">
											<span class="menu-icon">
												@include('svg.post', ['class' => 'svg-icon svg-icon-2'])
											</span>
											<span class="menu-title">Artykuły</span>
											<span class="menu-arrow"></span>
										</span>
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
											<div class="menu-item {{ (request()->routeIs('posts.index')) ? 'here' : '' }}">
												<a class="menu-link py-3" href="{{ route('posts.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Przeglądaj listę artykułów</span>
												</a>
											</div>
											@can('create', App\Models\Post::class)
											<div class="menu-item {{ (request()->routeIs('posts.create')) ? 'here' : '' }}">
												<a class="menu-link py-3" href="{{ route('posts.create') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Dodaj nowy artykuł</span>
												</a>
											</div>
											@endcan
											@can('viewany', App\Models\PostCategory::class)
											<div class="menu-item {{ (request()->routeIs('post-categories.index')) ? 'here' : '' }}">
												<a class="menu-link py-3" href="{{ route('post-categories.index') }}">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Przeglądaj listę kategorii artykułów</span>
												</a>
											</div>
											@endcan
											@can('create', App\Models\PostCategory::class)
												<div class="menu-item {{ (request()->routeIs('post-categories.create')) ? 'here' : '' }}">
													<a class="menu-link py-3" href="{{ route('post-categories.create') }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Dodaj nową kategorię artykułów</span>
													</a>
												</div>
											@endcan
										</div>
									</div>
										<div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion {{ ((request()->routeIs('files.index')) or (request()->routeIs('files.create*')) or (request()->routeIs('file-categories.index')) or (request()->routeIs('file-categories.create'))) ? 'here' : '' }}">
										<span class="menu-link py-3">
											<span class="menu-icon">
												@include('svg.file', ['class' => 'svg-icon svg-icon-2'])
											</span>
											<span class="menu-title">Dokumenty</span>
											<span class="menu-arrow"></span>
										</span>
										<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg py-lg-4 w-lg-225px">
											@can('viewany', App\Models\File::class)
												<div class="menu-item {{ (request()->routeIs('files.index')) ? 'here' : '' }}">
													<a class="menu-link py-3" href="{{ route('files.index') }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Przeglądaj listę dokumentów</span>
													</a>
												</div>
											@endcan
											@can('create', App\Models\File::class)
												<div class="menu-item {{ (request()->routeIs('files.create')) ? 'here' : '' }}">
													<a class="menu-link py-3" href="{{ route('files.create') }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Dodaj nowy dokument</span>
													</a>
												</div>
											@endcan
											@can('viewany', App\Models\FileCategory::class)
												<div class="menu-item {{ (request()->routeIs('file-categories.index')) ? 'here' : '' }}">
													<a class="menu-link py-3" href="{{ route('file-categories.index') }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Przeglądaj listę kategorii dokumentów</span>
													</a>
												</div>
											@endcan
											@can('viewany', App\Models\FileCategory::class)
												<div class="menu-item {{ (request()->routeIs('file-categories.create')) ? 'here' : '' }}">
													<a class="menu-link py-3" href="{{ route('file-categories.create') }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
														<span class="menu-title">Dodaj nową kategorię dokumentów</span>
													</a>
												</div>
											@endcan
										</div>
									</div>
								</div>
							</div>
						</div>
					@endauth
				</div>
			</div>
		</div>
		<div class="d-flex align-items-stretch flex-shrink-0">
			<div class="d-flex align-items-stretch flex-shrink-0">
				@auth
				<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
					<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
						<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" />
					</div>
					<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
						<div class="menu-item px-3">
							<div class="menu-content d-flex align-items-center px-3">
								<div class="symbol symbol-50px me-5">
									<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" />
								</div>
								<div class="d-flex flex-column">
									<div class="fw-bolder d-flex align-items-center fs-5">{{ Auth::user()->full_name }}</div>
									<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ Auth::user()->position }}</a>
								</div>
							</div>
						</div>
						<div class="separator my-2"></div>
						<div class="menu-item px-5">
							<a href="{{ route('users.show', Auth::user()->id) }}" class="menu-link px-5">Mój profil</a>
						</div>
						<div class="menu-item px-5">
							<a onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="menu-link px-5">Wyloguj się</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</div>
				</div>
				@endauth

				<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
					<div class="btn btn-icon btn-active-light-primary" id="kt_header_menu_mobile_toggle">
						<span class="svg-icon svg-icon-1">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path fill-rule="evenodd" clip-rule="evenodd" d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z" fill="black" />
									<path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z" fill="black" />
								</g>
							</svg>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>