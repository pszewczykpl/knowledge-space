@can('create', App\Models\News::class)
	<div class="card mb-5 mb-xl-8 card-rounded card-shadow">
		<div class="card-body pb-0">
			<div class="d-flex align-items-center">
				<div class="d-flex align-items-center flex-grow-1">
					<div class="symbol symbol-45px me-5">
						<img src="{{ Storage::url(auth()->user()->avatar_path ?? 'avatars/default.jpg') }}" alt="">
					</div>
					<div class="d-flex flex-column">
						<span class="text-gray-600 fs-6 fw-normal">Coś nowego, <b>{{ Auth::user()->first_name }}</b>?</span>
					</div>
				</div>
			</div>
			{!! Form::open(['route' => 'news.store', 'method' => 'post', 'id' => 'kt_forms_widget_1_form', 'class' => 'ql-quil ql-quil-plain pb-3']) !!}
				<div id="kt_forms_widget_1_editor" class="py-6 text-gray-800 fw-normal fs-6" style="font-family: Poppins, Helvetica, sans-serif;"></div>
				<textarea name="content" style="display:none" id="content"></textarea>
				<div class="separator"></div>
				<div id="kt_forms_widget_1_editor_toolbar" class="ql-toolbar d-flex flex-stack py-2">
					<div class="me-2">
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