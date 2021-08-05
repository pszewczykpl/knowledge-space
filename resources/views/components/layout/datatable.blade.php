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
                        <div class="d-flex justify-content-end text-gray-500 fw-bold fs-5 me-3">Eksportuj do: </div>
                        <div class="d-flex justify-content-end">
                            <button id="export_to_excel" name="export_to_excel" type="button" class="btn btn-link btn-color-primaty me-3">Excel</button>
                            <button id="export_to_csv" name="export_to_csv" type="button" class="btn btn-link btn-color-primaty me-3">CSV</button>
                            <button id="export_to_pdf" name="export_to_pdf" type="button" class="btn btn-link btn-color-primaty me-3">PDF</button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="mb-1">
                        <div class="row align-items-center" id="search_box_panel" style="display: none;">
                            
                            <div class="col-12"><div class="separator separator-dashed mt-6 mb-6"></div></div>
                            
                            {{ $search ?? '' }}

                            <div class="mb-1"></div>
                        </div>
                    </div>
                    <div class="px-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 datatable" id="{{ $id }}" style="width: 100% !important">
                            <thead>
                            <tr class="text-start text-gray-800 fw-bolder fs-7 text-uppercase gs-0">
                                @foreach($datatableSettings['columns'] as $columnCode => $columnTitle)
                                    <th style="display: none;">{{ $columnTitle }}</th>
                                @endforeach
                            </tr>
                            <tbody>
                            @foreach($datatableSettings['deferData'] as $row)
                                <tr>
                                    @foreach($datatableSettings['columns'] as $columnCode => $columnTitle)
                                        <td style='display: none;'>@if($columnCode != 'actions') {!! $row->{$columnCode} !!} @endif</td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>