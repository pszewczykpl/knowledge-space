<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-layout.head :title="$title"/>

	<body id="kt_body" data-kt-aside-minimize="on" class="header-fixed header-tablet-and-mobile-fixed @hasSection('subheader') toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed @endif aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
        <!--<x-layout.mobile />-->

		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
                
                <x-layout.aside />

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                    
                    <x-layout.topbar />

					<div class="content d-flex flex-column flex-column-fluid @sectionMissing('subheader') pt-0 @endif" id="kt_content">
						@hasSection('subheader')
							<div class="toolbar" id="kt_toolbar">
								<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
									<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center me-3 flex-wrap mb-5 mb-lg-0 lh-1">
										<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">{{ $title }}</h1>
										<span class="h-20px border-gray-200 border-start mx-4"></span>
										@yield('subheader')
									</div>
									@hasSection('toolbar')
										<div class="d-flex align-items-center py-1">
											@yield('toolbar')
										</div>
									@endif
								</div>
							</div>
							<div class="post d-flex flex-column-fluid" id="kt_post">
								@yield('content')
							</div>
						@else
							@yield('content')
						@endif
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