@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Branches
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
				<a href="/admin/branches/create" class="btn btn-primary">
					New
				</a>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-responsive table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">City</th>
					<th scope="col">Vendors</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($branches as $branch)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $branch->name }}</td>
					<td>{{ $branch->phone }}</td>
					<td>{{ $branch->city->name ?? NULL }}</td>
					<td>{{ $branch->vendors->count() }}</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin/branches/{{ $branch->id }}/edit">
									<i class="bx bx-edit me-1"></i>
									Edit
								</a>
								<form action="{{ route('branches.destroy', ['id' => $branch->id]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('Are you sure you want to delete this branch?')" class="dropdown-item">
										<i class="bx bx-trash me-1"></i>
										Delete
									</button>
								</form>
								<a class="dropdown-item" href="/admin/branch/vendors/{{ $branch->id }}">
									<i class='bx bx-store'></i>
									Vendors
								</a>
								{{-- <a class="dropdown-item" href="/admin/branch/orders/{{ $branch->id }}">
									<i class='bx bx-list-ul'></i>
									Orders
								</a>
								<a class="dropdown-item" href="/admin/branch/itemlist/{{ $branch->id }}">
									<i class="bx bx-sitemap me-1"></i>
									Item List
								</a>
								<a class="dropdown-item" href="/admin/branch/deals/{{ $branch->id }}">
									<i class="bx bxs-badge-dollar me-1"></i>
									Deals
								</a>
								<a class="dropdown-item" href="/admin/reservations/{{ $branch->id }}">
									<i class="bx bx-location-plus me-1"></i>
									Reservations
								</a> --}}
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="6">
						<div class="d-flex justify-content-center fw-semibold lead my-0 alert alert-danger">
							No branches available!
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection
