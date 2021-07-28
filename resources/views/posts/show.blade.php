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
{{--<div class="container">--}}
{{--	<div class="d-flex flex-row">--}}
{{--		<div class="flex-row-fluid">--}}
{{--			<div class="row">--}}
{{--				<div class="col-12">--}}
{{--					<div class="card card-custom gutter-b">--}}
{{--						<div class="card-body" style="padding: 3.5rem 4rem !important;">--}}
{{--							<div>--}}
{{--								<div class="d-flex align-items-center pb-4">--}}
{{--									<div class="d-flex flex-column flex-grow-1">--}}
{{--										<span class="text-dark-75 text-primary mb-2 font-size-h4 font-weight-bold">{{ $post->title }}</span>--}}
{{--										<div class="d-flex">--}}
{{--											<div class="d-flex align-items-center pr-5">--}}
{{--												@include('svg.post-category', ['class' => 'svg-icon-md svg-icon-primary pr-1'])--}}
{{--												<a href="{{ route('posts.index', ['category' => $post->postCategory->id]) }}" class="text-muted font-weight-bold">{{ $post->postCategory->name }}</a>--}}
{{--											</div>--}}
{{--											<div class="d-flex align-items-center pr-5">--}}
{{--												@include('svg.user', ['class' => 'svg-icon-md svg-icon-primary pr-1'])--}}
{{--												<a href="{{ route('users.show', $post->user->id) }}" class="text-muted font-weight-bold">{{ $post->user->full_name }}</a>--}}
{{--											</div>--}}
{{--											<div class="d-flex align-items-center pr-5">--}}
{{--												@include('svg.time', ['class' => 'svg-icon-md svg-icon-primary pr-1'])--}}
{{--												<span href="{{ route('posts.show', $post->id) }}" class="text-muted font-weight-bold" title="{{ $post->updated_at }}">{{ date('Y-m-d', strtotime($post->updated_at)) }}</span>--}}
{{--											</div>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--								<style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>--}}
{{--								<div>--}}
{{--									<div class="show-post text-dark-75 font-size-lg font-weight-normal">--}}
{{--										{!! $post->content !!}--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}

<div id="kt_content_container" class="container">
	<div class="card card-shadow card-rounded">
		<div class="card-body">
			<div class="mb-10">
				<div class="row">

					<div class="col-md-12 justify-content-between d-flex flex-column pt-lg-6">
						<div class="row">
							<div class="col-12">
								<div class="mb-8">
									<div class="ps-lg-6">
										<div class="d-flex flex-wrap mb-6">
											<div class="me-9 my-1">
												@include('svg.post-category', ['class' => 'svg-icon svg-icon-primary svg-icon-2 me-1'])
												<span class="fw-bolder text-gray-400">{{ $post->postCategory->name }}</span>
											</div>
											<div class="me-9 my-1">
												@include('svg.user', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<span class="fw-bolder text-gray-400">{{ $post->user->full_name }}</span>
											</div>
											<div class="me-9 my-1">
												@include('svg.time', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<span class="fw-bolder text-gray-400">{{ date('Y-m-d', strtotime($post->updated_at)) }}</span>
											</div>
										</div>
										<span class="text-dark text-hover-primary fs-2 fw-bolder">{{ $post->title }}</span>
										<style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
										<div class="mt-5">
											<div class="show-post text-dark-75 font-size-lg font-weight-normal">
												{!! $post->content !!}
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
	</div>
</div>
@stop