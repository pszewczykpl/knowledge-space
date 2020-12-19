@can('view', $post)
<div class="card card-custom gutter-b @if($post->trashed()) bg-danger @endif">
	<div class="card-body">
		<div>
			<div class="d-flex align-items-center pb-4">
				<div class="d-flex flex-column flex-grow-1">
					<a href="{{ route('posts.show', $post->id) }}" class="@if($post->trashed()) text-white @else text-dark-75 text-hover-primary @endif mb-2 font-size-h4 font-weight-bold">{{ $post->title }}</a>
					<div class="d-flex">
						<div class="d-flex align-items-center pr-5">
							<span class="svg-icon svg-icon-md @if($post->trashed()) svg-icon-white @else svg-icon-primary @endif pr-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z" fill="#000000"></path>
                                        <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1"></rect>
                                    </g>
                                </svg>
							</span>
							<a href="{{ route('posts.index', ['category' => $post->post_category->id]) }}" class="@if($post->trashed()) text-white @else text-muted @endif font-weight-bold">{{ $post->post_category->name }}</a>
						</div>
						<div class="d-flex align-items-center">
							<span class="svg-icon svg-icon-md @if($post->trashed()) svg-icon-white @else svg-icon-primary @endif pr-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>
							</span>
							<a href="{{ route('users.show', $post->user->id) }}" class="@if($post->trashed()) text-white @else text-muted @endif font-weight-bold">{{ $post->user->fullname() }}</a>
						</div>
					</div>
				</div>
				<div class="dropdown dropdown-inline ml-2">
                        <a class="btn btn-sm @if($post->trashed()) btn-white @else btn-clean @endif btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">
                            <i class="flaticon-more-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                            <ul class="navi navi-hover flex-column">
								@if(!$post->trashed())
									@can('view', $post)
									<li class="navi-item">
										<a href="{{ route('posts.show', $post->id) }}" class="navi-link">
											<i class="navi-icon flaticon2-expand"></i>
											<span class="navi-text">Wyświetl</span>
										</a>
									</li>
									@endcan
									@can('update', $post)
									<li class="navi-item">
										<a href="{{ route('posts.edit', $post->id) }}" class="navi-link">
											<i class="navi-icon flaticon2-edit"></i>
											<span class="navi-text">Edytuj</span>
										</a>
									</li>
									@endcan
									@can('delete', $post)
									<li class="navi-item">
										<a onclick='document.getElementById("post_destroy_{{ $post->id }}").submit();' class="navi-link" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Aktualność zostanie usunięta wraz z <b>wszystkimi</b> odpowiedziami!">
											<i class="navi-icon flaticon2-trash"></i>
											<span class="navi-text">Usuń</span>
										</a>
										{{ Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post->id ], 'id' => 'post_destroy_' . $post->id ]) }}{{ Form::close() }}
									</li>
									@endcan
								@else
									@can('restore', $post)
									<li class="navi-item">
										<a onclick='document.getElementById("post_restore_{{ $post->id }}").submit();' class="navi-link">
											<i class="navi-icon flaticon2-time"></i>
											<span class="navi-text">Przywróć</span>
										</a>
										{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'posts.restore', $post->id ], 'id' => 'post_restore_' . $post->id ]) }}{{ Form::close() }}
									</li>
									@endcan
									@can('forceDelete', $post)
									<li class="navi-item">
										<a onclick='document.getElementById("post_force_destroy_{{ $post->id }}").submit();' class="navi-link" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Aktualność zostanie trwale usunięta wraz z <b>wszystkimi</b> odpowiedziami!">
											<i class="navi-icon flaticon2-trash"></i>
											<span class="navi-text">Usuń trwale</span>
										</a>
										{{ Form::open([ 'method'  => 'delete', 'route' => [ 'posts.forceDestroy', $post->id ], 'id' => 'post_force_destroy_' . $post->id ]) }}{{ Form::close() }}
									</li>
									@endcan
								@endif
							</ul>
                        </div>
                    </div>
				</div>
                <style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
                <div>
                    <div class="show-post @if($post->trashed()) text-white @else text-dark-75 @endif font-size-lg font-weight-normal">
                        {{  substr(strip_tags($post->content), 0, 200)  }}...
                    </div>
                </div>
                <div class="pt-3">
                    <a class="@if($post->trashed()) text-white @else text-primary @endif font-weight-bold" href="{{ route('posts.show', $post->id) }}">Czytaj dalej</a>
                </div>
		</div>
	</div>
</div>
@endcan