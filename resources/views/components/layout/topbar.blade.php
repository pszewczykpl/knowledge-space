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
										@include('svg.note', ['class' => 'menu-icon'])
										<span class="menu-text">Notatki</span>
									</a>
								</li>
								@endcan
								@can('viewany', App\Models\Permission::class)
								<li class="menu-item {{ (request()->routeIs('permissions.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
									<a href="{{ route('permissions.index') }}" class="menu-link">
										@include('svg.permissions', ['class' => 'menu-icon'])
										<span class="menu-text">Uprawnienia</span>
									</a>
								</li>
								@endcan
								<li class="menu-item menu-item-submenu {{ ((request()->routeIs('posts.index')) or (request()->routeIs('posts.create*')) or (request()->routeIs('post-categories.index')) or (request()->routeIs('post-categories.create'))) ? 'menu-item-active' : '' }}" data-menu-toggle="hover" aria-haspopup="true">
									<a href="javascript:;" class="menu-link menu-toggle">
										@include('svg.post', ['class' => 'menu-icon'])
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
										@include('svg.file', ['class' => 'menu-icon'])
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
					<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{ Auth::user()->full_name }}</span>
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