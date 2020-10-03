@can('create', App\Models\News::class)
<div class="card card-custom gutter-b">
	<div class="card-body">
		<div class="d-flex align-items-center">
			<div class="symbol symbol-40 symbol-light-success mr-5">
				<span class="symbol-label" style="background-image:url('@if(Auth::user()->avatar_path) {{ Storage::url(Auth::user()->avatar_path) }} @else {{ asset('media/avatars/default.jpg') }} @endif')"></span>
			</div>
			<span class="text-muted font-weight-bold font-size-lg">Coś nowego, <b>{{ Auth::user()->first_name }}</b>?</span>
		</div>
		{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_2_form', 'class' => 'pt-10 ql-quil ql-quil-plain']) !!}
			<div id="editor" name="editor" class="font-size-lg"></div>
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
					<input type="submit" id="submit" name="submit" value="Wyślij" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2">
				</div>
			</div>
		{!! Form::close() !!}
	</div>
</div>
@endcan