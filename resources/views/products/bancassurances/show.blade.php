@extends('layouts.app')

@section('subheader')
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $bancassurance->code_owu }}</span>
			</li>
			<li class="breadcrumb-item">
				<span class="text-muted">{{ $bancassurance->edit_date }}</span>
			</li>
		</ul>
@stop

@section('toolbar')
		<a href="{{ route('bancassurances.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		<a onclick="ShareBancassurances('{{ $bancassurance->id }}')" class="btn btn-light-primary btn-sm ml-1">@include('svg.share', ['class' => 'navi-icon']) Udostępnij</a>
		@can('update', $bancassurance)
			<a href="{{ route('bancassurances.edit', $bancassurance->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('create', App\Models\Bancassurance::class)
			<a href="{{ route('bancassurances.duplicate', $bancassurance) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.duplicate', ['class' => 'navi-icon']) Duplikuj</a>
		@endcan
		@can('delete', $bancassurance)
			<a onclick='document.getElementById("bancassurances_destroy_{{ $bancassurance->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'bancassurances.destroy', $bancassurance->id ], 'id' => 'bancassurances_destroy_' . $bancassurance->id ]) }}{{ Form::close() }}
		@endcan
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<div class="card card-custom gutter-b">
				<div class="card-header h-auto py-sm-0 border-0">
					@if($bancassurance->status == 'N')
					<div class="card-title">
						<h3 class="card-label text-danger font-weight-bold"><b>Dokumenty Archiwalne</b></h3>
					</div>
					<div class="card-toolbar">
						<span class="label font-weight-bold label label-inline label-light-danger">Ważne</span>
					</div>
					@else
					<div class="card-title">
						<h3 class="card-label text-success font-weight-bold"><b>Dokumenty aktualne</b></h3>
					</div>
					@endif
				</div>
				<div class="card-body pt-0 pb-6">
					<p class="text-dark-50">
					@if($bancassurance->status == 'N')
					<span class="font-weight-bold">Pamiętaj!</span> Dla wybranego prdouktu istnieje nowszy komplet dokumentów.
					@else
					To najnowszy komplet dokumentów dla wybranego produktu.
					@endif
					</p>
				</div>
			</div>
			<x-cards.details --title="Szczegóły ubezpieczenia" --description="Dane ubezpieczenia bancassurance">
				<x-cards.details-row --attribute="Nazwa produktu" :value="$bancassurance->name" />
				<x-cards.details-row --attribute="Kod produktu" :value="$bancassurance->code" />
				<x-cards.details-row --attribute="Kod OWU" :value="$bancassurance->code_owu" />
				<x-cards.details-row --attribute="Dystrybutor" :value="$bancassurance->dist" />
				<x-cards.details-row --attribute="Kod dystrybutora" :value="$bancassurance->dist_short" />
				<x-cards.details-row --attribute="Numer subskrypcji" :value="$bancassurance->subscription" />
			</x-cards.details>
			<x-cards.details --title="Historia rekordu" --description="Historia edycji rekordu">
				<x-cards.details-row --attribute="Data ostatniej edycji" :value="$bancassurance->updated_at" />
				<x-cards.details-row --attribute="Data utworzenia" :value="$bancassurance->created_at" />
				<x-cards.details-row --attribute="Utworzone przez" :value="$bancassurance->user->fullname()" />
			</x-cards.details>
		</div>
		<div class="col-lg-8">
			<div class="card card-custom gutter-b">
				<div class="card-header card-header-tabs-line">
					<div class="card-toolbar">
						<ul class="nav nav-tabs nav-tabs-space-sm nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#notes" role="tab" aria-selected="false">
									<span class="nav-icon mr-2">
										@include('svg.note', ['class' => 'mr-2'])
									</span>
									<span class="nav-text">Notatki</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#files" role="tab" aria-selected="true">
									<span class="nav-icon mr-2">
										@include('svg.file', ['class' => 'mr-2'])
									</span>
									<span class="nav-text">Dokumenty</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-body px-0">
					<div class="tab-content pt-2">
						<div class="tab-pane " id="notes" role="tabpanel">
							<x-panels.notes :notes="$bancassurance->notes" -type="bancassurance" :id="$bancassurance->id"  />
						</div>
						<div class="tab-pane active" id="files" role="tabpanel">
							<x-panels.files :files="$bancassurance->files" :name="$bancassurance->extended_name()" -type="bancassurance" :id="$bancassurance->id" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/products/bancassurances/show.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/components/panels/files.js') }}" type="text/javascript"></script>
@endpush