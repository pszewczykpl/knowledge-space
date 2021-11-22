@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('investments.index') }}" />
	@can('update', $investment)
		<x-layout.toolbar.button action="edit" href="{{ route('investments.edit', $investment) }}" />
	@endcan
	@can('create', $investment)
		<x-layout.toolbar.button action="duplicate" href="{{ route('investments.duplicate', $investment) }}" />
	@endcan
	@can('delete', $investment)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('investments_destroy_{{ $investment->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'investments.destroy', $investment ], 'id' => 'investments_destroy_' . $investment->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
	<div id="kt_content_container" class="container">
		<div class="d-flex flex-column flex-xl-row">
			<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
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
			</div>
			<div class="flex-lg-row-fluid ms-lg-15">
					<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#info" id="info_tab">Podsumowanie</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#files" id="files_tab">Dokumenty</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#funds" id="funds_tab">Fundusze</a>
						</li>
					</ul>

				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show" id="info" role="tabpanel">
						<x-panels.notes :notes="$investment->notes" -type="investment" :id="$investment->id"  />

						<x-panels.archive-data>
							<x-slot name="header">
								<th class="min-w-250px">Nazwa produktu</th>
								<th class="min-w-150px">Kod TOiL</th>
								<th class="min-w-150px">Kod produktu</th>
								<th class="min-w-150px">Data aktualizacji</th>
								<th class="min-w-100px"></th>
							</x-slot>
							<x-slot name="data">
								@foreach($archive_investments as $archive_investment)
									<tr class="@if($archive_investment->id == $investment->id) bg-light @endif">
										<td>{{ $archive_investment->name }}</td>
										<td>{{ $archive_investment->code_toil }}</td>
										<td>{{ $archive_investment->code }}</td>
										<td>{{ $archive_investment->edit_date }}</td>
										<td>@if($archive_investment->id != $investment->id) <a href="{{ route('investments.show', $archive_investment->id) }}" class="btn btn-light btn-sm card-rounded" title="Wyświetl">Wyświetl</a> @endif</td>
									</tr>
								@endforeach
							</x-slot>
						</x-panels.archive-data>

					</div>
					<div class="tab-pane fade show active" id="files" role="tabpanel">

						<x-panels.files :model="$investment" />

					</div>
					<div class="tab-pane fade show" id="funds" role="tabpanel">

						{{-- <x-panels.funds :investmentid="$investment->id" /> --}}

					</div>
				</div>

			</div>
		</div>
	</div>
@stop