@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Settings
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
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-responsive table-hover">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Items</th>
					<th scope="col" class="text-center">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($branches as $branch)
				<tr>
					<td>{{ $branch->name }}</td>
					<td>{{ $branch->items->count() }}</td>
					<td>
						<div class="dropdown text-center">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin/settings/reorder/categories/{{ $branch->id }}">
									<i class="bx bx-category me-1"></i>
									Reorder Categories
								</a>
								<a class="dropdown-item" href="/admin/settings/reorder/categories/{{ $branch->id }}">
									<i class="bx bx-sitemap me-1"></i>
									Reorder Items
								</a>
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
