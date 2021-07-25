<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<div class="aside-logo flex-column-auto" id="kt_aside_logo">
		<a href="{{ route('home.index') }}">
			<img alt="Logo" src="{{ asset('media/logos/logo.png') }}" class="logo" />
		</a>
		<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
			<span class="svg-icon svg-icon-1 rotate-180">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
						<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.5" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
					</g>
				</svg>
			</span>
		</div>
	</div>
	<div class="aside-menu flex-column-fluid">
		<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('home.*')) ? 'active' : '' }}" href="{{ route('home.index') }}">
						<span class="menu-icon">
							@include('svg.main', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Panel główny</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('news.*')) ? 'active' : '' }}" href="{{ route('news.index') }}">
						<span class="menu-icon">
							@include('svg.news', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Aktualności</span>
					</a>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Ubezpieczenia</span>
					</div>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('investments.*')) ? 'active' : '' }}" href="{{ route('investments.index') }}">
						<span class="menu-icon">
							@include('svg.investment', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Inwestycyjne</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('protectives.*')) ? 'active' : '' }}" href="{{ route('protectives.index') }}">
						<span class="menu-icon">
							@include('svg.protective', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Ochronne</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('bancassurances.*')) ? 'active' : '' }}" href="{{ route('bancassurances.index') }}">
						<span class="menu-icon">
							@include('svg.bancassurance', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Bancassurance</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('employees.*')) ? 'active' : '' }}" href="{{ route('employees.index') }}">
						<span class="menu-icon">
							@include('svg.employee', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Pracownicze</span>
					</a>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Strefa Wiedzy</span>
					</div>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('posts.*')) ? 'active' : '' }}" href="{{ route('posts.index') }}">
						<span class="menu-icon">
							@include('svg.post', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Artykuły</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('files.*')) ? 'active' : '' }}" href="{{ route('files.index') }}">
						<span class="menu-icon">
							@include('svg.file', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Dokumenty</span>
					</a>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Pozostałe</span>
					</div>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('risks.*')) ? 'active' : '' }}" href="{{ route('risks.index') }}">
						<span class="menu-icon">
							@include('svg.risk', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Ryzyka ubezpieczeniowe</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('funds.*')) ? 'active' : '' }}" href="{{ route('funds.index') }}">
						<span class="menu-icon">
							@include('svg.fund', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Fundusze UFK</span>
					</a>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Firma</span>
					</div>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('partners.*')) ? 'active' : '' }}" href="{{ route('partners.index') }}">
						<span class="menu-icon">
							@include('svg.partner', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Partnerzy</span>
					</a>
				</div>
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('systems.*')) ? 'active' : '' }}" href="{{ route('systems.index') }}">
						<span class="menu-icon">
							@include('svg.system', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Systemy</span>
					</a>
				</div>
				@can('viewany', App\Models\User::class)
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('users.*')) ? 'active' : '' }}" href="{{ route('users.index') }}">
						<span class="menu-icon">
							@include('svg.user', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Pracownicy</span>
					</a>
				</div>
				@endcan
				@can('viewany', App\Models\Department::class)
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('departments.*')) ? 'active' : '' }}" href="{{ route('departments.index') }}">
						<span class="menu-icon">
							@include('svg.department', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Departamenty</span>
					</a>
				</div>
				@endcan

				@auth
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Administracja</span>
					</div>
				</div>
				@endauth
				@can('viewany', App\Models\PostCategory::class)
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('post-categories.*')) ? 'active' : '' }}" href="{{ route('post-categories.index') }}">
						<span class="menu-icon">
							@include('svg.post-category', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Kategorie artykułów</span>
					</a>
				</div>
				@endcan
				@can('viewany', App\Models\FileCategory::class)
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('file-categories.*')) ? 'active' : '' }}" href="{{ route('file-categories.index') }}">
						<span class="menu-icon">
							@include('svg.file-category', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Kategorie dokumentów</span>
					</a>
				</div>
				@endcan
				@can('viewany', App\Models\Permission::class)
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('permissions.*')) ? 'active' : '' }}" href="{{ route('permissions.index') }}">
						<span class="menu-icon">
							@include('svg.permissions', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Uprawnienia</span>
					</a>
				</div>
				@endcan
				@can('viewany', App\Models\Note::class)
				<div class="menu-item">
					<a class="menu-link {{ (request()->routeIs('notes.*')) ? 'active' : '' }}" href="{{ route('notes.index') }}">
						<span class="menu-icon">
							@include('svg.note', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Notatki</span>
					</a>
				</div>
				@endcan
			</div>
		</div>
	</div>
</div>