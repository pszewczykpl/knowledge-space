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
			<a href="{{ route('posts.create') }}" class="btn btn-light-primary btn-shadow font-weight-bold ml-1">
				<span class="svg-icon navi-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"></rect>
							<path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"></path>
							<path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"></path>
						</g>
					</svg>
				</span>
				Dodaj Artykuł
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
