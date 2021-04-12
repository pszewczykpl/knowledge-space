<div class="container">
    @can('create', App\Models\Note::class)
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
            @foreach($notes->sortByDesc('updated_at'); as $note)
            <div class="timeline-item">
                <div class="timeline-media">
                    <img alt="Pic" src="{{ Storage::url($note->user->avatar_path ?? 'avatars/default.jpg') }}">
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
                            @can('update', $note)
                            <a href="{{ route('notes.detach', ['note' => $note, 'noteable_type' => $noteable_type, 'noteable_id' => $noteable_id]) }}" class="btn btn-sm btn-clean btn-icon btn-icon-sm"><i class="flaticon2-line text-danger" title="Odepnij"></i></a>
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

                    @if($note->get_cached_relation('attachments')->count() > 0)
                    <div class="row pl-3">
                        @include('svg.attachment', ['class' => 'svg-icon-primary svg-icon-2x'])
                        <span class="text-dark-50 font-weight-md font-size-lg pl-1">Załączniki</span>
                    </div>
                    <div class="row pl-3 pt-3">
                            @foreach($note->get_cached_relation('attachments') as $attachment)
                                <div class="pb-3 pr-6">
                                    <a href="{{ route('attachments.show', $attachment->id) }}" target="_blank" class="pr-3">
                                        <img src="{{ asset('/media/files/' . $attachment->extension . '.svg') }}" style="width: 24px;" title="{{ $attachment->name }}">
                                        <span class="text-dark-75 font-weight-bold pl-1 font-size-md">{{ $attachment->name }}</span>
                                    </a>
                                    <a onclick='document.getElementById("attachments_destroy_{{ $attachment->id }}").submit();' class="">
                                        <span class="text-danger pl-1 font-size-md">Usuń</span>
                                    </a>
                                    {{ Form::open([ 'method'  => 'delete', 'route' => [ 'attachments.destroy', $attachment->id ], 'id' => 'attachments_destroy_' . $attachment->id ]) }}{{ Form::close() }}
                                </div>
                            @endforeach
                    </div>
                    @endif

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>