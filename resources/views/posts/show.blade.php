@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('posts.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $post)
			<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $post)
			<a onclick='document.getElementById("posts_destroy_{{ $post->id }}").submit();' class="btn btn-light-danger btn-sm">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post->id ], 'id' => 'posts_destroy_' . $post->id ]) }}{{ Form::close() }}
		@endcan
	</div>
</div>
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
												<span class="svg-icon svg-icon-md svg-icon-primary pr-1">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"></path>
															<rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1"></rect>
														</g>
													</svg>
												</span>
												<a href="{{ route('posts.index', ['category' => $post->post_category->id]) }}" class="text-muted font-weight-bold">{{ $post->post_category->name }}</a>
											</div>
											<div class="d-flex align-items-center pr-5">
												<span class="svg-icon svg-icon-md svg-icon-primary pr-1">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<polygon points="0 0 24 0 24 24 0 24"></polygon>
															<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
															<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
														</g>
													</svg>
												</span>
												<a href="{{ route('users.show', $post->user->id) }}" class="text-muted font-weight-bold">{{ $post->user->fullname() }}</a>
											</div>
											<div class="d-flex align-items-center pr-5">
												<span class="svg-icon svg-icon-md svg-icon-primary pr-1">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"></path>
															<path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"></path>
														</g>
													</svg>
												</span>
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

@section('additional_scripts')
@stop