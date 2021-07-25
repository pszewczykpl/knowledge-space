<div id="kt_content_container" class="container">
    <div class="d-flex flex-column flex-md-row">
        <div class="flex-md-row-fluid">
            <div class="card card-custom card-rounded card-shadow">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center position-relative my-1" id="filter_global">
                                @include('svg.search', ['class' => 'svg-icon svg-icon-1 position-absolute ms-6'])
                                <input type="text" class="form-control form-control-solid w-325px ps-14 global_filter" placeholder="Szukaj..." id="global_filter">
                            </div>
                            @if($search)
                                <a id="search_box_panel_button" class="btn btn-link btn-color-muted mx-5 btn-active-color-primary">Pokaż Wyszukiwanie Zaawansowane</a>
                            @endif
                            </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <button id="export_to_csv" name="export_to_csv" type="button" class="btn btn-primary">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"></rect>
                                </svg>
                            </span>Exportuj do CSV</button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="mb-1">
                        <div class="row align-items-center" id="search_box_panel" style="display: none;">
                            
                            <div class="col-12"><div class="separator separator-dashed mt-6 mb-6"></div></div>
                            
                            {{ $search ?? '' }}
                            
                            {{ $advanced_search ?? '' }}

                            <div class="mb-1"></div>
                        </div>
                    </div>
                    <div class="px-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table" style="width: 100% !important">
                            <thead>
                            <tr class="text-start text-gray-800 fw-bolder fs-7 text-uppercase gs-0">
                                @foreach($columns as $column)
                                    <th>{{ $column }}</th>
                                @endforeach
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>