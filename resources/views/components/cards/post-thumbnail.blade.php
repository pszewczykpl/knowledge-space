<div class="card card-custom gutter-b @if($post->trashed()) bg-danger @endif">
	<div class="card-body">
		<div>
			<div class="d-flex align-items-center pb-4">
				<div class="d-flex flex-column flex-grow-1">
					<a href="{{ route('posts.show', $post->id) }}" class="@if($post->trashed()) text-white @else text-dark-75 text-hover-primary @endif mb-2 font-size-h4 font-weight-bold">{{ $post->title }}</a>
					<div class="d-flex">
						<div class="d-flex align-items-center pr-5">
							@include('svg.post-category', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
							<a href="{{ route('posts.index', ['category' => $post->getCachedRelation('post_category')->first()->id]) }}" class="@if($post->trashed()) text-white @else text-muted @endif font-weight-bold">{{ $post->getCachedRelation('post_category')->first()->name }}</a>
						</div>
						<div class="d-flex align-items-center">
							@include('svg.user', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
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
									<li class="navi-item">
										<a href="{{ route('posts.show', $post->id) }}" class="navi-link">
											<i class="navi-icon flaticon2-expand"></i>
											<span class="navi-text">{{ __('View') }}</span>
										</a>
									</li>
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