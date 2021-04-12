@can('update', $news)
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div class="symbol symbol-40 symbol-light-success mr-5">
				<span class="symbol-label" style="background-image:url({{ Storage::url($news->user->avatar_path ?? 'avatars/default.jpg') }})"></span>
			</div>
			<div class="d-flex flex-column flex-grow-1">
                <a href="{{ route('users.show', $news->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $news->user->fullname() }}</a>
                <div class="d-flex">
                    <div class="d-flex align-items-center pr-5">
                        @include('svg.time', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
                        <a href="{{ route('news.show', $news->id) }}" class="text-muted font-weight-bold" title="{{ $news->created_at }}">{{ date('Y-m-d', strtotime($news->created_at)) }}</a>
                    </div>
                    <div class="d-flex align-items-center">
                        @include('svg.department', ['class' => 'svg-icon-md svg-icon-primary pr-1'])
                        <span class="text-muted font-weight-bold">{{ $news->user->getCachedRelation('department')->first()->name }}</span>
                    </div>
                </div>
            </div>
		</div>
		{!! Form::open(['route' => ['news.update', $news->id], 'method' => 'PUT', 'id' => 'kt_forms_widget_2_form', 'class' => 'pt-10 ql-quil ql-quil-plain']) !!}
			<div id="editor" name="editor" class="font-size-lg">{!! $news->content !!}</div>
			<textarea name="content" style="display:none" id="content"></textarea>
			<div class="border-top my-5"></div>
			<div id="kt_forms_widget_2_editor_toolbar" class="ql-toolbar d-flex align-items-center justify-content-between">
				<div class="mr-2">
					<span class="ql-formats ml-0">
						<button class="ql-bold"></button>
						<button class="ql-italic"></button>
						<button class="ql-underline"></button>
						<button class="ql-strike"></button>
						<button class="ql-image"></button>
						<button class="ql-link"></button>
					</span>
				</div>
				<div>
					<input type="submit" id="submit" name="submit" value="Aktualizuj" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2">
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endcan