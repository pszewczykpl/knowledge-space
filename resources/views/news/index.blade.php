@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
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
						<!-- To add -->
					</div>
				</div>
			</div>
		</div>
	</div>
@stop