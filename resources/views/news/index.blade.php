@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	{{-- @can('viewAny', App\Models\Trash::class)
		<x-layout.toolbar.button action="custom" svg="trash" title="Elementy usunięte" color="danger" href="{{ route('trash.index', ['model' => 'news']) }}" />
	@endcan --}}
@stop

@section('content')
	<div id="kt_content_container" class="container">
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
	<script src="{{ asset('js/components/cards/news-store.js') }}" type="text/javascript"></script>
@endpush
