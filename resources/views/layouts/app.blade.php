<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-layout.head :title="$title" />

	<body 
		id="kt_body"
{{--		data-kt-aside-minimize="on"--}}
		class="
			@if($dark_mode) dark-mode @endif
			header-fixed header-tablet-and-mobile-fixed aside-enabled
			aside-fixed 
{{--			page-loading-enabled page-loading--}}
		">

		<div class="page-loader">
			<span class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Ładowanie...</span>
			</span>
		</div>

		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
                
                <x-layout.aside />

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    
                    <x-layout.topbar :title="$title" />

					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						@yield('content')
					</div>
					
                    <x-layout.footer />

					<a data-bs-toggle="modal" data-bs-target="#policy_calculator_modal" class="explore-toggle btn btn-sm bg-body btn-color-gray-700 btn-active-primary shadow-sm position-fixed px-5 fw-bolder zindex-2 top-50 mt-10 end-0 transform-90 fs-6 rounded-top-0 card-rounded">
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