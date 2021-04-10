@extends('layouts.app')

@section('subheader')
	<x-datatables.search-box-global />
@stop

@section('toolbar')
	<a href="{{ route('home.index') }}" class="btn btn-clean btn-sm">@include('svg.back', ['class' => 'navi-icon']) Powrót</a>
		@can('create', App\Models\PostCategory::class)
			<a href="{{ route('post-categories.create') }}" class="btn btn-light-primary btn-sm ml-1">@include('svg.post-category', ['class' => 'navi-icon']) Dodaj Kategorię
			</a>
		@endcan
		@can('viewAny', App\Models\Trash::class)
			<a href="{{ route('trash.index', ['model' => 'post-categories']) }}" class="btn btn-light-danger btn-sm ml-1">@include('svg.trash', ['class' => 'navi-icon']) Elementy usunięte</a>
		@endcan
@stop

@section('content')
<div class="container">
	<div class="d-flex flex-column flex-md-row">
		<div class="flex-md-row-fluid">
			<div class="card card-custom">
				<div class="card-body">
					<div class="mb-1">
						<div class="row align-items-center">
							<x-datatables.search-box --size="3" --number="0" --placeholder="Nazwa" />
						</div>
					</div>
					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<td>Nazwa</td>
								<td>Akcje</td>
							</tr>
						</thead>
					</table>
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
<script src="{{ asset('js/pages/post-categories/index.js') }}" type="text/javascript"></script>
@endpush
