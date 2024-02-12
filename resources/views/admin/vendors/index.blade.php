@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Vendor List
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
				<a href="/admin/vendors/create" class="btn btn-primary">
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
					<th scope="col">Name</th>
					<th scope="col">Company Name</th>
					<th scope="col">Branch Name</th>
					<th scope="col">Vendor Type</th>
					<th scope="col">Date Joining</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($vendors as $vendor)
				<tr>
					<td>{{ $vendor->name }}</td>
					<td>{{ $vendor->company_name }}</td>
					<td>{{ $vendor->branch->name }}</td>
					<td>{{ $vendor->vendorType->type_name ?? '' }}</td>
					<td>{{ $vendor->date_joining->format('d M Y') }}</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/vendors/{{ $vendor->id }}/login-list">
									<i class="bx bx-user me-1"></i>
									Vendor Login
								</a>
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/vendors/{{ $vendor->id }}/edit">
									<i class="bx bx-edit me-1"></i>
									Edit
								</a>
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/vendors/orders/{{ $vendor->id }}">
									<i class='bx bx-list-ul'></i>
									Orders
								</a>
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/vendors/item-list/{{ $vendor->id }}">
									<i class="bx bx-sitemap me-1"></i>
									Item List
								</a>
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/addnew/item/{{ $vendor->id }}">
									<i class='bx bxs-plus-circle'></i>
									Add New Item
								</a>
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/vendors/deals/{{ $vendor->id }}">
									<i class="bx bxs-badge-dollar me-1"></i>
									Deals
								</a>
								<a class="dropdown-item d-flex align-items-center gap-1" href="/admin/deals/create/{{ $vendor->id }}">
									<i class='bx bxs-plus-circle'></i>
									Add New Deal
								</a>
								{{-- <a class="dropdown-item" href="/admin/reservations/{{ $vendor->branch_id }}">
									<i class="bx bx-location-plus me-1"></i>
									Reservations
								</a> --}}
								<form action="{{ route('vendors.destroy', ['id' => $vendor->id]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('Are you sure you want to delete this vendor?')" class="dropdown-item">
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
					<td colspan="7">
						No vendors available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection