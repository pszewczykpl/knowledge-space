<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-layout.head :title="$title" />

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-enabled aside-fixed">
        <div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
                
                <x-layout.aside />

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    
                    <x-layout.topbar :title="$title" />

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('content')
					</div>
					
                    <x-layout.footer />

					<a data-toggle="modal" data-target="#policy_calculator_modal" class="btn btn-sm btn-white btn-active-primary shadow-sm position-fixed px-5 fw-bolder index-2 top-50 mt-10 end-0 transform-90 fs-6">
						<span>Kalkulator miesięcy</span>
					</a>
                    
				</div>
			</div>
        </div>
        
        <x-layout.modals />

        <x-layout.scripts />

		@stack('scripts')
		
	</body>
</html>