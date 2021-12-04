<div class="card mb-5 mb-xl-8 card-rounded card-shadow">
	<div class="card-body pb-0">
		<div class="d-flex align-items-center mb-5">
			<div class="d-flex align-items-center flex-grow-1">
				<a href="{{ route('users.show', $news->user->id) }}">
					<div class="symbol symbol-45px me-5">
						<img src="{{ Storage::url($news->user->avatar_path ?? 'avatars/default.jpg') }}" class="card-rounded">
					</div>
				</a>
				<div class="d-flex flex-column">
					<a href="{{ route('users.show', $news->user->id) }}" class="text-gray-800 text-hover-primary fs-6 fw-bolder">{{ $news->user->full_name }}</a>
					<span class="text-gray-400 fw-bold">{{ date('Y-m-d', strtotime($news->updated_at)) }}</span>
				</div>
			</div>
			<div class="my-0">
				<button type="button" class="btn btn-sm btn-icon btn-active-light card-rounded" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
					<span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
								<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
								<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
								<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
							</g>
						</svg>
					</span>
				</button>
				<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3 card-rounded" data-kt-menu="true">
					<div class="menu-item px-3 my-1">
						<a href="{{ route('news.show', $news->id) }}" class="menu-link card-rounded px-3">{{ __('View') }}</a>
					</div>
					@can('update', $news)
						<div class="menu-item px-3 my-1">
							<a href="{{ route('news.edit', $news->id) }}" class="menu-link px-3 card-rounded">Edytuj</a>
						</div>
					@endcan
					@can('delete', $news)
						<div class="menu-item px-3 my-1">
							<a onclick='document.getElementById("news_destroy_{{ $news->id }}").submit();' class="menu-link px-3 card-rounded">Usuń</a>
							{{ Form::open([ 'method'  => 'delete', 'route' => [ 'news.destroy', $news->id ], 'id' => 'news_destroy_' . $news->id ]) }}{{ Form::close() }}
						</div>
					@endcan
				</div>
			</div>
		</div>
		<div class="mb-7">
			<div class="text-gray-800 fw-normal show-news mb-5 fs-6">
				{!! $news->content !!}
			</div>
			<div class="d-flex align-items-center mb-5">
				<span class="btn btn-sm btn-light btn-color-muted px-4 py-2 me-4 card-rounded">
					@include('svg.reply', ['class' => 'svg-icon svg-icon-3'])
					{{ $news->replies->count() }}
				</span>
			</div>
		</div>
		<div class="mb-7 ps-10">
			
			@foreach($news->replies as $reply)
				<div class="d-flex mb-5">
					<div class="symbol symbol-45px me-5">
						<img src="{{ Storage::url($reply->user->avatar_path ?? 'avatars/default.jpg') }}" class="card-rounded">
					</div>
					<div class="d-flex flex-column flex-row-fluid">
						<div class="d-flex align-items-center flex-wrap mb-1">
							<a href="{{ route('users.show', $reply->user->id) }}" class="text-gray-800 text-hover-primary fw-bolder me-2">{{ $reply->user->full_name }}</a>
							<span class="text-gray-400 fw-bold fs-7" title="{{ $reply->updated_at }}">{{ date('Y-m-d', strtotime($reply->updated_at)) }}</span>
							@can('delete', $reply)
								<a onclick='document.getElementById("reply_destroy_{{ $reply->id }}").submit();' class="ms-auto text-gray-400 text-hover-danger fw-bold fs-7" style="cursor: pointer">Usuń</a>
								{{ Form::open([ 'method'  => 'delete', 'route' => [ 'replies.destroy', $reply->id ], 'id' => 'reply_destroy_' . $reply->id ]) }}{{ Form::close() }}
							@endcan
						</div>
						<span class="text-gray-800 fs-6 fw-normal pt-1">{{ $reply->content }}</span>
					</div>
				</div>
			@endforeach

		</div>

		@auth
			@can('create', App\Models\Reply::class)
				<div class="separator mb-4"></div>
				{!! Form::open(['route' => 'replies.store', 'method' => 'post', 'class' => 'position-relative mb-6']) !!}
					<input type="hidden" id="news_id" name="news_id" value="{{ $news->id }}">
					<input id="content" name="content" class="form-control border-0 p-0 pe-10 resize-none min-h-25px text-gray-800 fw-normal fs-6" placeholder="Odpowiedź...">
					<div class="position-absolute top-0 end-0">
						<input type="submit" value="Odpowiedz" class="btn btn-sm btn-active-color-primary pe-0 me-2">
					</div>
				{!! Form::close() !!}
			@endcan
		@endauth
	
	</div>
</div>