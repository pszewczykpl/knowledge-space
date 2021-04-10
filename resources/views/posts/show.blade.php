@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
		<li class="breadcrumb-item">
			<span class="text-muted">Przeglądaj</span>
		</li>
	</ul>
@stop

@section('toolbar')
		<a href="{{ route('posts.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $post)
			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $post)
			<a onclick='document.getElementById("posts_destroy_{{ $post->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post->id ], 'id' => 'posts_destroy_' . $post->id ]) }}{{ Form::close() }}
		@endcan
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card card-custom gutter-b">
						<div class="card-body" style="padding: 3.5rem 4rem !important;">
							<div>
								<div class="d-flex align-items-center pb-4">
									<div class="d-flex flex-column flex-grow-1">
										<span class="text-dark-75 text-primary mb-2 font-size-h4 font-weight-bold">{{ $post->title }}</span>
										<div class="d-flex">
											<div class="d-flex align-items-center pr-5">
												@include('svg.post-category', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<a href="{{ route('posts.index', ['category' => $post->post_category->id]) }}" class="text-muted font-weight-bold">{{ $post->post_category->name }}</a>
											</div>
											<div class="d-flex align-items-center pr-5">
												@include('svg.user', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<a href="{{ route('users.show', $post->user->id) }}" class="text-muted font-weight-bold">{{ $post->user->fullname() }}</a>
											</div>
											<div class="d-flex align-items-center pr-5">
												@include('svg.time', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
												<span href="{{ route('posts.show', $post->id) }}" class="text-muted font-weight-bold" title="{{ $post->updated_at }}">{{ date('Y-m-d', strtotime($post->updated_at)) }}</span>
											</div>
										</div>
									</div>
								</div>
								<style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
								<div>
									<div class="show-post text-dark-75 font-size-lg font-weight-normal">
										{!! $post->content !!}
									</div>
								</div>
								<div class="pt-5">
									<span class="svg-icon svg-icon-primary svg-icon-2x">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M12.4644661,14.5355339 L9.46446609,14.5355339 C8.91218134,14.5355339 8.46446609,14.9832492 8.46446609,15.5355339 C8.46446609,16.0878187 8.91218134,16.5355339 9.46446609,16.5355339 L12.4644661,16.5355339 L12.4644661,17.5355339 C12.4644661,18.6401034 11.5690356,19.5355339 10.4644661,19.5355339 L6.46446609,19.5355339 C5.35989659,19.5355339 4.46446609,18.6401034 4.46446609,17.5355339 L4.46446609,13.5355339 C4.46446609,12.4309644 5.35989659,11.5355339 6.46446609,11.5355339 L10.4644661,11.5355339 C11.5690356,11.5355339 12.4644661,12.4309644 12.4644661,13.5355339 L12.4644661,14.5355339 Z" fill="#000000" opacity="0.3" transform="translate(8.464466, 15.535534) rotate(-45.000000) translate(-8.464466, -15.535534) "/>
												<path d="M11.5355339,9.46446609 L14.5355339,9.46446609 C15.0878187,9.46446609 15.5355339,9.01675084 15.5355339,8.46446609 C15.5355339,7.91218134 15.0878187,7.46446609 14.5355339,7.46446609 L11.5355339,7.46446609 L11.5355339,6.46446609 C11.5355339,5.35989659 12.4309644,4.46446609 13.5355339,4.46446609 L17.5355339,4.46446609 C18.6401034,4.46446609 19.5355339,5.35989659 19.5355339,6.46446609 L19.5355339,10.4644661 C19.5355339,11.5690356 18.6401034,12.4644661 17.5355339,12.4644661 L13.5355339,12.4644661 C12.4309644,12.4644661 11.5355339,11.5690356 11.5355339,10.4644661 L11.5355339,9.46446609 Z" fill="#000000" transform="translate(15.535534, 8.464466) rotate(-45.000000) translate(-15.535534, -8.464466) "/>
											</g>
										</svg>
									</span>
									<span class="text-dark-50 font-weight-md font-size-lg">Załączniki</span>
								</div>
								<div class="pt-5">
									@if($post->attachments()->count() > 0)
										@foreach($post->attachments as $attachment)
										<div class="pb-3">
											<a href="{{ route('attachments.show', $attachment->id) }}" target="_blank" class="pr-3">
												<img src="{{ asset('/media/files/' . $attachment->extension . '.svg') }}" style="width: 24px;" title="{{ $attachment->name }}">
												<span class="text-dark-75 font-weight-bold pl-1 font-size-md">{{ $attachment->name }}</span>
											</a>
											<a onclick='document.getElementById("attachments_destroy_{{ $attachment->id }}").submit();' class="pr-6">
												<span class="text-danger pl-1 font-size-md">Usuń</span>
											</a>
											{{ Form::open([ 'method'  => 'delete', 'route' => [ 'attachments.destroy', $attachment->id ], 'id' => 'attachments_destroy_' . $attachment->id ]) }}{{ Form::close() }}
										</div>
										@endforeach
									@else
										<span class="text-dark-50 font-weight-bold pl-1 font-size-md">Brak załączników</span>
									@endif

{{--									div class="form-group row">--}}
{{--										<label class="col-form-label text-left pr-2">Załącznik:</label>--}}
{{--										<div>--}}
{{--											<input class="form-control form-control-sm form-control-solid" type="file" name="attachment" id="attachment" />--}}
{{--										</div>--}}
{{--									/div>--}}
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