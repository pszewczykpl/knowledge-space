<div class="card mb-5 mb-xl-8 card-shadow card-rounded">
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="fw-bolder mb-2 text-dark">Ostatnia aktywność</span>
            <span class="text-muted fw-bold fs-7">Ostatnie 10 aktywności</span>
        </h3>
    </div>
    <div class="card-body pt-5">
        <div class="timeline-label">
            @foreach($events as $event)
                @if($event->visible)
                    <div class="timeline-item">
                        <div class="timeline-label fw-bolder text-gray-800 fs-6">{{ date("Y-m-d", strtotime($event->created_at)) }}</div>
                        <div class="timeline-badge">
                            <i class="fa fa-genderless text-primary fs-1"></i>
                        </div>

                        <div class="fw-mormal timeline-content text-muted ps-3">
                            {{ $event->user ? $event->user->full_name : '' }}
                            @if($event->event == 'created') utworzył
                            @elseif($event->event == 'updated') zaktualizował
                            @elseif($event->event == 'deleted') usunął
                            @endif
                            @if($event->eventable_type  == 'App\Models\Attachment') <a @if($event->event != 'deleted') href="{{ route('attachments.show', $event->eventable_id) }}" @endif>załącznik</a>.
                            @elseif($event->eventable_type  == 'App\Models\Bancassurance') <a @if($event->event != 'deleted') href="{{ route('bancassurances.show', $event->eventable_id) }}" @endif>produkt bancassurance</a>.
                            @elseif($event->eventable_type  == 'App\Models\Department') <a @if($event->event != 'deleted') href="{{ route('departments.show', $event->eventable_id) }}" @endif>departament</a>.
                            @elseif($event->eventable_type  == 'App\Models\Employee') <a @if($event->event != 'deleted') href="{{ route('employees.show', $event->eventable_id) }}" @endif>produkt pracowniczy</a>.
                            @elseif($event->eventable_type  == 'App\Models\FileCategory') <a @if($event->event != 'deleted') href="{{ route('file-categories.show', $event->eventable_id) }}" @endif>kategorię dokumentu</a>.
                            @elseif($event->eventable_type  == 'App\Models\File') <a @if($event->event != 'deleted') href="{{ route('files.show', $event->eventable_id) }}" @endif>dokument</a>.
                            @elseif($event->eventable_type  == 'App\Models\Fund') <a @if($event->event != 'deleted') href="{{ route('funds.show', $event->eventable_id) }}" @endif>fundusz</a>.
                            @elseif($event->eventable_type  == 'App\Models\Investment') <a @if($event->event != 'deleted') href="{{ route('investments.show', $event->eventable_id) }}" @endif>produkt inwestycyjny</a>.
                            @elseif($event->eventable_type  == 'App\Models\News') <a @if($event->event != 'deleted') href="{{ route('news.show', $event->eventable_id) }}" @endif>aktualność</a>.
                            @elseif($event->eventable_type  == 'App\Models\Note') <a @if($event->event != 'deleted') href="{{ route('notes.show', $event->eventable_id) }}" @endif>notatkę</a>.
                            @elseif($event->eventable_type  == 'App\Models\Partner') <a @if($event->event != 'deleted') href="{{ route('partners.show', $event->eventable_id) }}" @endif>partnera</a>.
                            @elseif($event->eventable_type  == 'App\Models\PostCategory') <a @if($event->event != 'deleted') href="{{ route('post-categories.show', $event->eventable_id) }}" @endif>kategorię postu</a>.
                            @elseif($event->eventable_type  == 'App\Models\Post') <a @if($event->event != 'deleted') href="{{ route('posts.show', $event->eventable_id) }}" @endif>post</a>.
                            @elseif($event->eventable_type  == 'App\Models\Protective') <a @if($event->event != 'deleted') href="{{ route('protectives.show', $event->eventable_id) }}" @endif>produkt ochronny</a>.
                            @elseif($event->eventable_type  == 'App\Models\Reply') <a>odpowiedź</a>.
                            @elseif($event->eventable_type  == 'App\Models\Risk') <a @if($event->event != 'deleted') href="{{ route('risks.show', $event->eventable_id) }}" @endif>ryzyko</a>.
                            @elseif($event->eventable_type  == 'App\Models\System') <a @if($event->event != 'deleted') href="{{ route('systems.show', $event->eventable_id) }}" @endif>system</a>.
                            @elseif($event->eventable_type  == 'App\Models\User') <a @if($event->event != 'deleted') href="{{ route('users.show', $event->eventable_id) }}" @endif>pracownika</a>.
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

