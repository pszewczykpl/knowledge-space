<div class="card pt-4 mb-6 mb-xl-9 card-shadow card-rounded">
    <div class="card-header border-0">
        <div class="card-title">
            <h2>Notatki</h2>
        </div>
    </div>
    <div class="card-body pt-2">
        @can('create', App\Models\Note::class)
            {!! Form::open(['route' => 'notes.store', 'method' => 'post']) !!}
                <div class="mb-0">
                    <input type="hidden" id="{{ $noteable_type }}_id" name="{{ $noteable_type }}_id" value="{{ $noteable_id }}">
                    <textarea class="form-control form-control-solid placeholder-gray-600 fw-bolder fs-4 ps-9 pt-7 card-rounded" rows="4" name="content" id="content" placeholder="Treść notatki"></textarea>
                    <button type="submit" class="btn btn-primary mt-n20 mb-20 position-relative float-end me-7 card-rounded">Dodaj notatkę</button>
                </div>
            {!! Form::close() !!}
            <div class="separator separator-dashed my-10"></div>
        @endcan
        @foreach($notes->sortByDesc('updated_at') as $note)
            <div class="mb-5">
                <div class="card card-bordered card-rounded w-100">
                    <div class="card-body">
                        <div class="d-flex flex-stack mb-5">
                            <div class="d-flex align-items-center f">
                                <div class="symbol symbol-50px me-5">
                                    <img src="{{ Storage::url($note->user->avatar_path ?? 'avatars/default.jpg') }}" class="card-rounded">
                                </div>
                                <div class="d-flex flex-column fw-bold fs-5 text-gray-600 text-dark">
                                    <div class="d-flex align-items-center">
                                        <a href="{{ route('users.show', $note->user->id) }}" class="text-gray-800 fw-bolder text-hover-primary fs-5 me-3">
                                            {{ $note->user->full_name }}
                                        </a>
                                        <span class="m-0"></span>
                                    </div>
                                    <span class="text-muted fw-bold fs-6">{{ $note->updated_at }}</span>
                                </div>
                            </div>
                            {{ Form::open([ 'method'  => 'delete', 'id' => 'note_delete_form_' .  $note->id , 'route' => [ 'notes.destroy', $note->id ] ]) }}
                            {{ Form::close() }}
                            <div class="m-0">
                                @can('update', $note)
                                    <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-light btn-sm card-rounded">Edytuj</a>
                                @endcan
                                @can('update', $note)
                                    <a href="{{ route('notes.detach', ['note' => $note, 'noteable_type' => $noteable_type, 'noteable_id' => $noteable_id]) }}" class="btn btn-light btn-sm card-rounded">Odepnij</a>
                                @endcan
                                @can('delete', $note)
                                    <a onclick='document.getElementById("note_delete_form_{{ $note->id }}").submit();' class="btn btn-danger btn-sm card-rounded">Usuń</a>
                                @endcan
                            </div>
                        </div>
                        <p class="fw-normal fs-5 text-gray-700 m-0">
                            {!! $note->content !!}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>