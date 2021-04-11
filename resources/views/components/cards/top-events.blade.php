<div class="card card-custom">
    <div class="card-header align-items-center border-0 mt-4">
        <h3 class="card-title align-items-start flex-column">
            <span class="font-weight-bolder text-dark">Ostatnia aktywność</span>
            <span class="text-muted mt-3 font-weight-bold font-size-sm">Ostatnie 10 aktywności</span>
        </h3>
    </div>
    <div class="card-body pt-4">
        <div class="timeline timeline-5">
            <div class="timeline-items">
                @foreach($events as $event)
                <div class="timeline-item">
                    <div class="timeline-media bg-light-primary">
                <span class="svg-icon-primary svg-icon-md">
                    @if($event->eventable_type  == 'App\Models\Attachment') @include('svg.attachment', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Bancassurance') @include('svg.bancassurance', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Department') @include('svg.department', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Employee') @include('svg.employee', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\FileCategory') @include('svg.file-category', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\File') @include('svg.file', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Fund') @include('svg.fund', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Investment') @include('svg.investment', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\News') @include('svg.news', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Note') @include('svg.note', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Partner') @include('svg.partner', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\PostCategory') @include('svg.post-category', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Post') @include('svg.post', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Protective') @include('svg.protective', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Reply') @include('svg.news', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\Risk') @include('svg.risk', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\System') @include('svg.system', ['class' => 'svg-icon-primary'])
                    @elseif($event->eventable_type  == 'App\Models\User') @include('svg.user', ['class' => 'svg-icon-primary'])
                    @endif
                </span>
                    </div>
                    <div class="timeline-desc timeline-desc-light-primary">
                        <span class="font-weight-bolder text-primary">{{ $event->created_at }}</span>
                        <p class="font-weight-normal text-dark-50 pb-2">
                            {{ $event->user->fullname() }}
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
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>