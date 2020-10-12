@if($value ?? null)
<div class="card-body py-0 pt-0">
	<div class="form-group row my-sm-0">
		<label class="col-6 col-form-label text-right">{{ $attribute }}:</label>
		<div class="col-6">
			<span class="form-control-plaintext font-weight-bolder">{{ $value }}</span>
		</div>
	</div>
</div>
@endif