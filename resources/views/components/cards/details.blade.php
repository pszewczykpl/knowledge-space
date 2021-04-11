<div class="card card-custom gutter-b">
	<div class="card-header align-items-center border-0 mt-4">
		<h3 class="card-title align-items-start flex-column">
			<span class="font-weight-bolder text-dark">{{ $title }}</span>
			<span class="text-muted mt-3 font-weight-bold font-size-sm">{{ $description }}</span>
		</h3>
	</div>
	{{ $slot }}
	<div class="mt-3"></div>
</div>