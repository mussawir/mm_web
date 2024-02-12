@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Branch Orders
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
					<th scope="col">S. No</th>
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
				@forelse ($branchOrders as $branchOrder)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $branchOrder->customer->name ?? '' }}</td>
					<td>{{ $branchOrder->customer->phone_number ?? '' }}</td>
					<td>{{ $branchOrder->item_quantity }}</td>
					<td>{{ $branchOrder->grand_total }}</td>
					<td>
						{{ $branchOrder->created_at->format('M d Y') }}
					</td>
					<td>
						@if ($branchOrder->order_type == 1)
						<span class="badge bg-label-primary">
							Delivery
						</span>
						@elseif ($branchOrder->order_type == 2)
						<span class="badge bg-label-info">
							Pick Up
						</span>
						@endif
					</td>
					<td>
						<div class="dropdown">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a href="/admin/dashboard/order-details/{{ $branchOrder->id }}" class="dropdown-item d-flex align-items-center gap-1">
									<i class="bx bx-edit-alt me-1"></i>
									Details
								</a>
								@if ($branchOrder->status == 0)
									@if ($branchOrder->order_type == 1)
									<a href="/admin/dashboard/deliver/{{ $branchOrder->id }}" onclick="return confirm('Are you sure?')" class="dropdown-item d-flex align-items-center gap-1">
										<i class='bx bxs-truck'></i>
										Delivery
									</a>
									@elseif ($branchOrder->order_type == 2)
									<a href='javascript:void(0)' class="dropdown-item d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#pickupModal" data-order-id="{{ $branchOrder->id }}">
										<i class='bx bxs-truck'></i>
										Picked Up
									</a>
									@endif
									<a href="/admin/dashboard/cancel/{{ $branchOrder->id }}" onclick="return confirm('Are you sure?')" class="dropdown-item d-flex align-items-center gap-1">
									<i class='bx bxs-x-circle'></i>
										Cancel
									</a>
								@endif
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="8">
						<div class="d-flex justify-content-center fw-semibold lead my-2">
							No orders available.
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $branchOrders->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@include('admin.modals.pickup-modal')
@endsection

@section('js')
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const paymentInput = document.querySelector('#payment');
		const paymentReceivedModal = new bootstrap.Modal(document.getElementById('pickupModal'));
		const submitPaymentButton = document.getElementById('submitPayment');

		const setOrderId = (orderId) => {
			paymentInput.value = '';
			paymentInput.dataset.orderId = orderId;
		};

		// Function to handle form submission
		const submitPayment = () => {
			const payment = paymentInput.value;
			const orderID = paymentInput.dataset.orderId;

			fetch(`/admin/dashboard/picked/${orderID}`, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': '{{ csrf_token() }}',
				},
				body: JSON.stringify({
					receivedPayment: payment,
				}),
			})
			.then(response => response.json())
			.then(data => {
				if (data.status === 1)
				{
					// Close the modal
					paymentReceivedModal.hide();
					
					// Reload the page
					window.location.reload(true);
				}
				else if (data.status === 0)
				{
					alert (data.message)
				}

			})
			.catch(error => {
				// Handle errors
			});
		};

		document.addEventListener('click', function(event) {
			const link = event.target.closest('[data-bs-toggle="modal"][data-order-id]');
			if (link)
			{
				const orderId = link.getAttribute('data-order-id');
				setOrderId(orderId);
			}
		});

		submitPaymentButton.addEventListener('click', submitPayment);
	});
</script>
@endsection