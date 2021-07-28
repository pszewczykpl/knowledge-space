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
	<div id="kt_content_container" class="container">
		<div class="d-flex flex-column flex-xl-row">
			<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
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
			</div>
			<div class="flex-lg-row-fluid ms-lg-15">
				<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#info" id="info_tab">Podsumowanie</a>
					</li>
				</ul>

				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="info" role="tabpanel">
						<x-panels.notes :notes="$partner->notes" -type="partner" :id="$partner->id"  />
					</div>
				</div>

			</div>
		</div>
	</div>
@stop