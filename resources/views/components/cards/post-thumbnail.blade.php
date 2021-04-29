<div class="card card-custom gutter-b">
	<div class="card-body">
		<div>
			<div class="d-flex align-items-center pb-4">
				<div class="d-flex flex-column flex-grow-1">
					<a href="{{ route('posts.show', $post->id) }}" class="text-dark-75 text-hover-primary mb-2 font-size-h4 font-weight-bold">{{ $post->title }}</a>
					<div class="d-flex">
						<div class="d-flex align-items-center pr-5">
							@include('svg.post-category', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
							<a href="{{ route('posts.index', ['category' => $post->postCategory->id]) }}" class="text-muted font-weight-bold">{{ $post->postCategory->name }}</a>
						</div>
						<div class="d-flex align-items-center">
							@include('svg.user', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
							<a href="{{ route('users.show', $post->user->id) }}" class="text-muted font-weight-bold">{{ $post->user->full_name }}</a>
						</div>
					</div>
				</div>
				<div class="dropdown dropdown-inline ml-2">
                        <a class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown" aria-expanded="false" title="Więcej">
                            <i class="flaticon-more-1"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="">
                            <ul class="navi navi-hover flex-column">
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
							</ul>
                        </div>
                    </div>
				</div>
                <style>.show-post p { margin-top: 0; margin-bottom: 0; }</style>
                <div>
                    <div class="show-post text-dark-75 font-size-lg font-weight-normal">
                        {{  substr(strip_tags($post->content), 0, 200)  }}...
                    </div>
                </div>
                <div class="pt-3">
                    <a class="text-primary font-weight-bold" href="{{ route('posts.show', $post->id) }}">Czytaj dalej</a>
                </div>
		</div>
	</div>
</div>