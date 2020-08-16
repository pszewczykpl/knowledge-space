<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-layout.head :title="$title"/>

	<body id="kt_body" class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize aside-minimize-hoverable page-loading">
        
        <x-layout.mobile />

		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
                
                <x-layout.aside />

				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                    
                    <x-layout.topbar />
					
					<div class="content pt-0 d-flex flex-column flex-column-fluid" id="kt_content">
						
						@yield('content')

					</div>
					
                    <x-layout.footer/>
                    
				</div>
			</div>
        </div>
        
		<x-layout.userbar />
        
		<x-layout.toolbar />
        
        <x-layout.scripts />

		@yield('additional_scripts')
		
	</body>
</html>
