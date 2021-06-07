<div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<div class="aside-logo flex-column-auto" id="kt_aside_logo">
		<a href="{{ route('home.index') }}">
			<img alt="Logo" src="{{ asset('media/logos/logo.png') }}" class="logo" />
		</a>
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
					<a class="menu-link {{ (request()->routeIs('search.*')) ? 'active' : '' }}" href="{{ route('search.index') }}">
						<span class="menu-icon">
							@include('svg.search', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Szukaj</span>
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
						<span class="menu-title">Wszystkie Artykuły</span>
					</a>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link {{ ((request()->routeIs('partners.*')) or (request()->routeIs('risks.*')) or (request()->routeIs('funds.*')) or (request()->routeIs('systems.*'))) ? 'active' : '' }}">
						<span class="menu-icon">
							@include('svg.dictionary', ['class' => 'svg-icon svg-icon-2'])
						</span>
						<span class="menu-title">Słowniki</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion">
						<div class="menu-item">
							<a class="menu-link {{ (request()->routeIs('partners.*')) ? 'active' : '' }}" href="{{ route('partners.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Partnerzy</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link {{ (request()->routeIs('systems.*')) ? 'active' : '' }}" href="{{ route('systems.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Systemy TU</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link {{ (request()->routeIs('risks.*')) ? 'active' : '' }}" href="{{ route('risks.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Ryzyka ubezpieczeniowe</span>
							</a>
						</div>
						<div class="menu-item">
							<a class="menu-link {{ (request()->routeIs('funds.*')) ? 'active' : '' }}" href="{{ route('funds.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Fundusze UFK</span>
							</a>
						</div>
					</div>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Firma</span>
					</div>
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
			</div>
		</div>
	</div>
	<div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
		<a href="#" class="btn btn-custom btn-primary w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-delay-show="8000" title="Check out the complete documentation with over 100 components">
			<span class="btn-label">Dokumentacja</span>
			<span class="svg-icon btn-icon svg-icon-2">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24" />
						<path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3" />
						<path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000" />
						<rect fill="#000000" opacity="0.3" x="7" y="10" width="5" height="2" rx="1" />
						<rect fill="#000000" opacity="0.3" x="7" y="14" width="9" height="2" rx="1" />
					</g>
				</svg>
			</span>
		</a>
	</div>
</div>