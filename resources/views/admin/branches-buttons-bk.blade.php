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
				<a href="/admin/addnew/branch" class="btn btn-primary">
					New
				</a>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="table-responsive text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Name</th>
					<th scope="col">Phone</th>
					<th scope="col">Category</th>
					<th scope="col">Item List</th>
					<th scope="col" class="d-flex justify-content-start">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($Branches as $list)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $list->name }}</td>
					<td>{{ $list->phone }}</td>
					<td>
						<a
							href="/admin/branch/categories/{{ $list->id }}"
							class="btn btn-info"
						>
							Categories
						</a>
					</td>
					<td>
						<a
							href="/admin/branch/itemlist/{{ $list->id }}"
							class="btn btn-success"
						>
							Item List
						</a>
					</td>
					<td>
						<div class="d-flex gap-2">
							<a
								href="/admin/edit/branch/{{ $list->id }}"
								class="btn btn-primary" 
							>
								Edit
							</a>
							<a
								href="/admin/delete/branch/{{ $list->id }}"
								class="btn btn-danger" 
							>
								Delete
							</a>
							<a
								href="/admin/locations/{{ $list->id }}"
								class="btn btn-info"
							>
								Locations
							</a>
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
