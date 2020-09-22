@can('view', $news)
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div>
			<div class="d-flex align-items-center pb-4">
				<div class="symbol symbol-40 symbol-white mr-5">
					<span class="symbol-label" style="background-image:url('{{ asset('storage/avatars/') }}/{{ $news->user->avatar_filename }}')"></span>
				</div>
				<div class="d-flex flex-column flex-grow-1">
					<a href="{{ route('users.show', $news->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $news->user->first_name }} {{ $news->user->last_name }}</a>
					<div class="d-flex">
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
							<a href="{{ route('news.show', $news->id) }}" class="text-muted font-weight-bold" title="{{ $news->created_at }}">{{ date('Y-m-d', strtotime($news->created_at)) }}</a>
						</div>
						<div class="d-flex align-items-center">
							<span class="svg-icon svg-icon-md svg-icon-primary pr-1">
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24"></rect>
										<path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"></path>
										<path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"></path>
									</g>
								</svg>
							</span>
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
								@can('view', $news)
								<li class="navi-item">
									<a href="{{ route('news.show', $news->id) }}" class="navi-link">
										<i class="navi-icon flaticon2-expand"></i>
										<span class="navi-text">Wyświetl</span>
									</a>
								</li>
								@endcan
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
					<span class="btn btn-text-primary btn-icon-primary btn-sm btn-text-dark-50 bg-light-primary rounded font-weight-bolder font-size-sm p-2 pr-4 mr-2">
					<span class="svg-icon svg-icon-md svg-icon-primary pr-2">
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24" />
								<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000" />
								<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3" />
							</g>
						</svg>
					</span>{{ $news->replies->count() }}</span>
				</div>
				
				@foreach($news->replies as $reply)
					<div class="d-flex py-5">
						<div class="symbol symbol-40 symbol-white mr-5 mt-1">
							<span class="symbol-label" style="background-image:url('{{ asset('storage/avatars/') }}/{{ $reply->user->avatar_filename }}')"></span>
						</div>
						<div class="d-flex flex-column flex-row-fluid">
							<div class="d-flex align-items-center flex-wrap">
								<a href="{{ route('users.show', $reply->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder pr-6">{{ $reply->user->first_name }} {{ $reply->user->last_name }}</a>
								<span class="text-muted font-weight-normal flex-grow-1 font-size-sm">{{ $reply->created_at }}</span>
								<span class="text-muted font-weight-normal font-size-sm">Odpowiedź</span>
							</div>
							<span class="text-dark-75 font-size-sm font-weight-normal pt-1">{{ $reply->content }}</span>
						</div>
					</div>
				@endforeach
			</div>
		</div>
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
	</div>
</div>
@endcan