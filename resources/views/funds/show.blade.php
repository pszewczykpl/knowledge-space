@extends('layouts.app')

@section('subheader')
	<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm ml-3">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ substr($fund->name, 0, 50) }}
				@if(substr($fund->name, 0, 50) !== $fund->name)...@endif
				</span>
			</li>
			<li class="breadcrumb-item">
				<span class="text-muted">{{ $fund->code }}</span>
			</li>
		</ul>
@stop

@section('toolbar')
		<a href="{{ route('funds.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
        <a onclick="ShareFunds('{{ $fund->id }}')" class="btn btn-light-primary btn-sm ml-1">@include('svg.share', ['class' => 'navi-icon']) Udostępnij</a>
		@can('update', $fund)
			<a href="{{ route('funds.edit', $fund->id) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('create', App\Models\Fund::class)
			<a href="{{ route('funds.duplicate', $fund) }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.duplicate', ['class' => 'navi-icon']) Duplikuj</a>
		@endcan
		@can('delete', $fund)
			<a onclick='document.getElementById("funds_destroy_{{ $fund->id }}").submit();' class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'funds.destroy', $fund->id ], 'id' => 'funds_destroy_' . $fund->id ]) }}{{ Form::close() }}
		@endcan
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-4">
			<div class="card card-custom gutter-b">
				<div class="card-header h-auto py-sm-0 border-0">
					@if($fund->status == 'N')
					<div class="card-title">
						<h3 class="card-label text-danger font-weight-bold"><b>Fundusz Archiwalny</b></h3>
					</div>
					<div class="card-toolbar">
						<span class="label font-weight-bold label label-inline label-light-danger">Ważne</span>
					</div>
					@else
					<div class="card-title">
						<h3 class="card-label text-success font-weight-bold"><b>Fundusz aktywny</b></h3>
					</div>
					@endif
				</div>
				<div class="card-body pt-0 pb-6">
					<p class="text-dark-50">
					@if($fund->status == 'N')
					<span class="font-weight-bold">Pamiętaj!</span> Wybrany fundusz jest nieaktywny.
					@else
					Wybrany fundusz jest aktywny.
					@endif
					</p>
				</div>
			</div>
			<x-cards.details --title="Szczegóły funduszu" --description="Dane funduszu ubezpieczeniowego">
				<x-cards.details-row --attribute="Nazwa" :value="$fund->name" />
				<x-cards.details-row --attribute="Symbol" :value="$fund->code" />
				<x-cards.details-row --attribute="Rodzaj" :value="$fund->type" />
				<x-cards.details-row --attribute="Waluta" :value="$fund->currency" />
				<x-cards.details-row --attribute="Data udostępnienia" :value="$fund->start_date" />
				@if(isset($fund->cancel_date))
				<x-cards.details-row --attribute="Data likwidacji" :value="$fund->cancel_date" />
				@endif
				@if(isset($fund->cancel_reason))
				<x-cards.details-row --attribute="Powód likwidacji" :value="$fund->cancel_reason" />
				@endif
			</x-cards.details>
			<x-cards.details --title="Historia rekordu" --description="Historia edycji rekordu">
				<x-cards.details-row --attribute="Data ostatniej edycji" :value="$fund->updated_at" />
				<x-cards.details-row --attribute="Data utworzenia" :value="$fund->created_at" />
				<x-cards.details-row --attribute="Utworzone przez" :value="$fund->user->full_name" />
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
							<x-panels.notes :notes="$fund->notes" -type="fund" :id="$fund->id"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/pages/funds/show.js') }}" type="text/javascript"></script>
@endpush
