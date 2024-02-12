@extends('layouts.front')

@section('title', $title)

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card border-0 mb-4">
				<nav class="my-4" aria-label="Breadcrumb">
					<ol class="d-inline-flex gap-3 px-3 py-2">
						<li class="d-flex align-items-center gap-3">
							<a href="{{ route('home') }}" class="fw-semibold border-bottom border-primary">
								Homepage
							</a>
							<i class="fa-solid fa-chevron-right small text-secondary"></i>
						</li>
						<li class="d-flex align-items-center gap-3">
							<a
								href="/home#{{ strtolower(str_replace(' ', '_', $item->category->name)) . $item->category->id }}"
								class="fw-semibold fw-semibold border-bottom border-primary"
							>
								{{ $item->category->name }}
							</a>
							<i class="fa-solid fa-chevron-right small text-secondary"></i>
						</li>
						<li class="fw-semibold">
							{{ $item->name }}
						</li>
					</ol>
				</nav>
				<form method="POST" action="{{ route('cart.create') }}">
					@csrf
					<input type="hidden" name="type" value="item"/>
					<input type="hidden" name="vendor" value="{{ $vendorId }}"/>
					<input type="hidden" name="id" value="{{ $item->id }}"/>
					<div class="row mb-4">
						<div class="col-md-5">
							<div class="mt-md-5 mt-0 ms-md-5 ms-0 p-5">
								<img src='{{ "/images/branch-products/{$item->branch_id}/500x500/{$item->main_image}" }}' id="main-image" class="rounded img-fluid shadow-0" width="350" alt="Item Image" />
							</div>
						</div>
						<div class="col-md-7">
							<div class="p-2 pt-md-5 text-md-start text-center">
								<div>
									<h5 class="fw-bold fs-4 text-uppercase pb-2">
										{{ $item->name }}
									</h5>
									<div class="price vstack justify-content-center">
										<span class="fw-semibold">
											{{ session('currency')->symbol . $item->price }}
										</span>
									</div>
								</div>
								@if ($item->addons->count())
								<div class="my-4">
									<h6 class="fw-semibold py-2 text-uppercase">
										Extras / Add ons
									</h6>
									<div class="list-group list-group-flush gap-2">
										@foreach ($item->addons as $key => $addon)
										@php
											$addonInCart = collect(session("cart.item.$item->id.addons", []));
											$addonQuantity = $addonInCart->where('id', $addon->id)->pluck('quantity')->first() ?? 1;
											$checked = $addonInCart->contains('id', $addon->id);
										@endphp
											<label class="list-group-item d-flex justify-content-between pb-3">
												<span>
													<input
														class="form-check-input me-3"
														type="checkbox"
														name="addons[{{ $addon->id }}]"
														{{ $checked ? 'checked' : '' }}
													/>
													{{ $addon->name }}
												</span>
												<div class="row">
													<div class="col-lg-4 col-md-6">
														<input
															type="number"
															name="addon_quantities[{{ $addon->id }}]"
															class="form-control"
															min="1"
															value="{{ $addonQuantity }}"
														/>
													</div>
												</div>
												<span>
													{{ session('currency')->symbol . $addon->price }}
												</span>
											</label>
										@endforeach
									</div>
								</div>
								@endif
								<div class="d-flex align-items-center justify-content-md-start justify-content-center mt-4">
									<div class="me-3" style="width: 4rem">
										<label class="form-label visually-hidden" id="quantity">
											Quantity
										</label>
										<input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ old('quantity', array_key_exists($item->id, session()->get('cart.item', [])) ? session()->get('cart.item')[$item->id]['quantity'] : 1) }}" />
									</div>
									<button class="btn btn-danger text-uppercase px-3">
										{{ array_key_exists($item->id, session()->get('cart.item', [])) ? 'Update Cart' : 'Add To Cart' }}
									</button>
								</div>
								@if ($errors->has('quantity'))
								<div class="d-inline-block alert alert-danger border-2 alert-dismissible fade show mt-3 py-2" role="alert">
									<span>
										{{ $errors->first('quantity') }}
									</span>
									<button type="button" class="btn-close h-auto" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								{{-- <span class=" invalid-feedback alert alert-danger" role="alert">
									<strong>

									</strong>
								</span> --}}
								@endif
							</div>
						</div>
					</div>
				</form>
				<div class="row m-md-5 mt-1 py-4 rounded bg-secondary-subtle">
					<div class="col-lg-12 ps-5">
						<p class="fs-6 fw-semibold">
							{{ $item->discription ?? "No description." }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
