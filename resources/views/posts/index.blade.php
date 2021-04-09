@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\Post::class)
			<a href="{{ route('posts.create') }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.post', ['class' => 'navi-icon']) Dodaj Artykuł
			</a>
		@endcan
	</div>
</div>
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-12 pb-5">
					<a href="{{ route('posts.index') }}">
						<button class="btn @if(request()->get('category') === null) btn-hover-transparent-primary active @else btn-light btn-text-primary btn-hover-text-primary @endif font-weight-bold font-size-sm mr-4 mb-5">
							Wszystkie
						</button>
					</a>
					@foreach($postCategories as $postCategory)
					<a href="{{ route('posts.index', ['category' => $postCategory->id]) }}">
						<button class="btn @if($postCategory->id == request()->get('category')) btn-hover-transparent-primary active @else btn-light btn-text-primary btn-hover-text-primary @endif font-weight-bold font-size-sm mr-4 mb-5">
							{{ $postCategory->name }}
						</button>
					</a>
					@endforeach
				</div>
			</div>
			<div class="row">
				@foreach($posts as $post)
					<div class="col-12 col-md-6">
						<x-cards.post-thumbnail :post="$post" />
					</div>
				@endforeach
			</div>
			<div class="row justify-content-center">
				<div class="col-2">
					{{ $posts->appends(['category' =>  request()->get('category')])->links() }}
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/posts/index.js') }}" type="text/javascript"></script>
@stop
