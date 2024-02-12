@extends('layouts.front')

@section('content')
<section class="container bg-secondary-subtle rounded my-4 p-4">
	<div class="row justify-content-center align-items-center">
		<div class="col">
			<div class="card">
				<div class="card-body p-4">
					<div class="row">
						<div class="col-lg-9">
							<h5 class="mb-3">
								<a href="{{ route('home') }}" class="text-body">
									<i class="fa-solid fa-long-arrow-alt-left"></i>
									<span class="ms-1">Continue Shopping</span>
								</a>
							</h5>
							<hr>
							<div class="d-flex justify-content-between align-items-center mb-4">
								<div>
									<p class="mb-2 fs-1 fw-medium">
										Your Cart
									</p>
								</div>
								{{-- For sorting cart items --}}
								{{-- <div>
									<p class="mb-0">
										<span class="fw-semibold">
										Sort by:
										</span>
										<a href="javascript:void(0)" class="text-body">
											Price
											<i class="fa-solid fa-angle-down"></i>
										</a>
									</p>
								</div> --}}
							</div>
							<table class="table table-sm table-hover align-middle">
								<thead>
									<tr class="text-secondary text-uppercase">
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
																$imgPath = ($key == 'deal') ? 'deal-banners' : 'branch-products';
																$branch = session('selectedBranch');
															@endphp
															<img src='{{ "/images/{$imgPath}/{$branch}/250x250/{$item['image']}" }}' class="img-thumbnail border-0" style="width:8rem !important"/>
															<span class="fw-medium fs-6">
																{{ $item['name'] }}
																@if (count($item['addons']))
																	@foreach ($item['addons'] as $addon)
																	<div class="d-flex align-items-center">
																		<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-2 gap-1 small">
																			<span>
																				+
																			</span>
																			{{ $addon['name'] }}
																			<span>
																				x
																			</span>
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
														{{ $item['price'] }}
													</td>
													<td>
														<div class="d-flex align-items-center gap-3">
															<a href="#" class="decrease-quantity" data-id="{{ $id }}" data-type="{{ $key }}">
																<i class="fa fa-minus text-dark small"></i>
															</a>
															<span class="quantity">{{ $item['quantity'] }}</span>
															<a href="#" class="increase-quantity" data-id="{{ $id }}" data-type="{{ $key }}">
																<i class="fa fa-plus text-dark small"></i>
															</a>
														</div>
													</td>
													<td class="fw-medium small">
														{{ session('currency')->symbol }}
														{{ (int) ($item['quantity'] * $item['price']) }}
														@if (count($item['addons']))
															@foreach ($item['addons'] as $addon)
															<div class="d-flex align-items-center">
																<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-1 small">
																	<span class="text-muted fw-semibold">
																		+
																		{{ session('currency')->symbol }}
																		{{ $addon['price'] }}
																		<span>
																			x
																		</span>
																		{{ $addon['quantity'] }}
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
							@php $total = 0; @endphp
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

											$total += ($itemTotal + $addonTotal);
										@endphp
									@endforeach
								@endforeach
							@endif
						</div>
						<div class="col-lg-3">
							<div class="card border-0 rounded w-100">
								<h5 class="card-title ps-2 py-2 fw-semibold">
									Summary
								</h5>
								<div class="card-body fw-medium">
									<div class="d-flex justify-content-between mb-3 text-uppercase">
										<p class="text-secondary">
											Subtotal
											<span aria-hidden="true">*</span>
										</p>
										<p>
											{{ session('currency')->symbol }}
											{{ $total }}
										</p>
									</div>

									<div class="d-flex justify-content-between mb-3 text-uppercase">
										<p class="text-secondary">
											Shipping Est.
										</p>
										<p>
											@php
											$shipping = ($total == 0) ? 0 : 10;
											@endphp
											{{ session('currency')->symbol }} {{ $shipping }}
										</p>
									</div>

									<div class="d-flex justify-content-between mb-3 text-uppercase">
										<p class="text-secondary">
											Total Price
										</p>
										<p>
											{{ session('currency')->symbol }} {{ (float) ($total + $shipping) }}
										</p>
									</div>

									<button type="button" class="btn btn-dark text-uppercase">
										<a href="{{ route('checkout.page') }}" class="text-light">
											Proceed To Checkout
										</a>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection