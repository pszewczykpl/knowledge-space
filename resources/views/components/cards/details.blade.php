<div class="card card-custom gutter-b">
	<div class="card-header h-auto py-sm-0 mb-3">
		<div class="card-title">
			<h3 class="card-label">{{ $title }}
			<span class="d-block text-muted pt-2 font-size-sm">{{ $description }}</span></h3>
		</div>
	</div>
	{{ $slot }}
	<div class="mt-3"></div>
</div>