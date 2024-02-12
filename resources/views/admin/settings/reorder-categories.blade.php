@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Reorder Categories
</h4>
<div class="card">
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-responsive table-hover reorder-categories">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Category Name</th>
					<th scope="col">Items</th>
					<th scope="col">Reorder</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($categories as $category)
				<tr id="{{ 'category_' . $loop->index }}" data-index="{{ $loop->index }}" data-category-id="{{ $category->id }}">
					<td>{{ $loop->iteration }}</td>
					<td>{{ $category->name }}</td>
					<td>{{ $category->items->count() }}</td>
					<td>
						<a
							href="/admin/settings/reorder/items/{{ $category->id }}"
							class="btn btn-primary"
						>
							Reorder Items
						</a>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="4">
						<div class="d-flex justify-content-center fw-semibold lead my-0 alert alert-danger">
							No categories available!
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
