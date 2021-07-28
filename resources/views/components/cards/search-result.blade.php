<a href="{{ route($route.'.show', $result->id) }}" class="text-dark">
    <div class="d-flex align-items-center p-5">
        <div class="symbol symbol-40px me-5">
			<span class="symbol-label">
				@include('svg.'.$icon, ['class' => 'svg-icon svg-icon-1 svg-icon-'.($result->iconColor ?? 'primary')])
			</span>
        </div>
        <div class="d-flex flex-column flex-grow-1 fw-bold">
            <span class="text-dark mb-1 fs-6">{{ $result->extended_name }}</span>
                <div class="d-flex">
                    @foreach($result->additional as $name => $data)
                        <span class="text-muted me-1">{{ $name }}:</span><span class="text-dark me-2">{{ $data }}</span>
                    @endforeach
                </div>
        </div>
        @if($result->status ?? false)
            @if($result->edit_date ?? false)<span class="me-2 text-dark-75">{{ $result->edit_date }}</span>@endif <span class="badge @if($result->status == 'Aktualny') badge-light-success @else badge-light-primary @endif fw-bolder px-4 py-3">{{ $result->status }}</span>
        @endif
    </div>
</a>