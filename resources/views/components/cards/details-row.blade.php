@if($value ?? null)
	<div class="row mb-5">
		<label class="col-lg-5 fw-bold text-gray-600">{{ $attribute }}:</label>
		<div class="col-lg-7">
			<span class="fw-bold fs-6 text-gray-800">{{ $value }}</span>
		</div>
	</div>
@endif