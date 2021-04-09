@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('news.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('update', $news)
			<a href="{{ route('news.edit', $news->id) }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('delete', $news)
			<a onclick='document.getElementById("news_destroy_{{ $news->id }}").submit();' class="btn btn-light-danger btn-sm">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'news.destroy', $news->id ], 'id' => 'news_destroy_' . $news->id ]) }}{{ Form::close() }}
		@endcan
	</div>
</div>
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

@section('additional_scripts')
<script src="{{ asset('js/pages/news/index.js') }}" type="text/javascript"></script>
@stop
