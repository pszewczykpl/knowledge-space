@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('bancassurances.index') }}" />
	@can('update', $bancassurance)
		<x-layout.toolbar.button action="edit" href="{{ route('bancassurances.edit', $bancassurance) }}" />
	@endcan
	@can('create', $bancassurance)
		<x-layout.toolbar.button action="duplicate" href="{{ route('bancassurances.duplicate', $bancassurance) }}" />
	@endcan
	@can('delete', $bancassurance)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('bancassurances_destroy_{{ $bancassurance->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'bancassurances.destroy', $bancassurance ], 'id' => 'bancassurances_destroy_' . $bancassurance->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
	<div id="kt_content_container" class="container">
		<div class="d-flex flex-column flex-xl-row">
			<div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
				<x-cards.details --title="Szczegóły ubezpieczenia" --description="Dane ubezpieczenia bancassurance">
					<x-cards.details-row --attribute="Nazwa produktu" :value="$bancassurance->name" />
					<x-cards.details-row --attribute="Kod produktu" :value="$bancassurance->code" />
					<x-cards.details-row --attribute="Kod OWU" :value="$bancassurance->code_owu" />
					<x-cards.details-row --attribute="Dystrybutor" :value="$bancassurance->dist" />
					<x-cards.details-row --attribute="Kod dystrybutora" :value="$bancassurance->dist_short" />
				</x-cards.details>
			</div>
			<div class="flex-lg-row-fluid ms-lg-15">
				<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#info" id="info_tab">Podsumowanie</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#files" id="files_tab">Dokumenty</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show" id="info" role="tabpanel">
						<x-panels.notes :notes="$bancassurance->notes" -type="bancassurance" :id="$bancassurance->id"  />
					</div>
					<div class="tab-pane fade show active" id="files" role="tabpanel">
						<x-panels.files :model="$bancassurance" />
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@push('scripts')
	<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/components/panels/files.js') }}" type="text/javascript"></script>
@endpush