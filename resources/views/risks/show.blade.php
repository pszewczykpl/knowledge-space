@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ substr($risk->name, 0, 50) }}
				@if(substr($risk->name, 0, 50) !== $risk->name)...@endif
				</span>
			</li>
			<li class="breadcrumb-item">
				<span class="text-muted">{{ $risk->code }}</span>
			</li>
		</ul>
@stop

@section('toolbar')
		<a href="{{ route('risks.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
        <a onclick="ShareRisks('{{ $risk->id }}')" class="btn btn-light-primary btn-sm ml-1">@include('svg.share', ['class' => 'navi-icon']) Udostępnij</a>
		@can('update', $risk)
			<a href="{{ route('risks.edit', $risk->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('create', App\Models\Risk::class)
			<a href="{{ route('risks.duplicate', $risk) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.duplicate', ['class' => 'navi-icon']) Duplikuj</a>
		@endcan
		@can('delete', $risk)
			<a onclick='document.getElementById("risks_destroy_{{ $risk->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'risks.destroy', $risk->id ], 'id' => 'risks_destroy_' . $risk->id ]) }}{{ Form::close() }}
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
				<x-cards.details-row --attribute="Utworzone przez" :value="$risk->user->fullname()" />
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
							<x-panels.notes :notes="$risk->get_cached_relation('notes')" -type="risk" :id="$risk->id"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/risks/show.js') }}" type="text/javascript"></script>
@endpush