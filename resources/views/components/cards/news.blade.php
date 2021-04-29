<div class="card card-custom gutter-b">
	<div class="card-body">
		<div>
			<div class="d-flex align-items-center pb-4">
				<div class="symbol symbol-40 symbol-white mr-5">
					<span class="symbol-label" style="background-image:url({{ Storage::url($news->user->avatar_path ?? 'avatars/default.jpg') }})"></span>
				</div>
				<div class="d-flex flex-column flex-grow-1">
					<a href="{{ route('users.show', $news->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $news->user->full_name }}</a>
					<div class="d-flex">
						<div class="d-flex align-items-center pr-5">
							@include('svg.time', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
							<a href="{{ route('news.show', $news->id) }}" class="text-muted font-weight-bold" title="{{ $news->updated_at }}">{{ date('Y-m-d', strtotime($news->updated_at)) }}</a>
						</div>
						<div class="d-flex align-items-center">
							@include('svg.department', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
							<span class="text-muted font-weight-bold">{{ $news->user->department->name }}</span>
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
									<a href="{{ route('news.show', $news->id) }}" class="navi-link">
										<i class="navi-icon flaticon2-expand"></i>
										<span class="navi-text">{{ __('View') }}</span>
									</a>
								</li>
								@can('update', $news)
								<li class="navi-item">
									<a href="{{ route('news.edit', $news->id) }}" class="navi-link">
										<i class="navi-icon flaticon2-edit"></i>
										<span class="navi-text">Edytuj</span>
									</a>
								</li>
								@endcan
								@can('delete', $news)
								<li class="navi-item">
									<a onclick='document.getElementById("news_destroy_{{ $news->id }}").submit();' class="navi-link" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Aktualność zostanie usunięta wraz z <b>wszystkimi</b> odpowiedziami!">
										<i class="navi-icon flaticon2-trash"></i>
										<span class="navi-text">Usuń</span>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'news.destroy', $news->id ], 'id' => 'news_destroy_' . $news->id ]) }}{{ Form::close() }}
								</li>
								@endcan
							</ul>
                        </div>
                    </div>
				</div>
			<style>.show-news p { margin-top: 0; margin-bottom: 0; }</style>
			<div>
				<div class="show-news text-dark-75 font-size-lg font-weight-normal">
					{!! $news->content !!}
				</div>
				<div class="d-flex align-items-center pt-4">
					<span class="btn btn-text-primary bg-light-primary btn-sm btn-text-dark-50 rounded font-weight-bolder font-size-sm p-2 pr-4 mr-2">
						@include('svg.reply', ['class' => 'svg-icon-md svg-icon-primary pr-2'])
						{{ $news->replies->count() }}
					</span>
				</div>
				
				@foreach($news->replies as $reply)
					<div class="d-flex py-5">
						<div class="symbol symbol-40 symbol-white mr-5 mt-1">
							<span class="symbol-label" style="background-image:url({{ Storage::url($reply->user->avatar_path ?? 'avatars/default.jpg') }})"></span>
						</div>
						<div class="d-flex flex-column flex-row-fluid">
							<div class="d-flex align-items-center flex-wrap">
								<div class="d-flex">
									<a href="{{ route('users.show', $reply->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-2">{{ $reply->user->full_name }}</a>
								</div>
								<div class="flex-grow-1">
									@include('svg.time', ['class' => 'svg-icon-md svg-icon-primary'])
									<span class="text-muted font-weight-bold" title="{{ $reply->updated_at }}">{{ date('Y-m-d', strtotime($reply->updated_at)) }}</span>
								</div>
								<div style="display: flex;">
									@can('delete', $reply)
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'replies.destroy', $reply->id ] ]) }}
										{{ Form::button('<i class="flaticon2-trash icon-md text-danger" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń odpowiedź"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-clean btn-icon btn-icon-sm'] )  }}
									{{ Form::close() }}
									@endcan
								</div>
							</div>
							<span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $reply->content }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div>
		@auth
			@can('create', App\Models\Reply::class)
				<div class="separator separator-solid mt-5 mb-4"></div>
				{!! Form::open(['route' => 'replies.store', 'method' => 'post', 'class' => 'position-relative']) !!}
					<input type="hidden" id="news_id" name="news_id" value="{{ $news->id }}">
					<input id="content" name="content" class="form-control form-control-sm border-0 p-0 pr-30 resize-none" placeholder="Wpisz treść odpowiedzi...">
					<div class="position-absolute top-0 right-0 mt-n0 mr-n2">
						<input type="submit" value="Odpowiedz" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2 pr-4">
					</div>
				{!! Form::close() !!}
			@endcan
		@endauth
	</div>
</div>