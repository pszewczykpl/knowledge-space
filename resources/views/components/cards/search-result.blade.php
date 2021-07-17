<a href="{{ route($route.'.show', $result->id) }}">
    <div class="d-flex align-items-center mb-2 bg-hover-light-primary p-4 card-rounded card-shadow">
        <div class="symbol symbol-40 symbol-white mr-5">
			<span class="symbol-label">
				@include('svg.'.$icon, ['class' => 'svg-icon-xl svg-icon-'.($result->iconColor ?? 'primary')])
			</span>
        </div>
        <div class="d-flex flex-column flex-grow-1 font-weight-bold">
            <span class="text-dark mb-1 font-size-lg">{{ $result->extended_name }}</span>
                <div class="d-flex">
                    @foreach($result->additional as $name => $data)
                        <span class="text-muted pr-1">{{ $name }}:</span><span class="text-dark font-size-lg pr-2">{{ $data }}</span>
                    @endforeach
                </div>
        </div>
        @if($result->status ?? false)
            @if($result->edit_date ?? false)<span class="mr-2 text-dark-75">{{ $result->edit_date }}</span>@endif <span class="label label-lg @if($result->status == 'Aktualny') label-light-success @else label-light-primary @endif label-inline">{{ $result->status }}</span>
        @endif
    </div>
</a>