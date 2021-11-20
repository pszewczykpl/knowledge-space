<div class="card card-flush mb-5 mb-xl-8 card-rounded card-shadow"
	{{-- data-kt-sticky="true" 
	data-kt-sticky-offset="{default: false, lg: '150px'}" 
	data-kt-sticky-width="{lg: '350px', xl: '350px'}" 
	data-kt-sticky-left="auto" 
	data-kt-sticky-top="100px" 
	data-kt-sticky-animation="true" 
	data-kt-sticky-zindex="95"  --}}
	style="">
	<div class="card-header border-0">
		<h3 class="card-title">
			<span class="fw-bolder m-0">{{ $title }}</span>
		</h3>
	</div>
	<div class="card-body pt-3">
		{{ $slot }}
	</div>
</div>