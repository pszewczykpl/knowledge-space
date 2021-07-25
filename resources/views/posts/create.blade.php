@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('posts.index') }}" />
	@can('create', App\Models\Post::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('post_store_form').submit();" />
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
						{!! Form::open(['route' => 'posts.store', 'method' => 'post', 'id' => 'kt_forms_widget_2_form', 'class' => 'ql-quil ql-quil-plain']) !!}
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
								<div id="editor" name="editor" class="font-size-lg pt-5" style="font-family: Poppins,Helvetica,sans-serif !important;"></div>
								<textarea name="content" style="display:none" id="content"></textarea>
								<input type="submit" id="submit" name="submit" value="Zapisz" style="visibility: hidden;">
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop