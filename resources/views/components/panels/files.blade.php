<div class="row">
    <div class="col-12">
        <div class="card card-custom" style="box-shadow: 0px 0px 0px 0px; -webkit-box-shadow: 0px 0px 0px 0x;">
            <div class="card-body pt-0 pb-0">
                <a class="btn btn-light-primary active"><i class="fa fa-file-pdf"></i> PDF</a>
                <a name="non-active" class="btn btn-light-primary " 
                    @if($files->where('extension', '=', 'docx')->count() < 1)
                        data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>DOCX</b>" 
                    @else
                        id="show-docx-files"
                    @endif
                >
                    <i class="fa fa-file-word"></i> DOCX
                </a>
                <a name="non-active" class="btn btn-light-primary " 
                    @if($files->where('extension', '=', 'doc')->count() < 1)
                        data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>DOC</b>" 
                    @else
                        id="show-doc-files"
                    @endif
                >
                    <i class="fa fa-file-word"></i> DOC
                </a>
                <a name="non-active" class="btn btn-light-primary " 
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
                        name="non-active" class="btn btn-light-primary" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>PPTX</b>" 
                    @else
                        name="active" class="btn btn-light-primary active" id="show-pptx-files"
                    @endif
                >
                    <i class="fa fa-file-powerpoint"></i> PPTX
                </a>
                <a 
                    @if($files->where('extension', '=', 'xlsx')->count() < 1)
                        name="non-active" class="btn btn-light-primary" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Brak plików <b>XLSX</b>" 
                    @else
                        name="active" class="btn btn-light-primary active" id="show-xlsx-files"
                    @endif
                >
                    <i class="fa fa-file-excel"></i> XLSX
                </a>

                <a href="{{ route('files.zip', ['id' => $files->where('extension', 'pdf')->pluck('id')->toArray(), 'name' => $name]) }}" class="btn btn-light-success btn-shadow font-weight-bold" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz wszystkie dokumenty PDF jako <b>.zip</b>">
					<span class="svg-icon navi-icon">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000"/>
                            </g>
                        </svg>
					</span>
					Pobierz jako .zip
				</a>
            </div>
        </div>
    </div>
</div>
<div class="row" style="margin-right: 0px; margin-left: 0px;">
    @foreach ($file_categories->split(2) as $split)
    <div class="col-md-6" style="padding-right: 0px; padding-left: 0px;">
        @foreach($split as $category)
        <div class="card card-custom" style="box-shadow: 0px 0px 0px 0px; -webkit-box-shadow: 0px 0px 0px 0x;">
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bold text-dark">{{ $category->name }}</h3>
                <div class="card-toolbar">
					<a href="{{ route('files.zip', ['id' => $files->where('extension', 'pdf')->where('file_category_id', $category->id)->pluck('id')->toArray(), 'name' => $category->name]) }}" class="btn btn-link-primary font-weight-lighter btn-sm" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz poniższe dokumenty PDF jako <b>.zip</b>">
                        <span class="svg-icon navi-icon">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M4.5,3 L19.5,3 C20.3284271,3 21,3.67157288 21,4.5 L21,19.5 C21,20.3284271 20.3284271,21 19.5,21 L4.5,21 C3.67157288,21 3,20.3284271 3,19.5 L3,4.5 C3,3.67157288 3.67157288,3 4.5,3 Z M8,5 C7.44771525,5 7,5.44771525 7,6 C7,6.55228475 7.44771525,7 8,7 L16,7 C16.5522847,7 17,6.55228475 17,6 C17,5.44771525 16.5522847,5 16,5 L8,5 Z" fill="#000000"/>
                                </g>
                            </svg>
						</span>Pobierz .zip
                    </a>
				</div>
            </div>
            <div class="card-body pt-0 pb-0">
            @if($files->where('file_category_id', '=', $category->id)->count() == 0)
            Brak dokumentów w tej kategorii
            @endif
            @foreach($files->where('file_category_id', $category->id) as $file)
                <div class="d-flex align-items-center mb-5" name="{{ $file->extension }}"
                    @if($file->extension != 'pdf' and $file->extension != 'xlsx' and $file->extension != 'pptx')
                        style="display: none !important;" 
                    @endif
                >
                    <div class="mr-3">
                        <a href="{{ route('files.show', $file->id) }}" target="_blank"><img src="{{ asset('/media/files/' . $file->extension . '.svg') }}" style="width: 35px;" alt="{{ $file->name }}"></a>
                    </div>
                    <div class="d-flex flex-column flex-grow-1">
                        <a href="{{ route('files.show', $file->id) }}" class="text-dark text-hover-primary mb-1 font-size-md font-weight-normal" target="_blank">
                            {{ $file->name }}
                        </a>
                        <a href="{{ route('files.show', $file->id) }}" class="font-size-xs font-weight-lighter text-dark-50">
                            Data dodania: {{ date('Y-m-d', strtotime($file->created_at)) }}
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
                                @can('update', $file)
                                    <div class="dropdown-divider"></div>
                                    <li class="navi-item">
                                        <a href="{{ route('files.edit', $file->id) }}" class="navi-link">
                                            <i class="navi-icon flaticon2-edit"></i>
                                            <span class="navi-text">Edytuj</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('delete', $file)
                                    <li class="navi-item">
                                        <a onclick='document.getElementById("file_destroy_{{ $file->id }}").submit();' class="navi-link" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Dokument zostanie usunięty we <b>wszystkich</b> obiektach z którymi jest powiązany!">
                                            <i class="navi-icon flaticon2-trash"></i>
                                            <span class="navi-text">Usuń</span>
                                        </a>
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'files.destroy', $file->id ], 'id' => 'file_destroy_' . $file->id ]) }}{{ Form::close() }}
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>