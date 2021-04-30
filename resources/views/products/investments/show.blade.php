@extends('layouts.app')

@section('subheader')
	<x-layout.subheader :description="$investment->extended_name" />
@stop

@section('toolbar')
	<a href="{{ route('investments.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
	<a onclick="ShareInvestments('{{ $investment->id }}')" class="btn btn-light-primary btn-sm ml-1">@include('svg.share', ['class' => 'navi-icon']) Udostępnij</a>
	@can('update', $investment)
		<a href="{{ route('investments.edit', $investment->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
	@endcan
	@can('create', App\Models\Investment::class)
		<a href="{{ route('investments.duplicate', $investment) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.duplicate', ['class' => 'navi-icon']) Duplikuj</a>
	@endcan
	@can('delete', $investment)
		<a onclick='document.getElementById("investments_destroy_{{ $investment->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'investments.destroy', $investment->id ], 'id' => 'investments_destroy_' . $investment->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<x-cards.details --title="Szczegóły ubezpieczenia" --description="Dane ubezpieczenia inwestycyjnego">
				<x-cards.details-row --attribute="Nazwa produktu" :value="$investment->name" />
				<x-cards.details-row --attribute="Kod produktu" :value="$investment->code" />
				<x-cards.details-row --attribute="Kod OWU" :value="$investment->code_owu" />
				<x-cards.details-row --attribute="Kod TOiL" :value="$investment->code_toil" />
				<x-cards.details-row --attribute="Grupa produktowa" :value="$investment->group" />
				<x-cards.details-row --attribute="Dystrybutor" :value="$investment->dist" />
				<x-cards.details-row --attribute="Kod dystrybutora" :value="$investment->dist_short" />
				<x-cards.details-row --attribute="Typ produktu" :value="$investment->type" />
			</x-cards.details>
			<x-cards.details --title="Historia rekordu" --description="Historia edycji rekordu">
				<x-cards.details-row --attribute="Data ostatniej edycji" :value="$investment->updated_at" />
				<x-cards.details-row --attribute="Data utworzenia" :value="$investment->created_at" />
				<x-cards.details-row --attribute="Utworzone przez" :value="$investment->user->full_name" />
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
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#funds" role="tab" aria-selected="true">
									<span class="nav-icon mr-2">
										@include('svg.fund', ['class' => 'mr-2'])
									</span>
									<span class="nav-text">Fundusze</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-body px-0">
					<div class="tab-content pt-2">
						<div class="tab-pane " id="notes" role="tabpanel">
							<x-panels.notes :notes="$investment->notes" -type="investment" :id="$investment->id"  />
						</div>
						<div class="tab-pane active" id="files" role="tabpanel">
							@if($investment->status == 'Archiwalny')<x-cards.archive-files />@endif
							<x-panels.files :model="$investment" />
						</div>
						<div class="tab-pane" id="funds" role="tabpanel">
							<x-panels.funds :investmentid="$investment->id" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('css')
	<link href="{{ asset('css/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
	<script src="{{ asset('js/datatables.bundle.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/pages/products/investments/show.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/components/panels/files.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/components/panels/funds.js') }}" type="text/javascript"></script>
@endpush