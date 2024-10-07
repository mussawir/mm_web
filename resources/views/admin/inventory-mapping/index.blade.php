@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Inventory Mapping
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
				<a href="/admin/inventory/create" class="btn btn-primary">
					New
				</a>
			</div>
		</div>
	</div>
	{{-- <div class="p-3 pb-0">
		{{ $inventoryMaps->links() }}
	</div> --}}
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Item</th>
					<th scope="col">Location</th>
					<th scope="col">Quantity</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($inventoryMaps as $map)
				<tr>
					<td>{{ $map->item->name }}</td>
					<td>{{ $map->location->name }}</td>
					<td>{{ $map->quantity }}</td>
					<td>
						<div class="dropdown text-center">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								{{-- <a class="dropdown-item" href="/admin/edit/item/{{ $item->id }}">
									<i class="bx bx-edit me-1"></i>
									Edit
								</a> --}}
								{{-- <form action="{{ route('item.destroy', ['id' => $item->id]) }}" method="POST">
									@csrf
									<button type="submit" onclick="return confirm('Are you sure you want to delete this item?')" class="dropdown-item">
										<i class="bx bx-trash me-1"></i>
										Delete
									</button>
								</form> --}}
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td>
						No inventory maps available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- <div class="p-3 pb-0">
		{{ $inventoryMaps->links() }}
	</div> --}}
	{{-- / Hoverable Table Rows --}}
</div>
@endsection