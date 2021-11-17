@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('home.index') }}" />
	@can('update', \App\Models\SystemProperty::class)
		<x-layout.toolbar.button action="save" onclick="document.getElementById('system_properties_update_form').submit();" />
	@endcan
@stop

@section('content')
	<x-pages.form>

		{!! Form::open(['route' => ['system-properties.update'], 'method' => 'PUT', 'id' => 'system_properties_update_form']) !!}
		{!! Form::token() !!}
			<x-pages.form-card title="Ubezpieczenia">
				<x-pages.form-card-row label="Domyślna data aktualizacji">
					<input class="form-control form-control-lg form-control-solid" type="text" name="default_edit_date" id="default_edit_date" value="{{ $default_edit_date->value }}" placeholder="Wpisz domyślną datę">
					<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 mt-4">
						<div class="d-flex flex-stack flex-grow-1">
							<div class="fw-bold">
								<div class="fs-6 text-gray-600">
									Podczas duplikowania ubezpieczenia, w polu "Data aktualizacji" podstawiana jest powyższa wartość.
								</div>
							</div>
						</div>
					</div>
				</x-pages.form-card-row>
			</x-pages.form-card>
		{!! Form::close() !!}

		<x-pages.form-card title="Operacje systemu">
			<x-pages.form-card-row label="Tryb maintenance">
				<a href="{{ route('system-properties.maintenanceOn') }}" class="btn btn-outline btn-outline-dashed btn-outline-danger text-hover-white card-rounded">Włącz</a>
				<a href="{{ route('system-properties.maintenanceOff') }}" class="btn btn-outline btn-outline-dashed btn-outline-success text-hover-white card-rounded">Wyłącz</a>
				<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6 mt-4">
					<div class="d-flex flex-stack flex-grow-1">
						<div class="fw-bold">
							<div class="fs-6 text-gray-600">
								Podczas trybu maintenance, aby dostać sie do systemu dodaj do URL: <i>/deployment</i>.
							</div>
						</div>
					</div>
				</div>
			</x-pages.form-card-row>
		</x-pages.form-card>



	</x-pages.form>
@stop