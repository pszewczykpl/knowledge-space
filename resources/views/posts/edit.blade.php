@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ url()->previous() }}" class="btn btn-md btn-clean btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
						<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
					</g>
				</svg>
			</span>
			Powrót
		</a>
        @can('update', $post)
        <a onclick='document.getElementById("submit").click();' class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"/>
                        <path d="M17,4 L6,4 C4.79111111,4 4,4.7 4,6 L4,18 C4,19.3 4.79111111,20 6,20 L18,20 C19.2,20 20,19.3 20,18 L20,7.20710678 C20,7.07449854 19.9473216,6.94732158 19.8535534,6.85355339 L17,4 Z M17,11 L7,11 L7,4 L17,4 L17,11 Z" fill="#000000" fill-rule="nonzero"/>
                        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="5" rx="0.5"/>
                    </g>
                </svg>
			</span>
			Zapisz
		</a>
        @endcan
	</div>
</div>
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
						{!! Form::open(['route' => ['posts.update', $post->id], 'method' => 'PUT', 'id' => 'kt_forms_widget_2_form', 'class' => 'ql-quil ql-quil-plain']) !!}
						<div class="card-body" style="padding: 3.5rem 4rem !important;">
							<div class="">
								<div class="form-group row">
									<div class="col-lg-6">
										<label>Tytuł artykułu:</label>
										<input type="text" id="title" name="title" class="form-control form-control-solid" placeholder="Wprowadź tytuł" value="{{ $post->title }}">
									</div>
									<div class="col-lg-6">
										<label>Kategoria artykułu:</label>
										<select class="form-control form-control-solid" id="post_category_id" name="post_category_id">
											@foreach($postCategories as $postCategory)
											<option value="{{ $postCategory->id }}" @if($post->post_category_id == $postCategory->id) selected @endif>{{ $postCategory->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="pt-1">
								<label>Treść artykułu:</label>
								<div id="editor" name="editor" class="font-size-lg pt-5" style="font-family: Poppins,Helvetica,sans-serif !important;">{!! $post->content !!}</div>
								<textarea name="content" style="display:none" id="content"></textarea>
								<input type="submit" id="submit" name="submit" value="Aktualizuj" style="visibility: hidden;">
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

@section('additional_scripts')
<script src="{{ asset('js/pages/posts/edit.js') }}" type="text/javascript"></script>
@stop
