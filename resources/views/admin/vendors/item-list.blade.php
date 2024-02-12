@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Vendor Item List
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
				<a href="/admin/addnew/item/{{ $vendorID }}" class="btn btn-primary">
					New
				</a>
			</div>
		</div>
	</div>
	<div class="p-3 pb-0">
		{{ $items->links() }}
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="table-responsive text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Image</th>
					<th scope="col">Name</th>
					<th scope="col">Category</th>
					<th scope="col">Price</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($items as $item)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>
						<img
							src="{{ '/images/branch-products/' . $item->branch_id . '/250x250/' . $item->main_image }}"
							class="rounded"
							alt="{{ $item->name }}"
							style="width:08rem;height:08rem;object-fit:cover;"
						/>
					</td>
					<td>
						{{ $item->name }}
					</td>
					<td>
						{{ $item->category->name ?? 'Empty' }}
					</td>
					<td>{{ $item->price }}</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin/edit/item/{{ $item->id }}">
									<i class="bx bx-edit me-1"></i>
									Edit
								</a>
								<form action="{{ route('item.destroy', ['id' => $item->id]) }}" method="POST">
									@csrf
									<button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="dropdown-item">
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
						No items available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $items->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection