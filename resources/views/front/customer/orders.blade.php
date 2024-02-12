@extends('layouts.front')

@section('content')
<div class="container">
	<nav class="mt-4" aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="{{ route('home') }}">
					<i class="fa fa-home"></i>
				</a>
			</li>
			<li class="breadcrumb-item">
				My Orders
			</li>
		</ol>
	</nav>
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
									class="accordion-button collapsed"
									type="button"
									data-bs-toggle="collapse"
									data-bs-target="#order{{ $order->id }}"
									aria-expanded="false"
									aria-controls="order{{ $order->id }}"
								>
									<div>
										<span class="fw-semibold">
											Order
										</span>
										<span class="ps-2 fw-medium text-muted small">
											{{ $order->created_at->format('j-M-Y') }}
										</span>
										<br>
										<div class="pt-2">
											<span>
												{{ $order->branch->name }}
											</span>
											-
											<span class="text-dark fw-bold">
												{{ session('currency')->symbol }}
												{{ $order->grand_total }}
											</span>
										</div>
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
														{{ $orderDetail->item_price }}
													</span>
												</div>
											</div>
										</div>
										<span class="fw-semibold">
											{{ session('currency')->symbol }}
											{{ $orderDetail->sub_total }}
										</span>
									</li>
									@if ($orderDetail->is_deal)
									<ul class="list-group">
										@foreach ($orderDetail->orderDealOptions as $orderDealOption)
										<li class="list-group-item">
											{{ $orderDealOption->item_name }}
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