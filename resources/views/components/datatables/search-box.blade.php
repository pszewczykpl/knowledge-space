<div class="col-md-{{ $size }} pb-3 my-2 my-md-0"@if($hidden) style="display: none;"@endif>
	<label class="fs-6 form-label fw-normal text-gray-800">{{ $placeholder }}</label>
	<div class="position-relative" id="filter_col{{ $number }}" data-column="{{ $number }}">
		@include('svg.search', ['class' => 'svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6'])
		<input type="text" class="form-control form-control-solid ps-10 card-rounded column_filter" id="col{{ $number }}_filter" placeholder="Wpisz {{ $placeholder }}">
		<input type="checkbox" class="d-none column_filter" id="col{{ $number }}_regex" @if($regex) checked="checked" @endif>
	</div>
</div>