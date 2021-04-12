<div class="container">
    <div class="d-flex flex-column flex-md-row">
        <div class="flex-md-row-fluid">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="mb-1">
                        @if($info)
                            <div class="alert alert-custom alert-light-primary alert-shadow fade show mb-5" role="alert">
                                <div class="alert-icon">
                                    <i class="flaticon-info"></i>
                                </div>
                                <div class="alert-text">
                                    {{ $info_text }}
                                </div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="row align-items-center">
                            {{ $search ?? '' }}
                        </div>
                        <div class="row align-items-center" id="search_box_panel" style="display: none;">
                            {{ $advanced_search ?? '' }}
                        </div>
                    </div>
                    <div class="pl-3 pr-3">
                        <table class="table table-separate table-head-custom collapsed" id="table">
                            <thead>
                            <tr>
                                @foreach($columns as $column)
                                <td>{{ $column }}</td>
                                @endforeach
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            @if($help_us)
                <x-cards.help-us />
            @endif
        </div>
    </div>
</div>