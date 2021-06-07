@switch($type)
    @case('description')
        <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1 mx-1">
            <li class="breadcrumb-item text-muted">{{ $description }}</li>
        </ul>
    @break
    @case('datatables')
        <x-datatables.search-box-global />
        @if($advanced) <button type="button" class="btn btn-sm btn-color-muted btn-active-color-primary btn-active-light fw-bold fs-7 px-4 mx-1" id="search_box_panel_button">Zaawansowane</button> @endif
        @if($active) <span class="h-20px border-gray-200 border-start mx-4"></span> @endif
        @if($active) <button type="button" class="btn btn-primary btn-sm ml-3" id="active_or_all">{{ $custom_active_text ?? 'Pokaż Archiwalne' }}</button> @endif
    @break
@endswitch