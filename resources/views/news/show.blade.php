@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
		<li class="breadcrumb-item">
			<span class="text-muted">Przeglądaj</span>
		</li>
	</ul>
@stop

@section('toolbar')
		<a href="{{ route('news.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $news)
			<a href="{{ route('news.edit', $news->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $news)
			<a onclick='document.getElementById("news_destroy_{{ $news->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'news.destroy', $news->id ], 'id' => 'news_destroy_' . $news->id ]) }}{{ Form::close() }}
		@endcan
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-10">
					<x-cards.news :news="$news" />
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
<script src="{{ asset('js/pages/news/index.js') }}" type="text/javascript"></script>
@endpush
