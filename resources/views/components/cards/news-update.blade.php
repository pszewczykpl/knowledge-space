@can('update', $news)
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div class="symbol symbol-40 symbol-light-success mr-5">
				<span class="symbol-label" style="background-image:url('{{ asset('storage/') }}/{{ Auth::user()->avatar_path }}')"></span>
			</div>
			<div class="d-flex flex-column flex-grow-1">
                <a href="{{ route('users.show', $news->user->id) }}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{ $news->user->first_name }} {{ $news->user->last_name }}</a>
                <div class="d-flex">
                    <div class="d-flex align-items-center pr-5">
                        <span class="svg-icon svg-icon-md svg-icon-primary pr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M12,22 C7.02943725,22 3,17.9705627 3,13 C3,8.02943725 7.02943725,4 12,4 C16.9705627,4 21,8.02943725 21,13 C21,17.9705627 16.9705627,22 12,22 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000"></path>
                                </g>
                            </svg>
                        </span>
                        <a href="{{ route('news.show', $news->id) }}" class="text-muted font-weight-bold" title="{{ $news->created_at }}">{{ date('Y-m-d', strtotime($news->created_at)) }}</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="svg-icon svg-icon-md svg-icon-primary pr-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path d="M5.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L5.5,11 C4.67157288,11 4,10.3284271 4,9.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M11,6 C10.4477153,6 10,6.44771525 10,7 C10,7.55228475 10.4477153,8 11,8 L13,8 C13.5522847,8 14,7.55228475 14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 Z" fill="#000000" opacity="0.3"></path>
                                    <path d="M5.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M11,15 C10.4477153,15 10,15.4477153 10,16 C10,16.5522847 10.4477153,17 11,17 L13,17 C13.5522847,17 14,16.5522847 14,16 C14,15.4477153 13.5522847,15 13,15 L11,15 Z" fill="#000000"></path>
                                </g>
                            </svg>
                        </span>
                        <span class="text-muted font-weight-bold">{{ $news->user->department->name }}</span>
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