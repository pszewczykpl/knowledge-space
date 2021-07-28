@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('funds.index') }}" />
	@can('update', $fund)
		<x-layout.toolbar.button action="edit" href="{{ route('funds.edit', $fund) }}" />
	@endcan
	@can('create', $fund)
		<x-layout.toolbar.button action="duplicate" href="{{ route('funds.duplicate', $fund) }}" />
	@endcan
	@can('delete', $fund)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('funds_destroy_{{ $fund->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'funds.destroy', $fund ], 'id' => 'funds_destroy_' . $fund->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
	<div id="kt_content_container" class="container">
		<div class="d-flex flex-column flex-xl-row">
			<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
			<x-cards.details --title="Szczegóły funduszu" --description="Dane funduszu ubezpieczeniowego">
				<x-cards.details-row --attribute="Nazwa" :value="$fund->name" />
				<x-cards.details-row --attribute="Symbol" :value="$fund->code" />
				<x-cards.details-row --attribute="Typ" :value="$fund->type" />
				<x-cards.details-row --attribute="Waluta" :value="$fund->currency" />
				<x-cards.details-row --attribute="Data udostępnienia" :value="$fund->start_date" />
				@if(isset($fund->cancel_date))
				<x-cards.details-row --attribute="Data likwidacji" :value="$fund->cancel_date" />
				@endif
				@if(isset($fund->cancel_reason))
				<x-cards.details-row --attribute="Powód likwidacji" :value="$fund->cancel_reason" />
				@endif
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
						<x-panels.notes :notes="$fund->notes" -type="fund" :id="$fund->id"  />
					</div>
				</div>

			</div>
		</div>
	</div>
@stop
