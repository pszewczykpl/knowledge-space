@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('posts.index') }}" />
	@can('create', App\Models\Post::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('submit').click();" />
	@endcan
@stop

@section('content')
<x-pages.form>
	{!! Form::open(['route' => 'posts.store', 'method' => 'post', 'id' => 'kt_forms_widget_1_form', 'class' => 'ql-quil ql-quil-plain pb-3']) !!}
	{!! Form::token() !!}
	<div class="card mb-5 mb-xl-10 card-rounded card-shadow">
		<div class="card-body">
			<div class="mb-5">
				<div class="row">

					<div class="col-md-8 justify-content-between d-flex flex-column pt-lg-6">
						<div class="row">
							<div class="col-12">
								<div class="mb-0">
									<div class="ps-lg-6">
										<div class="form-group row">
											<div class="col-lg-12">
												<label class="form-label required fw-bold fs-6">Tytuł artykułu:</label>
												<div class="fv-row fv-plugins-icon-container">
													<input type="text" id="title" name="title" class="form-control form-control-lg form-control-solid" placeholder="Wprowadź tytuł">
													<div class="fv-plugins-message-container invalid-feedback"></div>
												</div>
											</div>
										</div>
										<style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
										<div class="mt-5">
											<div class="show-post fw-normal fs-5 mt-4 text-dark" style="font-family: Poppins, Helvetica, sans-serif;">
												<div id="kt_forms_widget_1_editor" class="py-6 fw-normal fs-5 mt-4 text-dark" style="font-family: Poppins, Helvetica, sans-serif;"></div>
												<textarea name="content" style="display:none" id="content"></textarea>
												<div class="separator"></div>
												<div id="kt_forms_widget_1_editor_toolbar" class="ql-toolbar d-flex flex-stack py-2">
													<div class="me-2">
														<span class="ql-formats">
															<button class="ql-bold"></button>
															<button class="ql-italic"></button>
															<button class="ql-underline"></button>
															<button class="ql-strike"></button>
															<button class="ql-image"></button>
															<button class="ql-link"></button>
															<button class="ql-clean"></button>
														</span>
													</div>
													<div class="me-n3">
														<span class="btn btn-icon btn-sm btn-active-color-primary">
															<i class="flaticon2-clip-symbol icon-ms"></i>
														</span>
														<span class="btn btn-icon btn-sm btn-active-color-primary">
															<i class="flaticon2-pin icon-ms"></i>
														</span>
													</div>
													<div>
														<input type="submit" id="submit" name="submit" value="Dodaj post" style="font-family: Poppins, Helvetica, sans-serif; display: none !important;" class="btn btn-sm btn-active-color-primary pe-0 me-2">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="flex-column flex-lg-row-auto mb-8 ms-10 pt-lg-6">
							<div class="mb-10">
								<div class="form-group row">
									<div class="col-lg-12">
										<label class="form-label required fw-bold fs-6">Kategoria artykułu:</label>
										<div class="fv-row fv-plugins-icon-container">
											<select class="form-control form-control-lg form-control-solid select2-single" id="post_category_id" name="post_category_id">
												@foreach($postCategories as $postCategory)
													<option value="{{ $postCategory->id }}">{{ $postCategory->name }}</option>
												@endforeach
											</select>
											<div class="fv-plugins-message-container invalid-feedback"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
</x-pages.form>
@stop