@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ $partner->name }}</span>
			</li>
			<li class="breadcrumb-item">
				<span class="text-muted">{{ $partner->code }}</span>
			</li>
		</ul>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ route('partners.index') }}" class="btn btn-clean btn-sm mr-1">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
        <a onclick="SharePartners('{{ $partner->id }}')" class="btn btn-light-primary btn-sm mr-1">@include('svg.share', ['class' => 'navi-icon']) Udostępnij</a>
		@can('update', $partner)
			<a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.edit', ['class' => 'navi-icon']) Edytuj</a>
		@endcan
		@can('create', App\Models\Partner::class)
			<a href="{{ route('partners.duplicate', $partner) }}" class="btn btn-light-primary btn-sm mr-1">@include('svg.duplicate', ['class' => 'navi-icon']) Duplikuj</a>
		@endcan
		@can('delete', $partner)
			<a onclick='document.getElementById("partners_destroy_{{ $partner->id }}").submit();' class="btn btn-light-danger btn-sm">@include('svg.trash', ['class' => 'navi-icon']) Usuń</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'partners.destroy', $partner->id ], 'id' => 'partners_destroy_' . $partner->id ]) }}{{ Form::close() }}
		@endcan
	</div>
</div>
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
										<span class="svg-icon mr-2">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z" fill="#000000"/>
													<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z" fill="#000000" opacity="0.3"/>
												</g>
											</svg>
										</span>
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
							<x-panels.notes :notes="$partner->get_notes()" -type="partner" :id="$partner->id"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/partners/show.js') }}" type="text/javascript"></script>
@stop