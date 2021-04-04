@extends('master')

@section('subheader')
<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
	<div class="d-flex align-items-center flex-wrap mr-2">
		<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">{{ $title }}</h5>
		<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
            <li class="breadcrumb-item">
				<span class="text-muted">{{ substr($risk->name, 0, 50) }}
				@if(substr($risk->name, 0, 50) !== $risk->name)...@endif
				</span>
			</li>
			<li class="breadcrumb-item">
				<span class="text-muted">{{ $risk->code }}</span>
			</li>
		</ul>
	</div>
	<div class="d-flex align-items-center">
		<a href="{{ url()->previous() }}" class="btn btn-md btn-clean btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11" y="5" width="2" height="14" rx="1"/>
						<path d="M3.7071045,15.7071045 C3.3165802,16.0976288 2.68341522,16.0976288 2.29289093,15.7071045 C1.90236664,15.3165802 1.90236664,14.6834152 2.29289093,14.2928909 L8.29289093,8.29289093 C8.67146987,7.914312 9.28105631,7.90106637 9.67572234,8.26284357 L15.6757223,13.7628436 C16.0828413,14.136036 16.1103443,14.7686034 15.7371519,15.1757223 C15.3639594,15.5828413 14.7313921,15.6103443 14.3242731,15.2371519 L9.03007346,10.3841355 L3.7071045,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000001, 11.999997) scale(-1, -1) rotate(90.000000) translate(-9.000001, -11.999997) "/>
					</g>
				</svg>
			</span>
			Powrót
		</a>
        <a onclick="ShareRisks('{{ $risk->id }}')" class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
			<span class="svg-icon navi-icon">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24"></rect>
						<path d="M15.1231569,19.0111815 L7.83785094,14.818972 C8.31992102,14.3336937 8.67836566,13.7254559 8.86199856,13.0454449 L16.0980947,17.246999 C15.6352738,17.7346932 15.2940944,18.3389541 15.1231569,19.0111815 Z M7.75585639,9.10080708 L15.0774983,4.78750147 C15.2169157,5.48579221 15.5381369,6.11848298 15.9897205,6.63413231 L8.86499752,10.9657252 C8.67212677,10.2431476 8.28201274,9.60110795 7.75585639,9.10080708 Z" fill="#000000" fill-rule="nonzero"></path>
						<circle fill="#000000" opacity="0.3" cx="19" cy="4" r="3"></circle>
						<circle fill="#000000" opacity="0.3" cx="19" cy="20" r="3"></circle>
						<circle fill="#000000" opacity="0.3" cx="5" cy="12" r="3"></circle>
					</g>
				</svg>
			</span>
			Udostępnij
		</a>
		@can('update', $risk)
			<a href="{{ route('risks.edit', $risk->id) }}" class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
				<span class="svg-icon navi-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
							<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
						</g>
					</svg>
				</span>
				Edytuj
			</a>
		@endcan
		@can('create', App\Models\Risk::class)
			<a href="{{ route('risks.duplicate', $risk) }}" class="btn btn-md btn-light-primary btn-shadow font-weight-bold ml-1">
				<span class="svg-icon navi-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M15.9956071,6 L9,6 C7.34314575,6 6,7.34314575 6,9 L6,15.9956071 C4.70185442,15.9316381 4,15.1706419 4,13.8181818 L4,6.18181818 C4,4.76751186 4.76751186,4 6.18181818,4 L13.8181818,4 C15.1706419,4 15.9316381,4.70185442 15.9956071,6 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							<path d="M10.1818182,8 L17.8181818,8 C19.2324881,8 20,8.76751186 20,10.1818182 L20,17.8181818 C20,19.2324881 19.2324881,20 17.8181818,20 L10.1818182,20 C8.76751186,20 8,19.2324881 8,17.8181818 L8,10.1818182 C8,8.76751186 8.76751186,8 10.1818182,8 Z" fill="#000000"/>
						</g>
					</svg>
				</span>
				Duplikuj
			</a>
		@endcan
		@can('delete', $risk)
			<a onclick='document.getElementById("risks_destroy_{{ $risk->id }}").submit();' class="btn btn-md btn-light-danger btn-shadow font-weight-bold ml-1">
				<span class="svg-icon navi-icon">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero"/>
							<path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"/>
						</g>
					</svg>
				</span>
				Usuń
			</a>
			{{ Form::open([ 'method'  => 'delete', 'route' => [ 'risks.destroy', $risk->id ], 'id' => 'risks_destroy_' . $risk->id ]) }}{{ Form::close() }}
		@endcan
	</div>
</div>
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
							<x-panels.notes :notes="$risk->get_notes()" -type="risk" :id="$risk->id"  />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('additional_scripts')
<script src="{{ asset('js/pages/risks/show.js') }}" type="text/javascript"></script>
@stop