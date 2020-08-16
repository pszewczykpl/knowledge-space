@extends('master')

@section('subheader')
<x-layout.subheader :title="$title" >
    <x-slot name="main">
        <x-global-search-box />

		{{-- <!-- Only active/All records buttons -->
		<div>
			<button type="button" class="btn btn-success btn-sm" id="active">Pokaż tylko Aktualne</button>
			<button type="button" class="btn btn-brand btn-sm" id="non-active" style="display: none;">Pokaż Wszystkie</button>
		</div>
		<!-- End: Only active/All records buttons --> --}}
    </x-slot>

    <x-slot name="toolbar">
		<!-- Preview button -->
		<a href="{{ url()->previous() }}" class="btn btn-clean btn-icon-sm">
			<i class="la la-long-arrow-left"></i>Powrót
		</a>
		<!-- End: Preview button -->
		
		<!-- New elements button (not for guest) -->
		@auth
		<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Akcje" data-placement="left">
			<a class="btn btn-brand btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="flaticon2-plus"></i>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<ul class="kt-nav">
					<li class="kt-nav__section kt-nav__section--first">
						<span class="kt-nav__section-text">Dodaj nowy:</span>
					</li>
					
					{{-- <li class="kt-nav__item">
						<a href="{{ route('funds.create') }}" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon2-layers-2"></i>
							<span class="kt-nav__link-text">Komplet</span>
						</a>
					</li> --}}
					<li class="kt-nav__item">
						<a href="{{ route('files.create') }}" class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon2-file-2"></i>
							<span class="kt-nav__link-text">Dokument</span>
						</a>
					</li>
					<li class="kt-nav__item">
						<a class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon2-chat-1"></i>
							<span class="kt-nav__link-text">Komentarz</span>
						</a>
					</li>
					<div class="dropdown-divider"></div>
					<li class="kt-nav__item">
						<a class="kt-nav__link">
							<i class="kt-nav__link-icon flaticon2-console"></i>
							<span class="kt-nav__link-text">Ustawienia</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
		@endauth
		<!-- End: New elements button (not for guest) -->
	</x-slot>
</x-layout.subheader >
@stop

@section('content')
<div class="row">

	<!-- Tips for newbie -->
	@guest
	<div class="alert alert-light alert-elevate fade show col-12" role="alert">
		<div class="alert-icon">
			<i class="flaticon-info kt-font-brand"></i>
		</div>
		<div class="alert-text">
		    Poniżej przedstawiono wszystkie dostępne fundusze.
		</div>
		<div class="alert-close">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true"><i class="la la-close"></i></span>
			</button>
		</div>
	</div>
	@endguest
	<!-- End: Tips for newbie -->

	<div class="kt-portlet kt-portlet--mobile">
		<div class="kt-section__content">
			<div class="kt-portlet__body">
				<form class="form">
					<div class="row">
						<x-advanced-search-box placeholder="Symbol" column="0" />
						<x-advanced-search-box placeholder="Nazwa" column="1" />
						<x-advanced-search-box placeholder="Typ" column="2" />
						<x-advanced-search-box placeholder="Waluta" column="3" />
						<x-advanced-search-box placeholder="Data startu" column="4" />
                        
						<div id="filter_col5" data-column="5" style="display: none;">
							<input class="column_filter" type="text" id="col5_filter">
						</div>
					</div>
				</form>
				<div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>
				<div id="datatable"></div>
				<script>
				// Definicja tabeli
				var input = {
					id: "datatable",
					datatable:
					[
						{
							data: 'code',
							visible: true,
							orderable: true,
							searchable: true,
							title: "Symbol"
						},{
							data: 'name',
							visible: true,
							orderable: true,
							searchable: true,
							title: "Nazwa"
						},{
							data: 'type',
							visible: true,
							orderable: true,
							searchable: true,
							title: "Typ",
							render: function(data) {
								if(data=='D') {
									return '<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-primary">Depozytowy</span>';
								}
								else if(data=='Z') {
									return '<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-primary">Inwestycyjny</span>';
								}
								else if(data=='M') {
									return '<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-primary">Modelowy</span>';
								}
								else if(data=='U') {
									return '<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-primary">UFK</span>';
								}
								else if(data=='S') {
									return '<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-primary">SOK</span>';
								}
								else if(data=='T') {
									return '<span class="kt-badge kt-badge--primary kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-primary">Tracker</span>';
								}
								else {
									return data;
								}
							}
						},{
							data: 'currency',
							visible: true,
							orderable: true,
							searchable: true,
							title: "Waluta"
						},{
							data: 'start_date',
							visible: true,
							orderable: true,
							searchable: true,
							title: "Data startu"
						},{
							data: 'status',
							visible: true,
							orderable: false,
							searchable: true,
							title: "Status",
							render: function (data, type, row) {
								if(data=='N') {
									return '<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">Nieaktywny</span>';
								}
								else if(data=='A') {
									return '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded">Aktywny</span>';
								}
							}
						/*}, {
							data: 'actions',
							visible: true,
							orderable: false,
							searchable: false,
							title: "Akcje",
							render: function (data, type, full, row) {
                                return '' +
									'<span class="dropdown">' +
										'<button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Więcej" data-toggle="dropdown">' +
											'<i class="flaticon-more-1"></i>' +
										'</button>' +
										'<div class="dropdown-menu dropdown-menu-right">' +
											'<ul class="kt-nav">' +
												// Share product
												'<li class="kt-nav__item">' +
													'<a class="kt-nav__link" onclick="CopyView('+full.id+')"><i class="kt-nav__link-icon flaticon2-reply-1"></i><span class="kt-nav__link-text">Udostępnij</span></a>' +
												'</li>' +
											'</ul>' +
										'</div>' +
									'</span>' +
									// View product
                                    '<button class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Wyświetl">' +
										'<a href="{{ route('funds.index') }}/' + full.id +'"><i class="flaticon2-expand"></i></a>' +
									'</button>';
                            }*/
						},{
							data: 'id',
							visible: false,
							orderable: false,
							searchable: false,
							title: "ID rekordu"
						}
					],
				api: "/api/datatables/funds",
				order: [4, "desc"]
			};
				</script>
			</div>
		</div>
	</div>
</div>
@stop