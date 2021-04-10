@extends('layouts.app')

@section('subheader')
	<x-datatables.search-box-global />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
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

@push('scripts')
<script src="{{ asset('js/pages/news/index.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/cards/news-store.js') }}" type="text/javascript"></script>
@endpush
