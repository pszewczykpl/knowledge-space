<div id="kt_header" class="header header-fixed">
	<div class="container-fluid d-flex align-items-stretch justify-content-between">
		<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
			<div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
				<ul class="menu-nav">
                    @auth
					<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
						<a class="menu-link menu-toggle">
							<span class="menu-text">Administracja</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="menu-submenu menu-submenu-classic menu-submenu-left">
							<ul class="menu-subnav">
                                @can('viewany', App\Models\Note::class)
								<li class="menu-item {{ (request()->routeIs('notes.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
									<a href="{{ route('notes.index') }}" class="menu-link">
										<span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
													<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
										</span>
										<span class="menu-text">Notatki</span>
									</a>
								</li>
								@endcan
								@can('viewany', App\Models\Permission::class)
								<li class="menu-item {{ (request()->routeIs('permissions.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
									<a href="{{ route('permissions.index') }}" class="menu-link">
										<span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<mask fill="white">
														<use xlink:href="#path-1"/>
													</mask>
													<g/>
													<path d="M15.6274517,4.55882251 L14.4693753,6.2959371 C13.9280401,5.51296885 13.0239252,5 12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L14,10 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C13.4280904,3 14.7163444,3.59871093 15.6274517,4.55882251 Z" fill="#000000"/>
												</g>
											</svg>
										</span>
										<span class="menu-text">Uprawnienia</span>
									</a>
								</li>
								@endcan
								<li class="menu-item menu-item-submenu {{ ((request()->routeIs('posts.index')) or (request()->routeIs('posts.create*')) or (request()->routeIs('post-categories.index')) or (request()->routeIs('post-categories.create'))) ? 'menu-item-active' : '' }}" data-menu-toggle="hover" aria-haspopup="true">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
													<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
										</span>
										<span class="menu-text">Artykuły</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu menu-submenu-classic menu-submenu-right">
										<ul class="menu-subnav">
											<li class="menu-item {{ (request()->routeIs('posts.index')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('posts.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Przeglądaj listę artykułów</span>
												</a>
											</li>
											@can('create', App\Models\File::class)
											<li class="menu-item {{ (request()->routeIs('posts.create')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('posts.create') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dodaj nowy artykuł</span>
												</a>
											</li>
											@endcan
											@can('viewany', App\Models\PostCategory::class)
											<li class="menu-item {{ (request()->routeIs('post-categories.index')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('post-categories.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Przeglądaj listę kategorii artykułów</span>
												</a>
											</li>
											@endcan
											@can('viewany', App\Models\PostCategory::class)
											<li class="menu-item {{ (request()->routeIs('post-categories.create')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('post-categories.create') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dodaj nową kategorię artykułów</span>
												</a>
											</li>
											@endcan
										</ul>
									</div>
								</li>
								<li class="menu-item menu-item-submenu {{ ((request()->routeIs('files.index')) or (request()->routeIs('files.create*')) or (request()->routeIs('file-categories.index')) or (request()->routeIs('file-categories.create'))) ? 'menu-item-active' : '' }}" data-menu-toggle="hover" aria-haspopup="true">
									<a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon menu-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
													<rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
													<rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
												</g>
											</svg>
										</span>
										<span class="menu-text">Dokumenty</span>
										<i class="menu-arrow"></i>
									</a>
									<div class="menu-submenu menu-submenu-classic menu-submenu-right">
										<ul class="menu-subnav">
											@can('viewany', App\Models\File::class)
											<li class="menu-item {{ (request()->routeIs('files.index')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('files.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Przeglądaj listę dokumentów</span>
												</a>
											</li>
											@endcan
											@can('create', App\Models\File::class)
											<li class="menu-item {{ (request()->routeIs('files.create')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('files.create') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dodaj nowy dokument</span>
												</a>
											</li>
											@endcan
											@can('viewany', App\Models\FileCategory::class)
											<li class="menu-item {{ (request()->routeIs('file-categories.index')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('file-categories.index') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Przeglądaj listę kategorii dokumentów</span>
												</a>
											</li>
											@endcan
											@can('viewany', App\Models\FileCategory::class)
											<li class="menu-item {{ (request()->routeIs('file-categories.create')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
												<a href="{{ route('file-categories.create') }}" class="menu-link">
													<i class="menu-bullet menu-bullet-dot">
														<span></span>
													</i>
													<span class="menu-text">Dodaj nową kategorię dokumentów</span>
												</a>
											</li>
											@endcan
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</li>
					@endauth
				</ul>
			</div>
		</div>
		<div class="topbar">
			<div class="topbar-item">
				@auth
				<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
					<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Witaj,</span>
					<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->fullname() }}</span>
					<div class="symbol symbol-35">
						<div class="symbol-label" style="background-image:url({{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }})"></div>
					</div>
				</div>
				@else
				<a href="{{ route('login') }}" class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
					<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Zaloguj się</span>
				</a>
				@endauth
			</div>
		</div>
	</div>
</div>