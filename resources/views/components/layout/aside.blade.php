<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
	<div class="brand flex-column-auto" id="kt_brand">
		<a href="{{ route('home.index') }}" class="brand-logo">
			<img alt="Logo" src="{{ asset('media/logos/logo.png') }}" />
		</a>
		<button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
			<span class="svg-icon svg-icon svg-icon-xl">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
						<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
					</g>
				</svg>
			</span>
		</button>
	</div>
	<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
		<div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{ (request()->routeIs('home.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('home.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M3.95709826,8.41510662 L11.47855,3.81866389 C11.7986624,3.62303967 12.2013376,3.62303967 12.52145,3.81866389 L20.0429,8.41510557 C20.6374094,8.77841684 21,9.42493654 21,10.1216692 L21,19.0000642 C21,20.1046337 20.1045695,21.0000642 19,21.0000642 L4.99998155,21.0000673 C3.89541205,21.0000673 2.99998155,20.1046368 2.99998155,19.0000673 L2.99999828,10.1216672 C2.99999935,9.42493561 3.36258984,8.77841732 3.95709826,8.41510662 Z M10,13 C9.44771525,13 9,13.4477153 9,14 L9,17 C9,17.5522847 9.44771525,18 10,18 L14,18 C14.5522847,18 15,17.5522847 15,17 L15,14 C15,13.4477153 14.5522847,13 14,13 L10,13 Z" fill="#000000"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Panel główny</span>
					</a>
				</li>
				{{-- <li class="menu-item" aria-haspopup="true">
					<a href="#" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
									<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Szukaj</span>
					</a>
                </li> --}}
				@can('viewany', App\Models\News::class)
				<li class="menu-item {{ (request()->routeIs('news.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('news.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L6,18 C4.34314575,18 3,16.6568542 3,15 L3,6 C3,4.34314575 4.34314575,3 6,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 Z" fill="#000000" opacity="0.3"/>
									<path d="M7.5,12 C6.67157288,12 6,11.3284271 6,10.5 C6,9.67157288 6.67157288,9 7.5,9 C8.32842712,9 9,9.67157288 9,10.5 C9,11.3284271 8.32842712,12 7.5,12 Z M12.5,12 C11.6715729,12 11,11.3284271 11,10.5 C11,9.67157288 11.6715729,9 12.5,9 C13.3284271,9 14,9.67157288 14,10.5 C14,11.3284271 13.3284271,12 12.5,12 Z M17.5,12 C16.6715729,12 16,11.3284271 16,10.5 C16,9.67157288 16.6715729,9 17.5,9 C18.3284271,9 19,9.67157288 19,10.5 C19,11.3284271 18.3284271,12 17.5,12 Z" fill="#000000" opacity="0.3"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Aktualności</span>
					</a>
                </li>
				@endcan
				<li class="menu-section">
					<h4 class="menu-text">Archiwum produktowe</h4>
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>
                <li class="menu-item {{ (request()->routeIs('investments.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('investments.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
									<path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Ubezpieczenia Inwestycyjne</span>
					</a>
                </li>
                <li class="menu-item {{ (request()->routeIs('protectives.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('protectives.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-danger">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"/>
									<path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
									<path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z" fill="#000000" fill-rule="nonzero"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Ubezpieczenia Ochronne</span>
					</a>
                </li>
                <li class="menu-item {{ (request()->routeIs('bancassurances.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('bancassurances.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-success">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"/>
									<rect fill="#000000" x="2" y="8" width="20" height="3"/>
									<rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Ubezpieczenia Bancassurance</span>
					</a>
                </li>
                <li class="menu-item {{ (request()->routeIs('employees.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('employees.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-info">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
									<rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
									<path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Ubezpieczenia Pracownicze</span>
					</a>
				</li>
				<li class="menu-section">
					<h4 class="menu-text">Strefa wiedzy</h4>
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>
                <li class="menu-item {{ (request()->routeIs('posts.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('posts.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
									<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Wszystkie Artykuły</span>
					</a>
				</li>
				<li class="menu-item menu-item-submenu {{ ((request()->routeIs('partners.*')) or (request()->routeIs('risks.*')) or (request()->routeIs('funds.*')) or (request()->routeIs('systems.*'))) ? 'menu-item-open menu-item-here' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
					<a href="javascript:;" class="menu-link menu-toggle">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M9.61764706,5 L8.73529412,7 L3,7 C2.44771525,7 2,6.55228475 2,6 C2,5.44771525 2.44771525,5 3,5 L9.61764706,5 Z M14.3823529,5 L21,5 C21.5522847,5 22,5.44771525 22,6 C22,6.55228475 21.5522847,7 21,7 L15.2647059,7 L14.3823529,5 Z M6.08823529,13 L5.20588235,15 L3,15 C2.44771525,15 2,14.5522847 2,14 C2,13.4477153 2.44771525,13 3,13 L6.08823529,13 Z M17.9117647,13 L21,13 C21.5522847,13 22,13.4477153 22,14 C22,14.5522847 21.5522847,15 21,15 L18.7941176,15 L17.9117647,13 Z M7.85294118,9 L6.97058824,11 L3,11 C2.44771525,11 2,10.5522847 2,10 C2,9.44771525 2.44771525,9 3,9 L7.85294118,9 Z M16.1470588,9 L21,9 C21.5522847,9 22,9.44771525 22,10 C22,10.5522847 21.5522847,11 21,11 L17.0294118,11 L16.1470588,9 Z M4.32352941,17 L3.44117647,19 L3,19 C2.44771525,19 2,18.5522847 2,18 C2,17.4477153 2.44771525,17 3,17 L4.32352941,17 Z M19.6764706,17 L21,17 C21.5522847,17 22,17.4477153 22,18 C22,18.5522847 21.5522847,19 21,19 L20.5588235,19 L19.6764706,17 Z" fill="#000000" opacity="0.3"/>
									<path d="M11.044,5.256 L13.006,5.256 L18.5,19 L16,19 L14.716,15.084 L9.19,15.084 L7.5,19 L5,19 L11.044,5.256 Z M13.924,13.14 L11.962,7.956 L9.964,13.14 L13.924,13.14 Z" fill="#000000"/>
								</g>
							</svg>
						</span>
						<span class="menu-text">Słowniki</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="menu-submenu">
						<i class="menu-arrow"></i>
						<ul class="menu-subnav">
							<li class="menu-item menu-item-parent" aria-haspopup="true">
								<span class="menu-link">
									<span class="menu-text">Słowniki</span>
								</span>
							</li>
							<li class="menu-item {{ (request()->routeIs('partners.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
								<a href="{{ route('partners.index') }}" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Partnerzy</span>
								</a>
							</li>
							<li class="menu-item {{ (request()->routeIs('systems.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
								<a href="{{ route('systems.index') }}" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Systemy TU</span>
								</a>
							</li>
							<li class="menu-item {{ (request()->routeIs('risks.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
								<a href="{{ route('risks.index') }}" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Ryzyka ubezpieczeniowe</span>
								</a>
							</li>
							<li class="menu-item {{ (request()->routeIs('funds.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
								<a href="{{ route('funds.index') }}" class="menu-link">
									<i class="menu-bullet menu-bullet-dot">
										<span></span>
									</i>
									<span class="menu-text">Fundusze UFK</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				@auth
				@if(
					Auth::user()->can('viewany', App\Models\User::class) 
					or Auth::user()->can('viewany', App\Models\Department::class)
				)
				<li class="menu-section">
					<h4 class="menu-text">HR</h4>
					<i class="menu-icon ki ki-bold-more-hor icon-md"></i>
				</li>
				@endif
				@endauth
				@can('viewany', App\Models\User::class)
				<li class="menu-item {{ (request()->routeIs('users.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('users.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"/>
									<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
									<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Pracownicy</span>
					</a>
                </li>
				@endcan
				@can('viewany', App\Models\Department::class)
				<li class="menu-item {{ (request()->routeIs('departments.*')) ? 'menu-item-active' : '' }}" aria-haspopup="true">
					<a href="{{ route('departments.index') }}" class="menu-link">
						<span class="svg-icon menu-icon svg-icon-primary">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"/>
									<path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"/>
								</g>
							</svg>
						</span>
						<span class="menu-text font-weight-light">Departamenty</span>
					</a>
                </li>
				@endcan
			</ul>
		</div>
	</div>
</div>