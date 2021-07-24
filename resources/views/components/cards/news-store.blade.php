@can('create', App\Models\News::class)
<div class="card mb-5 mb-xl-8 card-rounded card-shadow">
	<div class="card-body pb-0">
		<div class="d-flex align-items-center">
			<div class="d-flex align-items-center flex-grow-1">
				<div class="symbol symbol-45px me-5">
					<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" alt="">
				</div>
				<div class="d-flex flex-column">
					<span href="#" class="text-gray-600 fs-6 fw-normal">Coś nowego, <b>{{ Auth::user()->first_name }}</b>?</span>
				</div>
			</div>
		</div>
{{--		{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_2_form', 'class' => 'pt-10 ql-quil ql-quil-plain']) !!}--}}
{{--			<div id="editor" name="editor" class="font-size-lg"></div>--}}
{{--			<textarea name="content" style="display:none" id="content"></textarea>--}}
{{--			<div class="border-top my-5"></div>--}}
{{--			<div id="kt_forms_widget_2_editor_toolbar" class="ql-toolbar d-flex align-items-center justify-content-between">--}}
{{--				<div class="mr-2">--}}
{{--					<span class="ql-formats ml-0">--}}
{{--						<button class="ql-bold"></button>--}}
{{--						<button class="ql-italic"></button>--}}
{{--						<button class="ql-underline"></button>--}}
{{--						<button class="ql-strike"></button>--}}
{{--						<button class="ql-image"></button>--}}
{{--						<button class="ql-link"></button>--}}
{{--					</span>--}}
{{--				</div>--}}
{{--				<div>--}}
{{--					<input type="submit" id="submit" name="submit" value="Wyślij" class="btn btn-hover-text-primary btn-hover-icon-primary btn-sm btn-text-dark-50 bg-hover-light-primary rounded font-weight-bolder font-size-sm p-2 mr-2">--}}
{{--				</div>--}}
{{--			</div>--}}
{{--		{!! Form::close() !!}--}}
		{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_1_form', 'class' => 'ql-quil ql-quil-plain pb-3']) !!}
			<div id="kt_forms_widget_1_editor" class="py-6 text-gray-800 fw-normal" style="font-size: 13px !important; font-family: Poppins, Helvetica, sans-serif;"></div>
			<textarea name="content" style="display:none" id="content"></textarea>
			<div class="separator"></div>
			<div id="kt_forms_widget_1_editor_toolbar" class="ql-toolbar d-flex flex-stack py-2">
				<div class="me-2">
					<span class="ql-formats ql-size ms-0">
						<select class="ql-size w-75px"></select>
					</span>
					<span class="ql-formats">
						<button class="ql-bold"></button>
						<button class="ql-italic"></button>
						<button class="ql-underline"></button>
						<button class="ql-strike"></button>
						<button class="ql-image"></button>
						<button class="ql-link"></button>
						<button class="ql-clean"></button>
					</span>
				</div>
				<div class="me-n3">
					<span class="btn btn-icon btn-sm btn-active-color-primary">
						<i class="flaticon2-clip-symbol icon-ms"></i>
					</span>
					<span class="btn btn-icon btn-sm btn-active-color-primary">
						<i class="flaticon2-pin icon-ms"></i>
					</span>
				</div>
				<div>
					<input type="submit" id="submit" name="submit" value="Dodaj aktualność" style="font-family: Poppins, Helvetica, sans-serif;" class="btn btn-sm btn-active-color-primary pe-0 me-2">
				</div>
			</div>
		{!! Form::close() !!}

	</div>
</div>
@endcan