@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('risks.index') }}" />
	@can('update', $risk)
		<x-layout.toolbar.button action="edit" href="{{ route('risks.edit', $risk) }}" />
	@endcan
	@can('delete', $risk)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('risks_destroy_{{ $risk->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'risks.destroy', $risk ], 'id' => 'risks_destroy_' . $risk->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
	<div id="kt_content_container" class="container">
		<div class="d-flex flex-column flex-xl-row">
			<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
				<x-cards.details --title="Szczegóły ryzyka" --description="Dane ryzyka ubezpieczeniowego">
					<x-cards.details-row --attribute="Nazwa" :value="$risk->name" />
					<x-cards.details-row --attribute="Kod" :value="$risk->code" />
					<x-cards.details-row --attribute="Kategoria" :value="$risk->category" />
					<x-cards.details-row --attribute="Grupa" :value="$risk->group" />
					<x-cards.details-row --attribute="Okres karencji" :value="$risk->grace_period" />
				</x-cards.details>
			</div>
			<div class="flex-lg-row-fluid ms-lg-15">
				<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#info" id="info_tab">Podsumowanie</a>
					</li>
				</ul>

				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="info" role="tabpanel">
						<x-panels.notes :notes="$risk->notes" -type="risk" :id="$risk->id"  />
					</div>
				</div>

			</div>
		</div>
	</div>
@stop