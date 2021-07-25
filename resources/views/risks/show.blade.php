@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('risks.index') }}" />
	@can('update', $risk)
		<x-layout.toolbar.button action="edit" href="{{ route('risks.edit', $risk) }}" />
	@endcan
	@can('create', $risk)
		<x-layout.toolbar.button action="duplicate" href="{{ route('risks.duplicate', $risk) }}" />
	@endcan
	@can('delete', $risk)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('risks_destroy_{{ $risk->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'risks.destroy', $risk ], 'id' => 'risks_destroy_' . $risk->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<x-cards.details --title="Szczegóły ryzyka" --description="Dane ryzyka ubezpieczeniowego">
				<x-cards.details-row --attribute="Nazwa" :value="$risk->name" />
				<x-cards.details-row --attribute="Kod" :value="$risk->code" />
				<x-cards.details-row --attribute="Kategoria" :value="$risk->category" />
				<x-cards.details-row --attribute="Grupa" :value="$risk->group" />
				<x-cards.details-row --attribute="Okres karencji" :value="$risk->grace_period" />
			</x-cards.details>
			<x-cards.details --title="Historia rekordu" --description="Historia edycji rekordu">
				<x-cards.details-row --attribute="Data ostatniej edycji" :value="$risk->updated_at" />
				<x-cards.details-row --attribute="Data utworzenia" :value="$risk->created_at" />
				<x-cards.details-row --attribute="Utworzone przez" :value="$risk->user->full_name" />
			</x-cards.details>
		</div>
		<div class="col-lg-8">
			<div class="card card-custom gutter-b">
				<div class="card-header card-header-tabs-line">
					<div class="card-toolbar">
						<ul class="nav nav-tabs nav-tabs-space-sm nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#notes" role="tab" aria-selected="false">
									<span class="nav-icon mr-2">
										@include('svg.note', ['class' => 'mr-2'])
									</span>
									<span class="nav-text">Notatki</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-body px-0">
					<div class="tab-content pt-2">
						<div class="tab-pane active" id="notes" role="tabpanel">
							<x-panels.notes :notes="$risk->notes" -type="risk" :id="$risk->id"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
@endpush