@switch($type)
    @case('description')
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
            <li class="breadcrumb-item">
                <span class="text-muted">{{ $description }}</span>
            </li>
        </ul>
    @break
    @case('datatables')
        <x-datatables.search-box-global />
        @if($advanced) <button type="button" class="btn btn-clean btn-sm ml-1" id="search_box_panel_button">Zaawansowane</button> @endif
        @if($active) <div class="subheader-separator subheader-separator-ver mt-2 mb-2 ml-3 bg-gray-200"></div> @endif
        @if($active) <button type="button" class="btn btn-primary btn-sm ml-3" id="active_or_all">{{ $custom_active_text ?? 'Pokaż Archiwalne' }}</button> @endif
    @break
@endswitch