@if($value ?? null)
	<div class="row mb-5">
		<label class="col-lg-5 fw-bold text-muted">{{ $attribute }}:</label>
		<div class="col-lg-7">
			<span class="fw-bold fs-6 text-dark">{{ $value }}</span>
		</div>
	</div>
@endif