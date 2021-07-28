@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="cancel" href="{{ route('news.show', $news) }}" />
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-10">
					<x-cards.news-update :news="$news" />
				</div>
				<div class="col-2">
					<div class="card card-custom" style="background-color: #1B283F;">
						<div class="card-body" style="padding: 1.5rem !important;">
							<div class="p-0">
								<h3 class="text-white font-weight-bolder my-4 text-center">Bądź na bieżąco</h3>
								<p class="text-muted font-size-lg mb-7 text-center">
								Dzięki zakładce Aktualności jesteś na bieżąco z najważniejszymi informacjami!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/components/cards/news-store.js') }}" type="text/javascript"></script>
@endpush