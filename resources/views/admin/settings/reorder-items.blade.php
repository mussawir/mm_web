@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Reorder Items
</h4>
<div class="card">
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-responsive table-hover reorder-items">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Item Name</th>
					<th scope="col">Category</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($items as $item)
				<tr id="{{ 'item_' . $loop->index }}" data-index="{{ $loop->index }}" data-item-id="{{ $item->id }}">
					<td>{{ $loop->iteration }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->category->name }}</td>
				</tr>
				@empty
				<tr>
					<td colspan="2">
						<div class="d-flex justify-content-center fw-semibold lead my-0 alert alert-danger">
							No items available!
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
