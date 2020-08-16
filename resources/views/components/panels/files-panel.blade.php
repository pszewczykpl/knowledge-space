<div class="row">
    <div class="col-12">
        <div class="card card-custom" style="box-shadow: 0px 0px 0px 0px; -webkit-box-shadow: 0px 0px 0px 0x;">
            <div class="card-body pt-0 pb-0">
                <a class="btn btn-outline-primary active"><i class="fa fa-file-pdf"></i> PDF</a>
                <a name="non-active" class="btn btn-outline-primary " 
                    @if($files->where('extension', '=', 'docx')->count() < 1)
                        data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>DOCX</b>" 
                    @else
                        id="show-docx-files"
                    @endif
                >
                    <i class="fa fa-file-word"></i> DOCX
                </a>
                <a name="non-active" class="btn btn-outline-primary " 
                    @if($files->where('extension', '=', 'doc')->count() < 1)
                        data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>DOC</b>" 
                    @else
                        id="show-doc-files"
                    @endif
                >
                    <i class="fa fa-file-word"></i> DOC
                </a>
                <a name="non-active" class="btn btn-outline-primary " 
                    @if($files->where('extension', '=', 'pub')->count() < 1)
                        data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>PUB</b>" 
                    @else
                        id="show-pub-files"
                    @endif
                >
                    <i class="fa fa-file-invoice"></i> PUB
                </a>
                <a   
                    @if($files->where('extension', '=', 'pptx')->count() < 1)
                        name="non-active" class="btn btn-outline-primary" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>PPTX</b>" 
                    @else
                        name="active" class="btn btn-outline-primary active" id="show-pptx-files"
                    @endif
                >
                    <i class="fa fa-file-powerpoint"></i> PPTX
                </a>
                <a 
                    @if($files->where('extension', '=', 'xlsx')->count() < 1)
                        name="non-active" class="btn btn-outline-primary" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>XLSX</b>" 
                    @else
                        name="active" class="btn btn-outline-primary active" id="show-xlsx-files"
                    @endif
                >
                    <i class="fa fa-file-excel"></i> XLSX
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        
        @foreach($file_categories as $key => $file_category)
            @if($key % 2 == 0)
                <div class="card card-custom" style="box-shadow: 0px 0px 0px 0px; -webkit-box-shadow: 0px 0px 0px 0x;">
                    <div class="card-header border-0">
                        <h3 class="card-title font-weight-bolder text-dark">{{ $file_category->name }}</h3>
                    </div>
                    <div class="card-body pt-0 pb-0 pr-0">
                    @if($files->where('file_category_id', '=', $file_category->id)->count() == 0)
                    Brak dokumentów w tej kategorii
                    @endif
                    @foreach($files->where('file_category_id', '=', $file_category->id) as $file)
                        <div class="d-flex align-items-center mb-5" name="{{ $file->extension }}"
                            @if($file->extension != 'pdf' and $file->extension != 'xlsx' and $file->extension != 'pptx')
                                style="display: none !important;" 
                            @endif
                        >
                            <div class="mr-3">
                                <a href="{{ route('files.show', $file->id) }}" target="_blank"><img src="{{ asset('/media/files/' . $file->extension . '.svg') }}" style="width: 35px;" alt="{{ $file->name }}"></a>
                            </div>

                            <div class="d-flex flex-column flex-grow-1">
                                <a href="{{ route('files.show', $file->id) }}" class="text-dark text-hover-primary mb-1 font-size-md" target="_blank">
                                    {{ $file->name }}
                                </a>
                            </div>
                            <div class="dropdown dropdown-inline ml-2">
                                <a class="btn btn-sm btn-clean btn-icon"data-toggle="dropdown" aria-expanded="false" title="Więcej">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi navi-hover flex-column">
                                        @if($file->extension == 'pdf')
                                        <li class="navi-item">
                                            <a href="{{ route('files.show', $file->id) }}" class="navi-link" target="_blank">
                                                <i class="navi-icon flaticon2-expand"></i>
                                                <span class="navi-text">Wyświetl</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="navi-item">
                                            <a href="{{ route('files.download', $file->id) }}" class="navi-link" target="_blank">
                                                <i class="navi-icon flaticon2-download-2"></i>
                                                <span class="navi-text">Pobierz</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a class="navi-link" onclick="ShareFiles('{{ $file->id }}')">
                                                <i class="navi-icon flaticon2-reply-1"></i>
                                                <span class="navi-text">Udostępnij</span>
                                            </a>
                                        </li>
                                        @auth
                                            <div class="dropdown-divider"></div>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <i class="navi-icon flaticon2-trash"></i>
                                                    <span class="navi-text">Usuń</span>
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-md-6">
        @foreach($file_categories as $key => $file_category)
            @if($key % 2 != 0)
                <div class="card card-custom" style="box-shadow: 0px 0px 0px 0px; -webkit-box-shadow: 0px 0px 0px 0x;">
                    <div class="card-header border-0 pl-0">
                        <h3 class="card-title font-weight-bolder text-dark">{{ $file_category->name }}</h3>
                    </div>
                    <div class="card-body pt-0 pb-0 pl-0">
                    @if($files->where('file_category_id', '=', $file_category->id)->count() == 0)
                    Brak dokumentów w tej kategorii
                    @endif
                    @foreach($files->where('file_category_id', '=', $file_category->id) as $file)
                        <div class="d-flex align-items-center mb-5" name="{{ $file->extension }}"
                            @if($file->extension != 'pdf' and $file->extension != 'xlsx' and $file->extension != 'pptx')
                                style="display: none !important;" 
                            @endif
                        >
                            <div class="mr-3">
                                <a href="{{ route('files.show', $file->id) }}" target="_blank"><img src="{{ asset('/media/files/' . $file->extension . '.svg') }}" style="width: 35px;" alt="{{ $file->name }}"></a>
                            </div>

                            <div class="d-flex flex-column flex-grow-1">
                                <a href="{{ route('files.show', $file->id) }}" class="text-dark text-hover-primary mb-1 font-size-md" target="_blank">
                                    {{ $file->name }}
                                </a>
                            </div>
                            <div class="dropdown dropdown-inline ml-2">
                                <a class="btn btn-sm btn-clean btn-icon"data-toggle="dropdown" aria-expanded="false" title="Więcej">
                                    <i class="flaticon-more-1"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                    <ul class="navi navi-hover flex-column">
                                        @if($file->extension == 'pdf')
                                        <li class="navi-item">
                                            <a href="{{ route('files.show', $file->id) }}" class="navi-link" target="_blank">
                                                <i class="navi-icon flaticon2-expand"></i>
                                                <span class="navi-text">Wyświetl</span>
                                            </a>
                                        </li>
                                        @endif
                                        <li class="navi-item">
                                            <a href="{{ route('files.download', $file->id) }}" class="navi-link" target="_blank">
                                                <i class="navi-icon flaticon2-download-2"></i>
                                                <span class="navi-text">Pobierz</span>
                                            </a>
                                        </li>
                                        <li class="navi-item">
                                            <a class="navi-link" onclick="ShareFiles('{{ $file->id }}')">
                                                <i class="navi-icon flaticon2-reply-1"></i>
                                                <span class="navi-text">Udostępnij</span>
                                            </a>
                                        </li>
                                        @auth
                                            <div class="dropdown-divider"></div>
                                            <li class="navi-item">
                                                <a href="#" class="navi-link">
                                                    <i class="navi-icon flaticon2-trash"></i>
                                                    <span class="navi-text">Usuń</span>
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    
</div>