<div class="card pt-4 mb-6 mb-xl-9 card-rounded card-shadow">
    <div class="card-header border-0">
        <div class="card-title">
            <h2>Dokumenty</h2>
        </div>
        <div class="card-toolbar">
            @if($files->where('draft', 1)->count() > 0)
            <a name="non-active" class="btn btn-light-primary font-weight-bold btn-flex btn-sm ms-2" id="show-draft-files"  data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pokaż dokumenty robocze">
                @include('svg.work', ['class' => 'svg-icon svg-icon-3'])
                Pokaż robocze
            </a>
            @endif
            <a href="{{ route('files.zip', ['id' => $files->where('draft', 0)->pluck('id')->toArray(), 'name' => $name]) }}" class="btn btn-light-success font-weight-bold btn-flex btn-sm ms-2" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz wszystkie dokumenty jako <b>.zip</b>">
                @include('svg.zip', ['class' => 'svg-icon svg-icon-3'])
                Pobierz jako .zip
            </a>
            @can('create', App\Models\File::class)
            <a href="{{ route('files.create', ['fileable_type' => $fileable_type, 'fileable_id' => $fileable_id]) }}" class="btn btn-light-primary font-weight-bold btn-flex btn-sm ms-2" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz wszystkie dokumenty jako <b>.zip</b>">
                @include('svg.file', ['class' => 'svg-icon svg-icon-3'])
                Dodaj dokument
            </a>
            @endcan
        </div>
    </div>
    <div class="card-body pt-0 m-0 p-6">
        @if($model->status == 'Archiwalny')<div class="row p-0 m-0"><div class="col-12 p-0 m-0 px-3"><x-cards.archive-files /></div></div>@endif
        <div class="row p-0 m-0">
        @foreach ($fileCategories->split(2) as $split)
            <div class="col-md-6 p-0 m-0 px-3">
                @foreach($split as $category)
                <div class="card card-custom p-0 m-0">
                    <div class="card-header border-0 p-0 m-0 min-h-60px">
                        <h3 class="card-title fw-bold text-dark">{{ $category->name }}</h3>
                        <div class="card-toolbar">
                            <a href="{{ route('files.zip', ['id' => $files->where('draft', 0)->where('file_category_id', $category->id)->pluck('id')->toArray(), 'name' => $category->name]) }}" class="btn btn-link btn-color-primary btn-active-color-primary btn-sm" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Pobierz poniższe dokumenty jako <b>.zip</b>">
                                @include('svg.zip', ['class' => 'navi-icon'])Pobierz .zip
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0 m-0">
                    @foreach($files->where('file_category_id', $category->id) as $file)
                        <div class="d-flex align-items-center mb-5"
                            @if($file->draft == 1)
                                name="draft" style="display: none !important;"
                            @endif
                        >
                            <div class="me-3">
                                <a href="{{ route('files.show', $file->id) }}" target="_blank"><img src="{{ asset('/media/files/' . $file->extension . '.svg') }}" style="width: 35px;" alt="{{ $file->name }}"></a>
                            </div>
                            <div class="d-flex flex-column flex-grow-1">
                                <a href="{{ route('files.show', $file->id) }}" class="fs-7 fw-normal text-dark mt-auto" target="_blank">
                                    {{ $file->name }}
                                </a>
                                <a href="{{ route('files.show', $file->id) }}" class="fs-7 fw-normal text-gray-400 mt-auto" target="_blank">
                                    Data ostatniej edycji: {{ date('Y-m-d', strtotime($file->updated_at)) }}
                                </a>
                            </div>

							<div class="my-0">
								<button type="button" class="btn btn-sm btn-icon btn-active-light" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
									<span class="svg-icon svg-icon-1">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
												<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
												<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
												<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
											</g>
										</svg>
									</span>
								</button>
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
									<div class="menu-item px-3">
                                        <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Opcje</div>
                                    </div>
                                    @if($file->extension == 'pdf')
                                        <div class="menu-item px-3 my-1">
                                            <a href="{{ route('files.show', $file->id) }}" class="menu-link px-3" target="_blank">{{ __('View') }}</a>
                                        </div>
                                    @endif
                                    <div class="menu-item px-3 my-1">
										<a href="{{ route('files.download', $file->id) }}" class="menu-link px-3" target="_blank">Pobierz</a>
									</div>
                                    @can('update', $file)
                                    <div class="separator mt-3 opacity-75 mb-3"></div>
                                    @endcan
                                    @can('update', $file)
                                    <div class="menu-item px-3 my-1">
										<a href="{{ route('files.edit', $file->id) }}" class="menu-link px-3">Edytuj</a>
									</div>
                                    @endcan
                                    @can('update', $file)
                                    <div class="menu-item px-3 my-1">
										<a href="{{ route('files.replace', ['file' => $file, 'fileable_type' => $fileable_type, 'fileable_id' => $fileable_id]) }}" class="menu-link px-3">Zastąp</a>
									</div>
                                    @endcan
                                    @can('update', $file)
                                    <div class="menu-item px-3 my-1">
										<a href="{{ route('files.detach', ['file' => $file, 'fileable_type' => $fileable_type, 'fileable_id' => $fileable_id]) }}" class="menu-link px-3">Odepnij</a>
									</div>
                                    @endcan
                                    @can('delete', $file)
                                    <div class="menu-item px-3 my-1">
										<a onclick='document.getElementById("file_destroy_{{ $file->id }}").submit();' class="menu-link px-3">Usuń</a>
                                        {{ Form::open([ 'method'  => 'delete', 'route' => [ 'files.destroy', $file->id ], 'id' => 'file_destroy_' . $file->id ]) }}{{ Form::close() }}
									</div>
                                    @endcan
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
    </div>
</div>
