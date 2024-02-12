@extends('layouts.front')

@section('title', $title)

@section('content')
<div class="container">
	<div class="justify-content-center">
		<div class="col-md-12">
			<div class="card border-0 mb-3">
				<nav class="my-4" aria-label="Breadcrumb">
					<ol class="d-inline-flex gap-3 px-3 py-2">
						<li class="d-flex align-items-center gap-3">
							<a href="{{ route('home') }}" class="fw-semibold border-bottom border-primary">
								Homepage
							</a>
							<i class="fa-solid fa-chevron-right small text-secondary"></i>
						</li>
						<li class="d-flex align-items-center gap-3">
							<a href="{{ route('home') }}" class="fw-semibold fw-semibold border-bottom border-primary">
								Deals
							</a>
							<i class="fa-solid fa-chevron-right small text-secondary"></i>
						</li>
						<li class="fw-semibold">
							{{ $deal->name }}
						</li>
					</ol>
				</nav>
				<div class="row mb-4">
					<div class="col-md-5 mb-auto mt-md-5 mt-0">
						<div class="mt-md-5 mt-0 ms-md-5 ms-0 p-5">
							<img
								src='{{ "/images/deal-banners/{$deal->branch_id}/500x500/{$deal->banner}" }}'
								alt="{{ $deal->name }}"
								title="{{ $deal->name }}"
								id="main-image"
								class="rounded img-fluid shadow-0"
								width="350"
							/>
						</div>
					</div>
					<div class="col-md-7">
						<div class="p-2 pt-md-5 text-md-start text-center">
							<div class="d-flex align-items-center justify-content-between mb-4">
								<h5 class="fw-bold fs-4 text-uppercase">
									{{ $deal->name }}
								</h5>
								<span>
									{{ session('currency')->symbol . $deal->grand_total }}
								</span>
							</div>
							<form method="POST" action="{{ route('cart.create') }}">
								@csrf
								<input type="hidden" name="type" value="deal"/>
								<input type="hidden" name="vendor" value="{{ $vendorId }}"/>
								<input type="hidden" name="id" value="{{ $deal->id }}"/>
								<div class="row mb-4">
									<div class="col-lg-12">
										@foreach ($deal->items as $item)
										@php
											$thisDeal = session("cart.deal.{$deal->id}.options.{$item->id}");
										@endphp
										@if ($item->quantity > 1)
										@for ($i = 1; $i <= $item->quantity; $i++)
										<div class="d-flex justify-content-between align-items-center mb-2">
											<h6>
												Choose your
												{{ $i === 1 ? '1st' : ($i === 2 ? '2nd' : ($i === 3 ? '3rd' : $i.'th')) }}
												{{ $item->item_type_name ?? $item->item->name }}
											</h6>
											{{-- <span class="badge text-bg-danger text-uppercase">
												1 Required
											</span> --}}
										</div>
										<ul class="list-group {{ ($i !== $item->quantity) ? 'mb-3' : '' }}">
											@foreach ($item->dealOptions as $index => $option)
											@php
												$isChecked = ($option->item_id == ($thisDeal[$i - 1]['id'] ?? null));
											@endphp
											<li class="list-group-item d-flex justify-content-between align-items-center bg-secondary-subtle">
												<div class="form-check">
													<input
														class="form-check-input"
														type="radio"
														id="option_{{ $option->id }}_{{ $i }}"
														name="options[{{ $item->id }}][{{ $i }}]"
														value="{{ $option->id }}"
														{{ $isChecked ? 'checked' : '' }}
													/>
													<label class="form-check-label" for="option_{{ $option->id }}_{{ $i }}">
														{{ $option->item->name }}
													</label>
												</div>
												<span>
												@if ($option->deal_price)
													{{ session('currency')->symbol . $option->deal_price }}
												@else
													Free
												@endif
												</span>
											</li>
											@endforeach
										</ul>
										@endfor
										@else
										<div class="d-flex justify-content-between align-items-center mb-2 {{ $loop->last ? 'mt-4' : '' }}">
											<h6>
												Choose your
												{{ $item->item_type_name ?? $item->item->name }}
											</h6>
											{{-- <span class="badge text-bg-danger text-uppercase">
												1 Required
											</span> --}}
										</div>
										<ul class="list-group {{ (!$loop->last) ? 'mb-3' : '' }}">
											@foreach ($item->dealOptions as $option)
											@php
												$isChecked = ($option->item_id == ($thisDeal[0]['id'] ?? null));
											@endphp
											<li class="list-group-item d-flex justify-content-between align-items-center bg-secondary-subtle">
												<div class="form-check">
													<input
														class="form-check-input"
														type="radio"
														id="option_{{ $option->id }}"
														name="options[{{ $item->id }}]"
														value="{{ $option->id }}"
														{{ $isChecked ? 'checked' : '' }}
													/>
													<label class="form-check-label" for="option_{{ $option->id }}">
														{{ $option->item->name }}
													</label>
												</div>
												<span>
												@if ($option->deal_price)
												{{ session('currency')->symbol . $option->deal_price }}
												@else
													Free
												@endif
												</span>
											</li>
											@endforeach
										</ul>
										@endif
										@endforeach
									</div>
								</div>
								@if ($deal->addons->count())
								<div class="my-4">
									<h6 class="fw-semibold py-2 text-uppercase">
										Extras / Add ons
									</h6>
									<div class="list-group list-group-flush gap-2">
										@foreach ($deal->addons as $key => $addon)
										@php
											$addonInCart = collect(session("cart.deal.$deal->id.addons", []));
											$addonQuantity = $addonInCart->where('id', $addon->item_id)->pluck('quantity')->first() ?? 1;
											$checked = $addonInCart->contains('id', $addon->item_id);
										@endphp
											<label class="list-group-item d-flex justify-content-between pb-3">
												<span>
													<input
														class="form-check-input me-3"
														type="checkbox"
														name="addons[{{ $addon->item_id }}]"
														{{ $checked ? 'checked' : '' }}
													/>
													{{ $addon->item->name }}
												</span>
												<div class="row">
													<div class="col-lg-4 col-md-6">
														<input
															type="number"
															name="addon_quantities[{{ $addon->item_id }}]"
															class="form-control"
															min="1"
															value="{{ $addonQuantity }}"
														/>
													</div>
												</div>
												<span>
													{{ session('currency')->symbol . $addon->item->price }}
												</span>
											</label>
										@endforeach
									</div>
								</div>
								@endif
								<div class="d-flex align-items-center justify-content-md-start justify-content-center mt-4">
									<div class="me-3">
										{{ session('currency')->symbol . session()->get("cart.deal.{$deal->id}.quantity", 1) * $deal->grand_total }}
									</div>
									<div class="me-3" style="width: 4rem">
										<label class="form-label visually-hidden" id="quantity">
											Quantity
										</label>
										<input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ session()->get("cart.deal.{$deal->id}.quantity", 1) }}" />
									</div>
									<button class="btn btn-danger text-uppercase px-3" id="addToCartBtn" disabled>
										{{ array_key_exists($deal->id, session()->get('cart.deal', [])) ? 'Update Cart' : 'Add To Cart' }}
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="row m-md-5 mt-1 py-4 rounded bg-secondary-subtle">
					<div class="col-lg-12 ps-5">
						<p class="fs-6 fw-semibold">
							{{ $deal->description ?? "No description." }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/deal.js') }}"></script>
@endsection