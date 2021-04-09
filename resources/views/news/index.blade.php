@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	</div>
</div>
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-row">
		<div class="flex-row-fluid">
			<div class="row">
				<div class="col-8">
						<x-cards.news-store />
					@foreach($news as $new)
						<x-cards.news :news="$new" />
					@endforeach
					<div class="row justify-content-center">
						<div class="col-2">
							{{ $news->links() }}
						</div>
					</div>
				</div>
				<div class="col-4">
					<x-cards.top-events />
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/news/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/cards/news-store.js') }}" type="text/javascript"></script>
@stop
