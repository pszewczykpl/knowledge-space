<div class="container">
    @can('create', App\Note::class)
    {!! Form::open(['route' => 'notes.store', 'method' => 'post']) !!}
        <div class="form-group">
            <input type="hidden" id="{{ $noteable_type }}_id" name="{{ $noteable_type }}_id" value="{{ $noteable_id }}">
            <textarea class="form-control form-control-lg form-control-solid" name="content" id="content" rows="3" placeholder="Treść notatki"></textarea>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-light-primary font-weight-bold" value="Dodaj notatkę">
            </div>
        </div>
    {!! Form::close() !!}
    <div class="separator separator-dashed my-10"></div>
    @endcan
    <div class="timeline timeline-3">
        <div class="timeline-items">
            @foreach($notes as $note)
            <div class="timeline-item">
                <div class="timeline-media">
                    <img alt="Pic" src="{{ asset('storage/avatars/') }}/{{ $note->user->avatar_filename }}">
                </div>
                <div class="timeline-content">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="mr-2">
                            <a href="{{ route('users.show', $note->user->id) }}" class="text-dark-75 text-hover-primary font-weight-bold">
                                {{ $note->user->first_name }} {{ $note->user->last_name }}
                            </a>
                            <span class="text-muted font-weight-light ml-2">
                                {{ $note->updated_at }}
                            </span>
                        </div>
                        <div style="display: flex;">
                            @can('update', $note)
                            <a href="{{ route('notes.edit', $note->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="flaticon2-edit text-primary" title="Edytuj"></i></a>
                            @endcan
                            @can('delete', $note)
                            {{ Form::open([ 'method'  => 'delete', 'route' => [ 'notes.destroy', $note->id ] ]) }}
                                {{ Form::button('<i class="flaticon2-trash text-danger" data-skin="primary" data-toggle="tooltip" data-html="true" data-original-title="Notatka zostanie usunięta we <b>wszystkich</b> obiektach z którymi jest powiązana!"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-clean btn-icon btn-icon-sm'] )  }}
                            {{ Form::close() }}
                            @endcan
                        </div>
                    </div>
                    <p class="p-0">
                        {{ $note->content }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>