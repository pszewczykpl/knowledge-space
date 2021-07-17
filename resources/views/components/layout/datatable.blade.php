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
                                <a id="search_box_panel_button" class="btn btn-link btn-color-muted mx-5 btn-active-color-primary">Wyszukiwanie Zaawansowane</a>
                            @endif
                            </div>
                        {{-- <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user">
                        </div> --}}
                        <!--end::Search-->
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"></rect>
                                    <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000)" x="4" y="11" width="16" height="2" rx="1"></rect>
                                </svg>
                            </span>Add User</button>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-0">
                    <div class="mb-1">
                        <div class="row align-items-center" id="search_box_panel" style="display: none;">
                            
                            <div class="col-12"><div class="separator separator-dashed mt-6 mb-6"></div></div>
                            
                            {{ $search ?? '' }}
                            
                            {{ $advanced_search ?? '' }}
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