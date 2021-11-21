@extends('layouts.app')

@section('toolbar')
	<x-layout.toolbar.button action="back" href="{{ route('employees.index') }}" />
	@can('update', $employee)
		<x-layout.toolbar.button action="edit" href="{{ route('employees.edit', $employee) }}" />
	@endcan
	@can('create', $employee)
		<x-layout.toolbar.button action="duplicate" href="{{ route('employees.duplicate', $employee) }}" />
	@endcan
	@can('delete', $employee)
		<x-layout.toolbar.button action="destroy" onclick="document.getElementById('employees_destroy_{{ $employee->id }}').submit();" />
		{{ Form::open([ 'method'  => 'delete', 'route' => [ 'employees.destroy', $employee ], 'id' => 'employees_destroy_' . $employee->id ]) }}{{ Form::close() }}
	@endcan
@stop

@section('content')
	<div id="kt_content_container" class="container">
		<div class="d-flex flex-column flex-xl-row">
			<div class="flex-column flex-lg-row-auto w-100 w-xl-400px mb-10">
				<x-cards.details --title="Szczegóły ubezpieczenia" --description="Dane ubezpieczenia pracowniczego">
					<x-cards.details-row --attribute="Nazwa produktu" :value="$employee->name" />
					<x-cards.details-row --attribute="Kod OWU" :value="$employee->code_owu" />
				</x-cards.details>
			</div>
			<div class="flex-lg-row-fluid ms-lg-15">
				<ul class="nav nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#info" id="info_tab">Podsumowanie</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#files" id="files_tab">Dokumenty</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show" id="info" role="tabpanel">
						<x-panels.notes :notes="$employee->notes" -type="employee" :id="$employee->id"  />

						<x-panels.archive-data>
							<x-slot name="header">
								<th class="min-w-200px">Nazwa produktu</th>
								<th class="min-w-150px">Kod OWU</th>
								<th class="min-w-150px">Data aktualizacji</th>
								<th class="min-w-100px"></th>
							</x-slot>
							<x-slot name="data">
								@foreach($archive_employees as $archive_employee)
									<tr class="@if($archive_employee->id == $employee->id) bg-light @endif">
										<td>{{ $archive_employee->name }}</td>
										<td>{{ $archive_employee->code_owu }}</td>
										<td>{{ $archive_employee->edit_date }}</td>
										<td>@if($archive_employee->id != $employee->id) <a href="{{ route('employees.show', $archive_employee->id) }}" class="btn btn-light btn-sm card-rounded" title="Wyświetl">Wyświetl</a> @endif</td>
									</tr>
								@endforeach
							</x-slot>
						</x-panels.archive-data>

					</div>
					<div class="tab-pane fade show active" id="files" role="tabpanel">
						<x-panels.files :model="$employee" />
					</div>
				</div>
			</div>
		</div>
	</div>
@stop