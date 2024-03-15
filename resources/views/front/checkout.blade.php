@extends('layouts.front')

@section('content')
<section class="container bg-secondary-subtle rounded my-4 p-4">
	<div class="row justify-content-center align-items-center">
		<div class="col">
			<div class="card">
				<div class="card-body p-4">
					<form class="checkout-form" action="{{ route('checkout') }}" method="POST">
						@csrf
						{{-- Hidden Inputs --}}
						<input type="hidden" name="order_type" id="order-type" />
						<input type="hidden" name="delivery_charges" id="delivery-charges" value="{{ $deliveryCharges }}" />
						<input type="hidden" name="address_latitude" id="address-latitude" value="{{ $latitude }}" />
						<input type="hidden" name="address_longitude" id="address-longitude" value="{{ $longitude }}" />
						{{-- Hidden Inputs End --}}

						<div class="row">
							<div class="col-lg-8">
								<div class="row g-3 mt-4">
									<div class="col-md-12">
										<div class="w-100 border border-2 rounded-3" id="address-map-container" style="height:400px;">
											<div class="h-100" id="address-map"></div>
										</div>
									</div>
								</div>
								<div class="row g-3 mt-4">
									<div class="col-lg-12 mb-3">
										<p class="fs-6 fw-semibold">
											Order Type
										</p>
									</div>
									<div class="hstack gap-5">
										<div class="d-flex">
											<input
												type="radio"
												class="btn-check"
												name="orderType"
												id="delivery"
												value="delivery"
												autocomplete="off"
											/>
											<label class="btn bds-c-tab__label border-2" for="delivery">Delivery</label>
										</div>
										<div class="d-flex">
											<input
												type="radio"
												class="btn-check"
												name="orderType"
												id="pickup"
												value="pickup"
												autocomplete="off"
											/>
											<label class="btn bds-c-tab__label border-2" for="pickup">Pickup</label>
										</div>
									</div>
								</div>
								<div class="row g-3 mt-4 address-container" style="display: none;">
									<div class="col-md-12">
										<div class="form-floating mb-3">
											<input
												type="text"
												class="form-control @error('user_address') is-invalid @enderror"
												id="user-address"
												name="user_address"
												value="{{ old('user_address') }}"
											/>
											<label for="user_address">
												Address
											</label>
											@if ($errors->has('user_address'))
											<span class="invalid-feedback" role="alert">
												<strong>
													{{ $errors->first('user_address') }}
												</strong>
											</span>
											@endif
										</div>
									</div>
								</div>
								<div class="row g-3 mt-4">
									<div class="col-12">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Any further instructions..." name="instructions" id="instructions" style="height: 80px">{{ old('instructions') }}</textarea>
											<label for="instructions">
												Instructions
											</label>
										</div>
									</div>
								</div>
								<div class="row mt-5">
									<div class="col-lg-12 mb-3">
										<p class="fs-6 fw-semibold">
											Payment
										</p>
									</div>
									<div class="hstack gap-4">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="payment_method" value="cash" id="cash" checked>
											<label class="form-check-label" for="cod">
												Cash On Delivery
											</label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="payment_method" id="online" value="credit">
											<label class="form-check-label" for="credit">
												Online Payment
											</label>
										</div>
									</div>
								</div>
								<div class="row mt-5">
									<div class="vstack">
										<div class="d-inline-flex justify-content-between align-items-center mb-3">
											<p class="fs-5 fw-semibold">
												Order Details
											</p>
										</div>
										<table class="table table-sm table-hover align-middle">
											<thead>
												<tr class="text-secondary">
													<th class="fw-semibold small">
														Item
													</th>
													<th class="fw-semibold small">
														Unit Price
													</th>
													<th class="fw-semibold small">
														Quantity
													</th>
													<th class="fw-semibold small">
														Final Price
													</th>
													<th class="fw-semibold small text-center">
														Remove
													</th>
												</tr>
											</thead>
											<tbody>
											@if (session('cart', []))
											@foreach (session('cart') as $key => $items)
											@foreach ($items as $id => $item)
											<tr>
												<td>
													<div class="d-flex align-items-center gap-3">
														@php
															$imgPath = ($key == 'deal') ? 'deals' : 'items';
															$vendor = session('vendor');
														@endphp
														<img src='{{ "/images/vendors/{$vendor}/{$imgPath}/250x250/{$item['image']}" }}' class="img-thumbnail border-0 rounded-4" style="width:8rem !important"/>
														<span class="fw-medium fs-6">
															{{ ucwords(strtolower($item['name'])) }}
															@if ($key === 'deal')
															<span class="d-flex fw-semibold text-muted ps-1" style="font-size:.775em;">
																Selected Options:
															</span>
															@foreach ($item['options'] as $options)
															@foreach ($options as $option)
															@if (is_array($option))
																<div class="d-flex align-items-center justify-content-between">
																	<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-3 gap-1" style="font-size:.675em;">
																		<span>+</span>
																		{{ ucwords(strtolower($option['name'])) }}
																	</span>
																</div>
															@endif
															@endforeach
															@endforeach
														@endif
															@if (count($item['addons']))
															<span class="d-flex fw-semibold text-muted ps-1" style="font-size:.775em;">
																Addons:
															</span>
															@foreach ($item['addons'] as $addon)
															<div class="d-flex align-items-center">
																<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-2 gap-1" style="font-size:.775em;">
																	<span>+</span>
																	{{ $addon['name'] }}
																	<span>x</span>
																	{{ $addon['quantity'] }}
																</span>
															</div>
															@endforeach
															@endif
														</span>
													</div>
												</td>
												<td class="fw-medium small">
													{{ session('currency')->symbol }}
													{{ intval($item['price']) }}
												</td>
												<td>
													<div class="d-flex align-items-center gap-3">
														<a href="javascript:void(0)" class="decrease-quantity" data-id="{{ $id }}" data-type="{{ $key }}">
															<i class="fa fa-minus text-dark small"></i>
														</a>
														<span class="quantity">
															{{ $item['quantity'] }}
														</span>
														<a href="javascript:void(0)" class="increase-quantity" data-id="{{ $id }}" data-type="{{ $key }}">
															<i class="fa fa-plus text-dark small"></i>
														</a>
													</div>
												</td>
												<td class="fw-medium small">
													{{ session('currency')->symbol }}
													{{ intval($item['quantity'] * $item['price']) }}
													@if ($key === 'deal')
														@foreach ($item['options'] as $options)
														@foreach($options as $option)
														@if (is_array($option))
														@if ($option['deal_price'] != 0)
														<div class="d-flex align-items-center">
															<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-1 small">
																<span class="text-muted fw-semibold">
																	+
																	{{ session('currency')->symbol }}
																	{{ intval($option['deal_price']) }}
																</span>
															</span>
														</div>
														@endif
														@endif
														@endforeach
														@endforeach
													@endif
													@if (count($item['addons']))
														@foreach ($item['addons'] as $addon)
														<div class="d-flex align-items-center">
															<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-1 small">
																<span class="text-muted fw-semibold">
																	+
																	{{ session('currency')->symbol }}
																	{{ intval($addon['price']) }}
																</span>
															</span>
														</div>
														@endforeach
													@endif
												</td>
												<td class="text-center">
													<div data-id="{{ $id }}" data-type="{{ $key }}">
														<a href="javascript:void(0)" class="remove-from-cart">
															<i class="fa fa-xmark text-dark small"></i>
														</a>
													</div>
												</td>
											</tr>
											@endforeach
											@endforeach
											@endif
											</tbody>
										</table>
										@if (session('cart'))
											@foreach (session('cart') as $key => $items)
												@foreach ($items as $item)
													@php
														$itemTotal = $item['quantity'] * $item['price'];
														$addonTotal = 0;
												
														foreach ($item['addons'] as $addon)
														{
															$addonTotal += $addon['price'] * $addon['quantity'];
														}
													@endphp
												@endforeach
											@endforeach
										@endif
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="mt-4 mx-4">
									<h2 class="fs-3 fw-semibold">Summary</h2>
									<div class="d-flex justify-content-between mt-4 text-secondary">
										<span>Sub Total:</span>
										<span>
											{{ session('currency')->symbol }}
											{{ session('cartTotal') }}
										</span>
									</div>
									<div class="d-flex justify-content-between mt-2 text-secondary">
										<span>Delivery Charges:</span>
										<span>
											@if ($deliveryCharges == 0)
												Free
											@else
												{{ session('currency')->symbol }}
												{{ $deliveryCharges }}
											@endif
										</span>
									</div>
									@if ($deliveryCharges)
									<div class="d-flex mt-1">
										<span class="fw-bold f-label-small-font-size">
											(Get free delivery on order above {{ session('currency')->symbol . ' ' . $deliveryFreeAfer }})
										</span>
									</div>
									@endif
									<hr>
									<div class="d-flex justify-content-between fw-semibold mt-2">
										<span>Total:</span>
										<span>
											{{ session('currency')->symbol }}
											{{ (float) session('cartTotal') + $deliveryCharges }}
										</span>
									</div>
									<div class="row mt-4">
										<div class="col-12">
											@if (! $minimumOrderCheck)
											<span class="fw-bold ms-1 mb-1 small text-danger d-inline-flex">
												Minimum Order Amount is {{ session('currency')->symbol . ' ' . $minimumOrderAmount }}
											</span>
											@endif
											<button class="btn bds-c-btn bds-c-btn-primary bds-is-idle bds-c-btn--layout-default zi-surface-base p-3 checkout-button">
												Order
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('scripts')
{{-- <script src="assets/js/mapInput.js"></script> --}}
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const orderType = localStorage.getItem('selectedOption');
		const addressContainer = document.querySelector('.address-container');
		
		if (orderType) {
			$('#order-type').val(orderType);
			showAddressField(orderType)
		}

		// Event listener for order type change
		document.querySelectorAll('input[name="orderType"]').forEach(radio => {
			if (orderType == radio.value) {
				radio.checked = true;
			}
			else {
				if (radio.value == 'delivery') {
					radio.checked = true;
				} else {

				}
			}
			radio.addEventListener('change', function() {
				showAddressField(this.value);
				localStorage.setItem('selectedOption', this.value);
				$('#order-type').val(this.value);
			});
		});

		const checkoutForm = document.querySelector('.checkout-form');
		const orderButton = document.querySelector('.checkout-button');
		
		const disabled = @json($minimumOrderCheck);
		orderButton.disabled = ! disabled;

		orderButton.addEventListener('click', function (event) {
			event.preventDefault();

			if (checkCoords()) {
				checkoutForm.submit();
			}
		});

		function showAddressField(value) {
			if (value === 'delivery') {
				addressContainer.style.display = 'flex';
			} else {
				addressContainer.style.display = 'none';
			}
		}

		function checkCoords() {
			const address = document.getElementById('address-input');
			const latitude = document.getElementById('address-latitude');
			const longitude = document.getElementById('address-longitude');

			if (latitude.value === '0' || longitude.value === '0') {
				alert('Please select a valid location on the map.');
				address.classList.add('is-invalid');
				return false;
			}

			return true;
		}
	});
</script>
@endpush