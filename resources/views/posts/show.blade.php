@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('posts.index') }}" />
	@can('update', $post)
		<x-layout.toolbar.button action="edit" href="{{ route('posts.edit', $post) }}" />
	@endcan
	@can('delete', $post)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('posts_destroy_{{ $post->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post ], 'id' => 'posts_destroy_' . $post->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
<div id="kt_content_container" class="container">
	<div class="card card-shadow card-rounded">
		<div class="card-body">
			<div class="mb-10">
				<div class="row">

					<div class="col-md-8 justify-content-between d-flex flex-column pt-lg-6">
						<div class="row">
							<div class="col-12">
								<div class="mb-8">
									<div class="ps-lg-6">
										<div class="d-flex align-items-center mb-4">
											<div class="d-flex flex-column">
												<h1 class="text-gray-800 fw-bold">{{ $post->title }}</h1>
												<div class="">
													<span class="fw-bold text-muted me-6">Kategoria:
														<a href="{{ route('posts.index', ['category' => $post->postCategory->id]) }}" class="fw-bolder text-muted text-hover-primary">{{ $post->postCategory->name }}</a></span>
													<span class="fw-bold text-muted me-6">Autor:
														<a href="{{ route('users.show', $post->user) }}" class="fw-bolder text-muted text-hover-primary">{{ $post->user->full_name }}</a></span>
													<span class="fw-bold text-muted">Utworzono:
														<span class="fw-bolder text-gray-600 me-1">{{ date_format($post->created_at, 'Y-m-d') }}</span>
												</div>
											</div>
										</div>
										<style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
										<div class="mt-5">
											<div class="show-post fw-normal fs-5 mt-4 text-dark" style="font-family: Poppins, Helvetica, sans-serif;">
												{!! $post->content !!}
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="col-md-4">
						<div class="flex-column flex-lg-row-auto mb-8 ms-10 pt-lg-6">
							{{--							<div class="mb-16">--}}
							{{--								<h4 class="text-black mb-7">Szukaj w Artykułach</h4>--}}
							{{--								<div class="position-relative">--}}
							{{--									@include('svg.search', ['class' => 'svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6'])--}}
							{{--									<input type="text" class="form-control form-control-solid ps-10" name="search" value="" placeholder="Szukaj...">--}}
							{{--								</div>--}}
							{{--							</div>--}}
							<div class="mb-16">
								<h4 class="text-black mb-7">Kategorie Artykułów</h4>
								<div class="d-flex flex-stack fw-bold fs-5 text-muted my-2">
									<a href="{{ route('posts.index') }}" class="text-muted text-hover-primary pe-2">Wszystkie</a>
									<div class="m-0">{{ App\Models\Post::count() }}</div>
								</div>

								@foreach($postCategories as $postCategory)
									<div class="d-flex flex-stack fw-bold fs-5 text-muted my-2">
										<a href="{{ route('posts.index', ['category' => $postCategory->id]) }}" class="text-muted text-hover-primary pe-2">{{ $postCategory->name }}</a>
										<div class="m-0">{{ $postCategory->posts->count() }}</div>
									</div>
								@endforeach


							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@stop