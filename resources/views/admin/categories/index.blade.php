@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Categories List
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
				<div class="d-inline-flex gap-3">
					<a href="/admin/categories/create" class="btn btn-primary">
						New Category
					</a>
				</div>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="p-3 pb-0">
		{{ $categories->links() }}
	</div>
	<div class="text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Image</th>
					<th scope="col">Name</th>
					<th scope="col">Vendor Type</th>
					<th scope="col">Most Used</th>
					<th scope="col">Total Items</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($categories as $category)
				<tr>
					<td>
						<img
							src="{{ '/images/categories/250x250/' . $category->image }}"
							class="rounded"
							alt="{{ $category->name }}"
							title="{{ $category->name }}"
							style="width:08rem;height:08rem;object-fit:cover;"
						/>
					</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->vendorType->type_name ?? '' }}</td>
					<td>
						<span class="badge bg-label-{{ ($category->is_mu == '1') ? 'success' : 'danger' }} me-1">
							{{ ($category->is_mu == '1') ? 'Yes' : 'No' }}
						</span>
					</td>
					<td>
						{{ $category->items->count() }}
					</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin/categories/{{ $category->id }}/edit">
									<i class="bx bx-edit me-1"></i>
									Edit
								</a>
								<form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('Are you sure you want to delete this category?')" class="dropdown-item">
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
					<td colspan="6">
						No categories available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $categories->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection
