@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('posts.index') }}" />
	@can('create', App\Models\Post::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('submit').click();" />
	@endcan
@stop

@section('content')
<div class="container">
	@if(count($errors) > 0)
    <div class="alert alert-custom alert-notice alert-light-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">
            @foreach($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    </div>
    @endif
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-custom gutter-b">
						{!! Form::open(['route' => 'posts.store', 'method' => 'post', 'id' => 'kt_forms_widget_1_form', 'class' => 'ql-quil ql-quil-plain pb-3']) !!}
						<div class="card-body" style="padding: 3.5rem 4rem !important;">
							<div class="">
								<div class="form-group row">
									<div class="col-lg-6">
										<label>Tytuł artykułu:</label>
										<input type="text" id="title" name="title" class="form-control form-control-solid" placeholder="Wprowadź tytuł">
									</div>
									<div class="col-lg-6">
										<label>Kategoria artykułu:</label>
										<select class="form-control form-control-solid" id="post_category_id" name="post_category_id">
											@foreach($postCategories as $postCategory)
											<option value="{{ $postCategory->id }}">{{ $postCategory->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="pt-1">
								<label>Treść artykułu:</label>
								<div id="kt_forms_widget_1_editor" class="py-6 fw-normal fs-6 mt-4 text-dark" style="font-family: Poppins, Helvetica, sans-serif;"></div>
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
										<input type="submit" id="submit" name="submit" value="Dodaj aktualność" style="display: none;">
									</div>
								</div>
							</div>
						</div>
						{!! Form::close() !!}

{{--						{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_1_form', 'class' => 'ql-quil ql-quil-plain pb-3']) !!}--}}
{{--						<div id="kt_forms_widget_1_editor" class="py-6 text-gray-800 fw-normal" style="font-size: 13px !important; font-family: Poppins, Helvetica, sans-serif;"></div>--}}
{{--							<textarea name="content" style="display:none" id="content"></textarea>--}}
{{--							<div class="separator"></div>--}}
{{--							<div id="kt_forms_widget_1_editor_toolbar" class="ql-toolbar d-flex flex-stack py-2">--}}
{{--								<div class="me-2">--}}
			{{--						<span class="ql-formats">--}}
			{{--							<button class="ql-bold"></button>--}}
			{{--							<button class="ql-italic"></button>--}}
			{{--							<button class="ql-underline"></button>--}}
			{{--							<button class="ql-strike"></button>--}}
			{{--							<button class="ql-image"></button>--}}
			{{--							<button class="ql-link"></button>--}}
			{{--							<button class="ql-clean"></button>--}}
			{{--						</span>--}}
{{--								</div>--}}
{{--								<div class="me-n3">--}}
			{{--						<span class="btn btn-icon btn-sm btn-active-color-primary">--}}
			{{--							<i class="flaticon2-clip-symbol icon-ms"></i>--}}
			{{--						</span>--}}
{{--									<span class="btn btn-icon btn-sm btn-active-color-primary">--}}
			{{--							<i class="flaticon2-pin icon-ms"></i>--}}
			{{--						</span>--}}
{{--								</div>--}}
{{--								<div>--}}
{{--									<input type="submit" id="submit" name="submit" value="Dodaj aktualność" style="font-family: Poppins, Helvetica, sans-serif;" class="btn btn-sm btn-active-color-primary pe-0 me-2">--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						{!! Form::close() !!}--}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop