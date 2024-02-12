@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Vendor Orders
</h4>
<div class="card">
	<div class="card-header">
		@if ($message = Session::get('message'))
		<div class="alert alert-success alert-dismissible">
			<strong>{{ $message }}</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
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
					<th scope="col">S. No</th>
					<th scope="col">Vendor</th>
					<th scope="col">Customer</th>
					<th scope="col">Phone</th>
					<th scope="col">Item Qty</th>
					<th scope="col">Total</th>
					<th scope="col">Order Date</th>
					<th scope="col">Order Type</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($vendorOrders as $vendorOrder)
				<tr>
					<td>{{ $loop->iteration }}</td>
					{{-- ?? operator will be removed after DB clean up --}}
					<td>{{ $vendorOrder->vendor->company_name ?? '' }}</td>
					<td>{{ $vendorOrder->customer->name ?? '' }}</td>
					<td>{{ $vendorOrder->customer->phone_number ?? '' }}</td>
					<td>{{ $vendorOrder->item_quantity }}</td>
					<td>{{ $vendorOrder->grand_total }}</td>
					<td>
						{{ $vendorOrder->created_at->format('M d Y') }}
					</td>
					<td>
						@if ($vendorOrder->order_type == 1)
							<span class="badge bg-label-primary me-1">
								Delivery
							</span>
						@elseif ($vendorOrder->order_type == 2)
							<span class="badge bg-label-info me-1">
								Pick Up
							</span>
						@endif
					</td>
					<td>
						<a href="/admin/dashboard/order-details/{{ $vendorOrder->id }}" class="btn btn-primary">
							Details
						</a>
					</td>
				</tr>
				@empty
				<tr class="fw-semibold lead my-0 alert alert-danger text-center">
					<td colspan="9">
						No vendor orders available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $vendorOrders->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@include('admin.modals.pickup-modal')
@endsection