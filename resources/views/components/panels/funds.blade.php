<div class="card card-custom pt-4 mb-6 mb-xl-9 card-shadow card-rounded">
    <div class="card-header border-0">
        <div class="card-title">
            <h2>Fundusze</h2>
        </div>
    </div>
    <div class="card-body pt-0">
        <div class="mb-0">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="card card-custom pb-5">
                            <div class="card-body p-0 m-0">
                                <div class="notice d-flex bg-light-primary card-rounded border-primary border border-dashed p-6">
                                    @include('svg.fund', ['class' => 'svg-icon svg-icon-2tx svg-icon-primary me-4'])
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-bold">
                                            <div class="fs-6 text-gray-600">
                                                Poniżej znajdują się aktualnie dostępne fundusze inwestycyjne dla tego produktu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="col-md-4 pb-3 my-2 my-md-0">
                            <div class="input-icon" id="filter_col0" data-column="0">
                                <input type="text" class="form-control form-control-solid card-rounded column_filter" placeholder="Symbol" id="col0_filter" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 pb-3 my-2 my-md-0">
                            <div class="input-icon" id="filter_col1" data-column="1">
                                <input type="text" class="form-control form-control-solid card-rounded column_filter" placeholder="Nazwa" id="col1_filter" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-0">
            <table class="table align-middle table-row-dashed fs-6 gy-5 datatable" id="table_funds" style="width: 100%">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <td><b>Symbol</b></td>
                        <td><b>Nazwa</b></td>
                        <td><b>Data początku</b></td>
                        <td><b>Akcje</b></td>
                    </tr>
                </thead>
            </table>
        </div>
        <script>var INVESTMENT_ID = {{ $investment_id }};</script>
    </div>
</div>