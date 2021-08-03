@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('post-categories.index') }}" />
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-3">
			<x-cards.trash-menu />
        </div>
        <div class="col-12 col-md-8">
            <div class="card card-custom gutter-b">
				<div class="card-body">
					<table class="table table-separate table-head-custom collapsed" id="post_categories_trash_datatable">
						<thead>
							<tr>
								<th>Nazwa</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($postCategories as $postCategory)
							<tr>
								<td>{{ $postCategory->name }}</td>
								<td>
									@can('restore', $postCategory)
									<a onclick='document.getElementById("post_categories_restore_{{ $postCategory->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'post-categories.restore', $postCategory->id ], 'id' => 'post_categories_restore_' . $postCategory->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $postCategory)
									<a onclick='document.getElementById("post_categories_force_destroy_{{ $postCategory->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'post-categories.forceDestroy', $postCategory->id ], 'id' => 'post_categories_force_destroy_' . $postCategory->id ]) }}{{ Form::close() }}
									@endcan
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
        </div>
    </div>
</div>
@stop

@push('scripts')
	<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/pages/trash/post-categories.js') }}" type="text/javascript"></script>
@endpush