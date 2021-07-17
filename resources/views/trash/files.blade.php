@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('files.index') }}" />
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
					<table class="table table-separate table-head-custom collapsed" id="table">
						<thead>
							<tr>
								<th>Nazwa</th>
								<th>Ścieżka</th>
								<th>Kategoria dokumentu</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($files as $file)
							<tr>
								<td>{{ $file->name }}</td>
								<td>{{ $file->path }}</td>
								<td>{{ $file->file_category->name }}</td>
								<td>
									@can('restore', $file)
									<a onclick='document.getElementById("file_restore_{{ $file->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'files.restore', $file->id ], 'id' => 'file_restore_' . $file->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $file)
									<a onclick='document.getElementById("file_force_destroy_{{ $file->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'files.forceDestroy', $file->id ], 'id' => 'file_force_destroy_' . $file->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js/pages/trash/files.js') }}" type="text/javascript"></script>
@endpush