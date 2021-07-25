@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('partners.index') }}" />
	@can('update', $partner)
		<x-layout.toolbar.button action="edit" href="{{ route('partners.edit', $partner) }}" />
	@endcan
	@can('create', $partner)
		<x-layout.toolbar.button action="duplicate" href="{{ route('partners.duplicate', $partner) }}" />
	@endcan
	@can('delete', $partner)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('partners_destroy_{{ $partner->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'partners.destroy', $partner ], 'id' => 'partners_destroy_' . $partner->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<x-cards.details --title="Szczegóły partnera" --description="Dane partnera Towarzysta Ubezpieczeń">
				<x-cards.details-row --attribute="Nazwa" :value="$partner->name" />
				<x-cards.details-row --attribute="Kod" :value="$partner->code" />
				@if(isset($partner->type))
				<x-cards.details-row --attribute="Typ" :value="$partner->type" />
				@endif
				<x-cards.details-row --attribute="NIP" :value="$partner->nip" />
				<x-cards.details-row --attribute="REGON" :value="$partner->regon" />
				<x-cards.details-row --attribute="Numer RAU" :value="$partner->number_rau" />
			</x-cards.details>
			<x-cards.details --title="Historia rekordu" --description="Historia edycji rekordu">
				<x-cards.details-row --attribute="Data ostatniej edycji" :value="$partner->updated_at" />
				<x-cards.details-row --attribute="Data utworzenia" :value="$partner->created_at" />
				<x-cards.details-row --attribute="Utworzone przez" :value="$partner->user->full_name" />
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
							<x-panels.notes :notes="$partner->notes" -type="partner" :id="$partner->id"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop