@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Vendor Type List
</h4>
<div class="card">
	<div class="card-header">
		@if ($message = Session::get('message'))
		<div class="alert alert-success alert-dismissible">
			<strong>{{ $message }}</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<div class="row gap-md-0 gap-4">
			<div class="col-md-6">
				<div class="input-group input-group-merge">
					<span class="input-group-text" id="search-box">
						<i class="bx bx-search"></i>
					</span>
					<input
						id="search"
						name="search"
						type="text"
						class="form-control"
						placeholder="Search..."
						aria-label="Search..."
						aria-describedby="search-box"
					/>
				</div>
			</div>
			<div class="col-md-6 text-md-end text-center">
				<a href="/admin/vendor-types/create" class="btn btn-primary">
					New
				</a>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S. No</th>
					<th scope="col">Type Name</th>
					<th scope="col">Is Food</th>
					<th scope="col">Status</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($vendorTypes as $vendorType)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $vendorType->type_name }}</td>
					<td>
						<span class="badge {{ $vendorType->is_food ? 'bg-label-success' : 'bg-label-danger' }}">
							{{ $vendorType->is_food ? 'Yes' : 'No' }}
						</span>
					</td>
					<td>
						<div class="form-check form-switch">
							<input
								class="form-check-input"
								type="checkbox"
								role="switch"
								id="statusSwitch"
								{{ ($vendorType->status == '1') ? 'checked' : '' }}
							>
							<label
								class="form-check-label visually-hidden"
								for="statusSwitch"
							>
								{{ $vendorType->status ? 'Enabled' : 'Disabled' }}
							</label>
						</div>
					</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin/vendor-types/{{ $vendorType->id }}/edit">
									<i class="bx bx-edit me-1"></i>
									Edit
								</a>
								<form action="{{ route('vendorTypes.destroy', ['id' => $vendorType->id]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('Are you sure you want to delete this vendor type?')" class="dropdown-item">
										<i class="bx bx-trash me-1"></i>
										Delete
									</button>
								</form>
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr class="fw-semibold lead my-0 alert alert-danger text-center">
					<td colspan="5">
						No vendor types available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection