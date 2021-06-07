<div class="container">
    <div class="d-flex flex-column flex-md-row">
        <div class="flex-md-row-fluid">
            <div class="card card-custom">
                <div class="card-body">
                    <div class="mb-1">
                        <div class="row align-items-center">
                            {{ $search ?? '' }}
                        </div>
                        <div class="row align-items-center" id="search_box_panel" style="display: none;">
                            {{ $advanced_search ?? '' }}
                        </div>
                    </div>
                    <div class="px-0">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="table">
                            <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                @foreach($columns as $column)
                                    <th>{{ $column }}</th>
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