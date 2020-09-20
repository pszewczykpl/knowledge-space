<div class="row align-items-center">
    <div class="col-12">
        <div class="card card-custom">
            <div class="card-body pt-0">
                <div class="mb-0">
                    <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                        <div class="alert-text">
                            <b>Tylko aktywne fundusze!</b><br>
                            Poniżej znajdują się tylko aktywne ubezpieczeniowe fundusze kapitałowe dla wybranego produktu inwestycyjnego.
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col-md-4 pb-3 my-2 my-md-0">
                                    <div class="input-icon" id="filter_col0" data-column="0">
                                        <input type="text" class="form-control form-control-solid column_filter" placeholder="Symbol" id="col0_filter" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 pb-3 my-2 my-md-0">
                                    <div class="input-icon" id="filter_col1" data-column="1">
                                        <input type="text" class="form-control form-control-solid column_filter" placeholder="Nazwa" id="col1_filter" />
                                        <span>
                                            <i class="flaticon2-search-1 text-muted"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-separate table-head-custom collapsed pl-2 pr-2" id="table_funds">
                    <thead>
                        <tr>
                            <td><b>Symbol</b></td>
                            <td><b>Nazwa</b></td>
                            <td><b>Akcje</b></td>
                        </tr>
                    </thead>
                </table>
                <script>var INVESTMENT_ID = {{ $investment_id }};</script>
            </div>
        </div>
    </div>
</div>