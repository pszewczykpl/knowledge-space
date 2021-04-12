@extends('layouts.app')

@section('subheader')
	<x-layout.subheader description="Przeglądaj wszystkie artykuły" />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	@can('create', App\Models\Post::class)
		<a href="{{ route('posts.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.post', ['class' => 'navi-icon']) Dodaj Artykuł</a>
	@endcan
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

@push('scripts')
<script src="{{ asset('js/pages/posts/index.js') }}" type="text/javascript"></script>
@endpush
