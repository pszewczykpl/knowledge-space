@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $partner->name }}</span>
			</li>
			<li class="breadcrumb-item">
				<span class="text-muted">{{ $partner->code }}</span>
			</li>
		</ul>
@stop

@section('toolbar')
		<a href="{{ route('partners.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
        <a onclick="SharePartners('{{ $partner->id }}')" class="btn btn-light-primary btn-sm ml-1">@include('svg.share', ['class' => 'navi-icon']) Udostępnij</a>
		@can('update', $partner)
			<a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('create', App\Models\Partner::class)
			<a href="{{ route('partners.duplicate', $partner) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.duplicate', ['class' => 'navi-icon']) Duplikuj</a>
		@endcan
		@can('delete', $partner)
			<a onclick='document.getElementById("partners_destroy_{{ $partner->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'partners.destroy', $partner->id ], 'id' => 'partners_destroy_' . $partner->id ]) }}{{ Form::close() }}
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
				<x-cards.details-row --attribute="Utworzone przez" :value="$partner->user->fullname()" />
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

@push('scripts')
<script src="{{ asset('js/pages/partners/show.js') }}" type="text/javascript"></script>
@endpush