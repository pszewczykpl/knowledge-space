@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('create', App\Models\Post::class)
		<x-layout.toolbar.button action="custom" svg="post" title="Dodaj Artykuł" href="{{ route('posts.create') }}" />
	@endcan
	{{-- @can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'posts']) }}" />
	@endcan --}}
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
