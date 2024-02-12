@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Order Details
</h4>
<div class="card">
	<div class="card-header">
		<div class="row mb-4">
			<div class="col-md-6">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center border-2 border-bottom-0 border-primary">
						Customer Name:
						<span class="fw-semibold">
							{{ ucfirst($customerName) }}
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center border-2 border-bottom-0 border-primary">
						Customer Phone:
						<span class="fw-semibold">
							{{ ucfirst($phoneNumber) }}
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center border-2 border-primary">
						Customer Address:
						<span class="fw-semibold">
							{{ $customerAddress }}
						</span>
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul class="list-group">
					<li class="list-group-item d-flex justify-content-between align-items-center border-2 border-bottom-0 border-primary">
						Vendor:
						<span class="fw-semibold">
							{{ ucfirst($vendorName) }}
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center border-2 border-bottom-0 border-primary">
						Date:
						<span class="fw-semibold">
							{{ $orderDate }}
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center border-2 border-primary">
						Order Type:
						<span class="fw-semibold">
							@if ($orderType == 1)
								Delivery
							@elseif ($orderType == 2)
								Pick Up
							@endif
						</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="row mb-4">
			<div class="col-md-12">
				<ul class="list-group list-group-horizontal">
					<li class="list-group-item d-flex justify-content-between align-items-center gap-4 border-2 border-end-0 border-primary">
						Order Amount:
						<span class="fw-semibold">
							{{ session('currency')->symbol . $orderAmount }}
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center gap-4 border-2 border-end-0 border-primary">
						Delivery Charges:
						<span class="fw-semibold">
							{{ session('currency')->symbol . $deliveryCharges }}
						</span>
					</li>
					<li class="list-group-item d-flex justify-content-between align-items-center gap-4 border-2 border-primary">
						Grand Total:
						<span class="fw-semibold">
							{{ session('currency')->symbol . $grandTotal }}
						</span>
					</li>
				</ul>
			</div>
		</div>
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
			<div class="col-md-6 d-flex justify-content-end gap-4">
				{{-- Order Status --}}
				@if ($orderStatus == 5)
				<div class="alert border-2 border-success alert-success mb-0 py-2 px-4">
					Order Delivered
				</div>
				@elseif ($orderStatus == 6)
				<div class="alert border-2 border-info alert-info mb-0 py-2 px-4">
					Order Picked Up
				</div>
				@elseif ($orderStatus == 7)
				<div class="alert border-2 border-danger alert-danger mb-0 py-2 px-4">
					Order Canceled
				</div>
				@endif
				<a href="/admin/dashboard" class="btn btn-primary">
					Back
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
					<th scope="col">Item Image</th>
					<th scope="col">Item Name</th>
					<th scope="col">Item Price</th>
					<th scope="col">Quantity</th>
					<th scope="col">Subtotal</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($orderDetail as $list)
				<tr
					class="{{ $list->is_deal ? 'accordion' : '' }}"
					id="{{ $list->is_deal ? 'dealOptions' . $list->id : '' }}"
				>
					<td>{{ $loop->iteration }}</td>
					<td>
						@php
							$imgPath = ($list->is_deal) ? 'deal-banners' : 'branch-products';
						@endphp
						<img
							src='{{ "/images/{$imgPath}/{$branchId}/250x250/{$list->main_image}" }}'
							class="img-fluid w-25"
							alt="{{ $list->item_name }}"
							title="{{ $list->item_name }}"
						/>
					</td>
					<td>
						@if ($list->is_deal)
						<div class="accordion-item shadow-none rounded-0 bg-transparent border-0">
							<h2 class="accordion-header">
								<button
									class="accordion-button p-0"
									type="button"
									data-bs-toggle="collapse"
									data-bs-target="#collapseOne{{ $list->id }}"
									aria-expanded="true"
									aria-controls="collapseOne"
								>
								{{ $list->item_name }}
								</button>
							</h2>
							<div id="collapseOne{{ $list->id }}" class="accordion-collapse collapse" data-bs-parent="#dealOptions{{ $list->id }}">
								<div class="accordion-body">
									<span class="fw-semibold text-muted" style="font-size:.875em;">
										Deal Options:
									</span>
									<br />
									@foreach ($list->orderDealOptions as $dealOption)
										<span class="fw-bold small ps-3">
											{{ $loop->iteration . '. ' }}
										</span>
										<span class="fw-semibold small ps-3">
											{{ $dealOption->item_name }}
										</span>
										@if (! $loop->last)
										<br/>
										@endif
									@endforeach
								</div>
							</div>
						</div>
						@else
						{{ $list->item_name }}
						@endif
						{{-- Load Addons - Start --}}
						@if ($list->orderAddons->count())
							@if (! $list->is_deal)
								<br />
							@endif
							<span class="fw-semibold text-muted" style="font-size:.875em;">
								Addons:
							</span>
							<br />
							@foreach ($list->orderAddons as $addon)
								<span class="fw-bold small ps-3">
									{{ $loop->iteration . '. ' }}
								</span>
								<span class="fw-semibold small ps-3">
									{{ $addon->addonItem->name ?? '' }}
									x
									{{ $addon->quantity }}
								</span>
								@if (! $loop->last)
								<br/>
								@endif
							@endforeach
						@endif
						{{-- Load Addons - End --}}
					</td>
					<td>
						{{ session('currency')->symbol . $list->item_price }}
						@if ($list->orderAddons->count())
							<br />
							<span class="fw-semibold text-muted" style="font-size:.875em;">
								Addons Price:
							</span>
							<br />
							@foreach ($list->orderAddons as $addon)
								@isset($addon->addonItem)
								<span class="fw-semibold small ps-3">
									{{ '+' }}
									{{ session('currency')->symbol . $addon->addonItem->price }}
								</span>
								@endisset
								@if (! $loop->last)
								<br/>
								@endif
							@endforeach
						@endif
					</td>
					<td>{{ $list->qty }}</td>
					<td>{{ session('currency')->symbol . $list->sub_total }}</td>
				</tr>
				@empty
				<tr>
					<td colspan="6">
						<div class="d-flex justify-content-center fw-semibold lead my-2">
							Details are not available.
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
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

					window.location.href = '/admin/dashboard';
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

		// Listen for Enter key press
		paymentInput.addEventListener('keydown', function(event) {
			if (event.key === 'Enter') {
				// Prevent the form from submitting
				event.preventDefault();
				// Call the submitPayment function
				submitPayment();
			}
		});

		submitPaymentButton.addEventListener('click', submitPayment);
	});
</script>
@endsection