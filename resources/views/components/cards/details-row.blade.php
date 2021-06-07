@if($value ?? null)
	<div class="row mb-7">
		<label class="col-lg-5 fw-bold text-muted">{{ $attribute }}:</label>
		<div class="col-lg-7">
			<span class="fw-bolder fs-6 text-dark">{{ $value }}</span>
		</div>
	</div>
@endif