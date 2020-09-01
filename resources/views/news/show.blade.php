@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">

		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
		
	</div>
	<div class="d-flex align-items-center">

		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-arrow-left"></i>Powrót
		</a>

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
						<div class="card-body">
							<div>
								<div class="d-flex align-items-center pb-4">
									<div class="symbol symbol-40 symbol-light-success mr-5">
										<span class="symbol-label" style="background-image:url('{{ asset('storage/uploads/avatars/') }}/{{ $news->user->avatar_filename }}')"></span>
									</div>
									<div class="d-flex flex-column flex-grow-1">
										<a href="{{ route('users.show', $news->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $news->user->first_name }} {{ $news->user->last_name }}</a>
										<a href="{{ route('news.show', $news->id) }}" class="text-muted font-weight-bold">{{ $news->created_at }}</a>
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
											<div class="symbol symbol-40 symbol-light-success mr-5 mt-1">
												<span class="symbol-label" style="background-image:url('{{ asset('storage/uploads/avatars/') }}/{{ $reply->user->avatar_filename }}')"></span>
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

							@auth
							<div class="separator separator-solid mt-5 mb-4"></div>
							{!! Form::open(['route' => 'replies.store', 'method' => 'post', 'class' => 'position-relative']) !!}
								<input type="hidden" id="news_id" name="news_id" value="{{ $news->id }}">
								<input id="content" name="content" class="form-control form-control-sm border-0 p-0 pr-10 resize-none" placeholder="Wpisz treść odpowiedzi...">
								<div class="position-absolute top-0 right-0 mt-n0 mr-n2">
									<input type="submit" value="Odpowiedz" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2 pr-4">
								</div>
							{!! Form::close() !!}
							@endauth

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/news/index.js') }}" type="text/javascript"></script>
@stop
