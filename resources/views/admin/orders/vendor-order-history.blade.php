@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Vendor Orders History
</h4>
<div class="card">
	<div class="card-header">
		<div class="row">
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
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Customer</th>
					<th scope="col">Item Quantity</th>
					<th scope="col">Grand Total</th>
					<th scope="col">Status</th>
					<th scope="col">Order Date</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($orderHistory as $order)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $order->customer->name ?? '' }}</td>
					<td>{{ $order->item_quantity }}</td>
					<td>{{ $order->grand_total }}</td>
					<td>
						@if ($order->status == 5)
						<span class="badge bg-label-success">
							Delivered
						</span>
						@elseif ($order->status == 6)
						<span class="badge bg-label-info">
							Picked Up
						</span>
						@elseif ($order->status == 7)
						<span class="badge bg-label-danger">
							Canceled
						</span>
						@endif
					</td>
					<td>
						{{ $order->created_at->format('M d Y') }}
					</td>
					<td>
						<a href="/admin/dashboard/order-details/{{ $order->id }}" class="btn btn-primary">
							Details
						</a>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="7">
						<div class="d-flex justify-content-center fw-semibold lead my-2">
							No order history available.
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $orderHistory->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection