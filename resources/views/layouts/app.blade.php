<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-layout.head :title="$title"/>

	<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize aside-minimize-hoverable @hasSection('subheader') subheader-enabled subheader-fixed @endif">
        
        <x-layout.mobile />

		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
                
                <x-layout.aside />

				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    
                    <x-layout.topbar />
					
					<div class="content d-flex flex-column flex-column-fluid @sectionMissing('subheader') pt-0 @endif" id="kt_content">

						@hasSection('subheader')
							<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
								<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
									<div class="d-flex align-items-center flex-wrap">
										<h5 class="text-dark font-weight-bold mt-2 mb-2">{{ $title }}</h5>
										<div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-3 bg-gray-200"></div>
										@yield('subheader')
									</div>
									@hasSection('toolbar')
										<div class="d-flex align-items-center">
											@yield('toolbar')
										</div>
									@endif
								</div>
							</div>

							<div class="d-flex flex-column-fluid">
								@yield('content')
							</div>

						@else
							@yield('content')
						@endif
					</div>
					
                    <x-layout.footer />
                    
				</div>
			</div>
        </div>
        
		<x-layout.userbar />
        
		<x-layout.toolbar />
        
        <x-layout.modals />

        <x-layout.scripts />

		@stack('scripts')
		
	</body>
</html>