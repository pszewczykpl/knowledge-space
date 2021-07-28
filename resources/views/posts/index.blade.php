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
<div id="kt_content_container" class="container">
	<div class="card card-shadow card-rounded">
		<div class="card-body">
			<div class="mb-10">
				<div class="row">

					<div class="col-md-8 justify-content-between d-flex flex-column pt-lg-6">
						<div class="row">
							<div class="col-12">
								@foreach($posts as $post)
									<div class="ps-lg-6 mb-16 mt-md-0 mt-17">
										<div class="mb-6">
											<a href="{{ route('posts.show', $post->id) }}" class="fw-bolder text-dark mb-4 fs-2 lh-base text-hover-primary">{{ $post->title }}</a>
											<div class="fw-bold fs-5 mt-4 text-gray-600 text-dark">{{  substr(strip_tags($post->content), 0, 350)  }}... <a class="text-primary font-weight-bold" href="{{ route('posts.show', $post->id) }}">Czytaj dalej</a></div>
										</div>
										<div class="d-flex flex-stack flex-wrap">
											<div class="d-flex align-items-center pe-2">
												<a href="{{ route('users.show', $post->user) }}">
													<div class="symbol symbol-35px symbol-circle me-3">
														<img src="{{ Storage::url($post->user->avatar_path ?? 'avatars/default.jpg') }}" class="" alt="">
													</div>
												</a>
												<div class="fs-5 fw-bolder">
													<a href="{{ route('users.show', $post->user) }}" class="text-gray-700 text-hover-primary">{{ $post->user->fullname}}</a>
													<span class="text-muted"> dodał w dniu {{ date_format($post->created_at, 'Y-m-d') }}</span>
												</div>
											</div>
											<a href="{{ route('posts.index', ['category' => $post->postCategory->id]) }}"><span class="badge badge-light-primary fw-bolder my-2">{{ $post->postCategory->name }}</span></a>
										</div>
									</div>
								@endforeach
							</div>
							<div class="row justify-content-center">
								<div class="col-12">
									{{ $posts->appends(['category' =>  request()->get('category')])->links() }}
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
									<a href="{{ route('posts.index') }}" class="@if(request()->get('category') === null) text-primary @else text-muted text-hover-primary @endif pe-2">Wszystkie</a>
{{--									<div class="m-0">585</div>--}}
								</div>

								@foreach($postCategories as $postCategory)
								<div class="d-flex flex-stack fw-bold fs-5 text-muted my-2">
									<a href="{{ route('posts.index', ['category' => $postCategory->id]) }}" class="@if($postCategory->id == request()->get('category')) text-primary @else text-muted text-hover-primary @endif pe-2">{{ $postCategory->name }}</a>
{{--									<div class="m-0">585</div>--}}
								</div>
								@endforeach


							</div>

							{{--				<div class="col-12 pb-5">--}}
							{{--					<a href="{{ route('posts.index') }}">--}}
							{{--						<button class="btn @if(request()->get('category') === null) btn-hover-transparent-primary active @else btn-light btn-text-primary btn-hover-text-primary @endif font-weight-bold font-size-sm mr-4 mb-5">--}}
							{{--							Wszystkie--}}
							{{--						</button>--}}
							{{--					</a>--}}
							{{--					@foreach($postCategories as $postCategory)--}}
							{{--					<a href="{{ route('posts.index', ['category' => $postCategory->id]) }}">--}}
							{{--						<button class="btn @if($postCategory->id == request()->get('category')) btn-hover-transparent-primary active @else btn-light btn-text-primary btn-hover-text-primary @endif font-weight-bold font-size-sm mr-4 mb-5">--}}
							{{--							{{ $postCategory->name }}--}}
							{{--						</button>--}}
							{{--					</a>--}}
							{{--					@endforeach--}}
							{{--				</div>--}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
