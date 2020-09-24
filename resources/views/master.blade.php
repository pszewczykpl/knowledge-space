<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-layout.head :title="$title"/>

	<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize aside-minimize-hoverable subheader-enabled subheader-fixed">
        
        <x-layout.mobile />

		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
                
                <x-layout.aside />

				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    
                    <x-layout.topbar />
					
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						
						<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
							
							@yield('subheader')
						
						</div>
			
						<div class="d-flex flex-column-fluid">
							
							@yield('content')

						</div>
					</div>
					
                    <x-layout.footer />
                    
				</div>
			</div>
        </div>
        
		<x-layout.userbar />
        
		<x-layout.toolbar />
        
        <x-layout.modals />
        
        <x-layout.scripts />

		@yield('additional_scripts')
		
	</body>
</html>