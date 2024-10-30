<div class="offcanvas offcanvas-end rounded-start-1" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasCartLabel">
			Your Items
			<span class="fw-bold">
				@if ($cartItems)
				(<span class="vendor-name">{{ $cartItems }}</span>)
				@endif
			</span>
		</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body vstack">
		@if ($cartItems)
			@foreach (session('cart') as $key => $items)
				@if (is_array($items))
					@foreach ($items as $id => $item)
						@php
							$itemTotal = $item['quantity'] * $item['price'];
							$addonTotal = 0;
							$dealOptionsTotal = 0;
						@endphp
						<div class="d-flex flex-column mb-4 border-bottom pb-2">
							<div class="row">
								<div class="col-md">
									<div class="card border-0 min-h-full">
										<div class="row g-0">
											<div class="col-md-3">
												@php
												$imgPath = ($key == 'deal') ? 'deals' : 'items';
												$vendor = session('vendor');
												@endphp
												<img
													src='{{ "/images/vendors/{$vendor}/{$imgPath}/250x250/{$item['image']}" }}'
													style="width:100%;height:65px;"
													class="card-img card-img-left"
												/>
											</div>
											<div class="col-md-9">
												<div class="card-body hstack justify-content-between">
													<h5 class="card-title small mb-0" style="text-wrap:balance">
														{{ ucwords(strtolower($item['name'])) }}
													</h5>
													<p class="card-text text-truncate overflow-visible fw-bold">
														{{ session('currency')->symbol }}
														{{ intval($item['price']) }}
														@if ($item['quantity'] > 1)
														<span>x</span>
														{{ $item['quantity'] }}
														@endif
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="vstack mt-3 mb-2 w-100">
								@if ($key === 'deal')
									<span class="fw-semibold text-muted ps-3" style="font-size:.775em;">
										Selected Options:
									</span>
									@foreach ($item['options'] as $options)
									@foreach ($options as $option)
									@if (is_array($option))
										<div class="d-flex align-items-center justify-content-between">
											<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-4 gap-1" style="font-size:.675em;">
												<span>+</span>
												{{ ucwords(strtolower($option['name'])) }}
											</span>
											@if ($option['deal_price'] != 0)
											<span class="text-muted fw-semibold ps-2" style="font-size:.675em;">
												<span>+</span>
												{{ session('currency')->symbol }}
												{{ $option['deal_price'] }}
												@if ($item['quantity'] > 1)
												<span>x</span>
												{{ $item['quantity'] }}
												@endif
												@php
													$dealOptionsTotal += intval($option['deal_price'] * intval($item['quantity']));
												@endphp
											</span>
											@endif
										</div>
									@endif
									@endforeach
									@endforeach
								@endif

								@if (isset($item['addons']) && count($item['addons']))
									<span class="fw-semibold text-muted ps-3" style="font-size:.775em;">
										Addons:
									</span>
									@foreach ($item['addons'] as $addon)
										@php
											$addonTotal += $addon['price'] * $addon['quantity'];
										@endphp
										<div class="d-flex align-items-center justify-content-between">
											<span class="d-flex align-items-center justify-content-center text-muted fw-semibold ps-4 gap-1" style="font-size:.675em;">
												<span>+</span>
												{{ $addon['name'] }}
												<span>x</span>
												{{ $addon['quantity'] }}
											</span>
											<span class="text-muted fw-semibold ps-2" style="font-size:.675em;">
												+
												{{ session('currency')->symbol }}
												{{ intval($addon['price']) }}
											</span>
										</div>
									@endforeach
								@endif
								<div class="hstack justify-content-between mt-3">
									<div class="hstack gap-3 border rounded-pill px-2 py-1" style="border-color:#e5e5e5 !important;">
										<a href="#" class="decrease-quantity border-end pe-2" data-id="{{ $id }}" data-type="{{ $key }}">
											<i class="fa fa-angle-down small"></i>
										</a>
										<span class="fw-medium text-black quantity px-1">{{ $item['quantity'] }}</span>
										<a href="#" class="increase-quantity border-start ps-2" data-id="{{ $id }}" data-type="{{ $key }}">
											<i class="fa fa-angle-up small"></i>
										</a>
									</div>
									<div data-id="{{ $id }}" data-type="{{ $key }}">
										<a href="javascript:void(0)" class="remove-from-cart">
											<i class="fa fa-xmark text-dark"></i>
										</a>
									</div>
								</div>
								<div class="d-flex justify-content-between align-items-center pt-3">
									<span class="card-text text-truncate overflow-visible fw-bold small">
										Sub Total:
									</span>
									<span class="card-text text-truncate overflow-visible fw-bold small">
										{{ session('currency')->symbol }}
										{{ ($itemTotal + $addonTotal + $dealOptionsTotal) }}
									</span>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			@endforeach
			<div class="d-flex flex-column justify-content-end mt-auto">
				<div class="d-flex justify-content-center px-5">
					<a href="{{ route('checkout.page') }}" class="btn bds-c-btn bds-c-btn-primary bds-is-idle bds-c-btn--layout-default zi-surface-base p-3">
						<span>Checkout:</span>
						<span>
							{{ session('currency')->symbol }}
							{{ session('cartTotal') }}
						</span>
					</a>
				</div>
			</div>
		@else
			<div class="vstack align-items-center justify-content-center gap-2 h-100 vendor-name">
				<i class="fa-solid fa-bag-shopping fs-1"></i>
				<span class="fs-4 fw-semibold">
					Cart is empty
				</span>
			</div>
		@endif
	</div>
</div>
