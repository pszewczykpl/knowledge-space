@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('notes.index') }}" />
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
								<th>Treść</th>
								<th>Autor</th>
								<th>Akcje</th>
							</tr>
						</thead>
						<tbody>
							@foreach($notes as $note)
							<tr>
								<td>{{ $note->content }}</td>
								<td>{{ $note->user->full_name }}</td>
								<td>
									@can('restore', $note)
									<a onclick='document.getElementById("note_restore_{{ $note->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Przywróć">
										<i class="navi-icon flaticon2-time"></i>
									</a>
									{{ Form::open([ 'method'  => 'PUT', 'route' => [ 'notes.restore', $note->id ], 'id' => 'note_restore_' . $note->id ]) }}{{ Form::close() }}
									@endcan
									@can('forceDelete', $note)
									<a onclick='document.getElementById("note_force_destroy_{{ $note->id }}").submit();' class="btn btn-sm btn-clean btn-icon btn-icon-md" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Usuń trwale">
										<i class="navi-icon flaticon2-trash"></i>
									</a>
									{{ Form::open([ 'method'  => 'delete', 'route' => [ 'notes.forceDestroy', $note->id ], 'id' => 'note_force_destroy_' . $note->id ]) }}{{ Form::close() }}
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
 <script src="{{ asset('js/pages/trash/notes.js') }}" type="text/javascript"></script>
@endpush