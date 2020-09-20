<div class="col-md-{{ $size }} pb-3 my-2 my-md-0"@if($hidden) style="display: none;"@endif>
        <div class="input-icon" id="filter_col{{ $number }}" data-column="{{ $number }}">
		<input type="text" class="form-control form-control-solid column_filter" placeholder="{{ $placeholder }}" id="col{{ $number }}_filter" />
		<span>
			<i class="flaticon2-search-1 text-muted"></i>
		</span>
	</div>
</div>