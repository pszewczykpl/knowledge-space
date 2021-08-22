<div class="d-flex ms-3">
    <a 
        @if($href) href="{{ $href }}" @endif 
        @if($onclick) onclick="{!! $onclick !!}" @endif 
        class="btn btn-flex flex-center btn-bg-white btn-text-gray-500 btn-active-color-{{ $color }} w-40px w-md-auto h-40px px-0 px-md-6 card-rounded"
    >
        @include("svg.$svg", ['class' => "svg-icon svg-icon-2 svg-icon-$color me-0 me-md-2"])<span class="d-none d-md-inline">{{ $title }}</span>
    </a>
</div>