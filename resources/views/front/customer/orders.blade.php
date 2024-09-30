@extends('layouts.front')

@section('content')
<div class="container">
	<div class="row justify-content-center align-items-center">
		<div class="col">
			<div class="card mt-2 mb-4 mx-auto">
				<div class="card-body p-4">
					@if ($orders->count())
					<div class="accordion accordion-flush" id="ordersAccordion">
						@foreach($orders as $order)
						<div class="accordion-item">
							<h2 class="accordion-header">
								<button
									class="d-flex justify-content-between position-relative align-items-center w-100 py-3 px-4 fs-6 text-start bg-white border-0 collapsed"
									type="button"
									data-bs-toggle="collapse"
									data-bs-target="#order{{ $order->id }}"
									aria-expanded="false"
									aria-controls="order{{ $order->id }}"
								>
									<div>
										<div class="pt-2 fw-bold">
											{{ $order->vendor->company_name }}
										</div>
										<span class="fw-semibold">
											Order # {{ $order->id }}
										</span>
										<span class="text-dark fw-bold">
											{{ session('currency')->symbol }}
											{{ intval($order->grand_total) }}
										</span>
										<span class="ps-2 fw-medium text-muted small">
											{{ $order->created_at->format('j-M-Y') }}
										</span>
										<br>
									</div>
									<div>
										@switch($order->status)
											@case(1)
												<span class="alert alert-primary border border-primary border-2 p-1">
													<span class="small fw-semibold text-primary">
														Waiting for approval
													</span>
												</span>
												@break
										@endswitch
									</div>
								</button>
							</h2>
							<div id="order{{ $order->id }}" class="accordion-collapse collapse" data-bs-parent="#ordersAccordion">
								<div class="accordion-body">
								@if ($order->details->count())
								<ul class="list-group">
									@foreach ($order->details as $orderDetail)
									<li class="list-group-item d-flex justify-content-between align-items-start">
										<div class="ms-2 me-auto">
											<div class="d-flex align-items-center gap-2">
												<span class="fw-bold">
													{{ $orderDetail->item_name }}
												</span>
												<div class="d-inline-flex align-items-center gap-2">
													<span>
														{{ $orderDetail->qty }}
													</span>
													<span>x</span>
													<span>
														{{ intval($orderDetail->item_price) }}
													</span>
												</div>
											</div>
										</div>
										<span class="fw-semibold">
											{{ session('currency')->symbol }}
											{{ intval($orderDetail->sub_total) }}
										</span>
									</li>
									@if ($orderDetail->is_deal)
									<ul class="list-group">
										@foreach ($orderDetail->orderDealOptions as $orderDealOption)
										<li class="list-group-item ps-5 fw-medium">
											{{ $orderDealOption->item_name }}
											@if ($orderDealOption->deal_price != 0)
												<span>
													{{ $orderDetail->qty }}
												</span>
												<span>x</span>
												<span>
													{{ intval($orderDealOption->deal_price) }}
												</span>
											@endif
										</li>
										@endforeach
									</ul>
									@endif
									@endforeach
								</ul>
								@endif
								</div>
							</div>
						</div>
						@endforeach
					</div>
					@else
					<div class="d-flex justify-content-center align-items-center">
						<h4>
							No order history available.
						</h4>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection