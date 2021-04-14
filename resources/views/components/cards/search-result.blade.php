        <a href="{{ route($route.'.show', $id) }}">
            <div class="d-flex align-items-center mb-2 bg-hover-light-primary p-4 rounded-xl">
                <div class="symbol symbol-40 symbol-white mr-5">
					<span class="symbol-label">
						@include('svg.'.$icon, ['class' => 'svg-icon-xl svg-icon-'.$iconColor])
					</span>
                </div>
                <div class="d-flex flex-column flex-grow-1 font-weight-bold">
                    <span class="text-dark mb-1 font-size-lg">{{ $title }}</span>
                        <div class="d-flex">
                            @foreach($additional as $name => $data)
                            <span class="text-muted pr-1">{{ $name }}:</span><span class="text-dark font-size-lg pr-2">{{ $data }}</span>
                            @endforeach
                        </div>
                </div>
                @if($active)
                    <span class="label font-weight-bold label-lg label-light-success label-inline">Aktualne</span>
                @else
                    <span class="label font-weight-bold label-lg label-light-primary label-inline">Archiwalne</span>
                @endif
            </div>
        </a>