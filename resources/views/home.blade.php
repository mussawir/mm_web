@extends('layouts.front')

@section('content')
<div class="container">
	@if ($categories->count())
	<div class="m-2 p-2">
		{{-- <h3>
			All
		</h3> --}}
		{{-- @livewire('search-vendors') --}}
	</div>
	@endif
	<div class="d-flex flex-wrap" id="vendorContent">
		<section class="menu-section section-container" id="menu">
			<div class="menu">
				<div class="d-flex flex-column dish-category-section category-div">
					{{-- <div class="d-flex align-items-center dish-category-title-container">
						<h2 class="dish-category-title cl-neutral-primary sm:f-title-medium-font-size md:f-title-medium-font-size lg:f-title-medium-font-size xl:f-title-medium-font-size f-title-large-font-size sm:fw-title-medium-font-weight md:fw-title-medium-font-weight lg:fw-title-medium-font-weight xl:fw-title-medium-font-weight fw-title-large-font-weight sm:lh-title-medium-line-height md:lh-title-medium-line-height lg:lh-title-medium-line-height xl:lh-title-medium-line-height lh-title-large-line-height sm:ff-title-medium-font-family md:ff-title-medium-font-family lg:ff-title-medium-font-family xl:ff-title-medium-font-family ff-title-large-font-family">
							{{ $category->name }}
						</h2>
					</div> --}}
					<ul class="dish-list-grid">
						@foreach ($items as $item)
						<li class="position-relative d-flex product-tile pa-st">
							<button
								class="product-tile__button-overlay absolute-fill-parent"
								style="border:1px solid transparent;background-color:rgba(0,0,0,0)"
								type="button"
								data-bs-toggle="modal"
								data-bs-target="#addToCartModal"
								data-item-type="item"
								data-item-id="{{ $item->id }}"
								data-vendor-id="{{ $item->vendor_id }}"
							></button>
							<div class="absolute-fill-parent product-tile__animation-overlay"></div>
							<div class="d-flex flex-column justify-content-between grow respect-flex-parent-width">
								<div>
									<h3 class="text-truncate product-tile__title cl-neutral-primary f-title-small-font-size fw-title-small-font-weight lh-title-small-line-height ff-title-small-font-family">
										<span class="align-middle item-title cl-interaction-primary">
											{{ ucwords(strtolower($item->name)) }}
										</span>
									</h3>
									<p class="product-tile__description cl-neutral-secondary f-paragraph-small-font-size fw-paragraph-small-font-weight lh-paragraph-small-line-height ff-paragraph-small-font-family mt-xs">
										{{ substr($item->discription, 0, 50) }}
									</p>
								</div>
								<div class="d-flex align-items-center product-tile__price-row fw-wrap mt-xs">
									<p class="cl-neutral-primary f-label-large-font-size fw-label-large-font-weight lh-label-large-line-height ff-label-large-font-family">
										{{ session('currency')->symbol . ' ' . intval($item->price) }}
									</p>
									{{-- @if ($item->price < 500) --}}
									<div class="bds-c-tag bds-c-tag--size-standard bds-c-tag--variant-primary">
										{{-- <x-icon name='popular'/> --}}
										<span class="bds-c-tag__label">
											{{ $item->category->name }}
										</span>
									</div>
									{{-- @endif --}}
								</div>
							</div>
							<div class="d-flex flex-column product-tile__right-side-wrapper no-shrink ml-st gap-1">
								<picture class="product-tile__image">
									@php
										$img150 = asset("/images/vendors/{$item->vendor_id}/items/150x150/{$item->main_image}");
									@endphp
									<div class="lazy-loaded-dish-photo" style="background-image: url({{ $img150 }});"></div>
								</picture>
								<div class="d-flex flex-column product-tile__quick-add-to-cart mr-xxs mb-xxs">
									<div class="bds-c-quantity-stepper bds-c-quantity-stepper--size-small bds-c-quantity-stepper--variant-input bds-c-quantity-stepper--elevated bds-c-quantity-stepper--right-aligned rdp-quantity-stepper" aria-expanded="false">
										<div class="bds-c-btn-cursor">
											<button
												class="bds-c-btn bds-c-btn-circular bds-c-btn-circular-basic bds-c-btn-circular--size-medium zi-surface-base bds-c-quantity-stepper__button bds-c-quantity-stepper__button--idle"
												type="button"
												data-bs-toggle="modal"
												data-bs-target="#addToCartModal"
												data-item-type="item"
												data-item-id="{{ $item->id }}"
												{{-- data-vendor-id="{{ $vendor->id }}" --}}
											>
												<x-icon name='plus'/>
											</button>
										</div>
									</div>
								</div>
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</section>

		{{-- Old Section Borrowed From Vendor View Start --}}
		{{-- @forelse ($items as $item)
			<div
				{{-- x-show="(categoryTab === 'all' || categoryTab === '{{ strtolower($item->category->name . '-' . $item->category->id) }}')" --}}
				{{-- class="vendor-title col-12 col-lg-3 col-md-6 px-2"
			>
				<div class="overflow-hidden mw-100 rounded-4 shadow-lg my-3 position-relative border border-secondary-subtle">
					<a href="{{ route('vendor.detail', $item->id) }}">
						<div class="rounded-3 position-relative">
							<div class="d-flex align-items-center justify-content-center overflow-hidden" style="aspect-ratio: 16/9;border-top-left-radius:12px;border-top-right-radius:12px;background-color:#f7f7f7;">
								<img src="{{ "/images/vendors/{$item->vendor_id}/items/500x500/{$item->main_image}" }}" class="card-img-bg position-relative" loading="lazy" style="object-fit:contain;" />
							</div>
						</div>
						<div class="d-flex flex-column" style="margin:12px;">
							<div class="mb-1 d-flex align-items-center fw-semibold fs-6 cl-neutral-primary justify-content-between">
								<div class="vendor-name f-title-small-font-size fw-title-small-font-weight lh-title-small-line-height ff-title-small-font-family">
									{{ $item->name }}
								</div>
								{{-- Condition for logged in customer and if customer has this vendor as favourite
								<i class="fa-solid fa-heart text-primary"></i> --}}
							{{-- </div>
							<div class="ms-0 d-block text-truncate" style="line-height:16px;color:#666666;margin-right:unset;">
								<div class="fw-semibold fs-7 align-middle d-inline" style="margin-right:2px;color:#666666;">
								</div>
								<div class="fw-semibold d-inline fs-7 align-middle" style="margin-right:2px;color:#666666;">
									<div class="fw-semibold d-inline fs-7">
										{{ $item->category->name }}
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		@empty
		<h3 class="m-3 p-3">
			Inventory is empty
		</h3>
		@endforelse --}}
		{{-- Old Section Borrowed From Vendor View End --}}
	</div>
</div>
@include('modals.add-to-cart')
@endsection

@push('scripts')
<script>
	document.addEventListener('DOMContentLoaded', () => {
		// const currentCity = document.querySelector('.current-city');
		// const scrollToCategoryButtons = document.querySelectorAll('.scroll-to-category');
		const cartForm = document.querySelector('.cart-form');

		// currentCity.textContent = localStorage.getItem('address');
		// document.getElementById("search-items").addEventListener("input", performSearch);

		$('#addToCartModal').on('show.bs.modal', function (event) {
			let button = $(event.relatedTarget);
			let itemId = button.data('item-id');
			let itemType = button.data('item-type');
			let vendorId = button.data('vendor-id');

			// Update the modal content here using itemId and itemType
			loadItemDetails(vendorId, itemId, itemType);
		});

		// const favouriteVendor = document.querySelector('.favourite-vendor');
		// favouriteVendor.addEventListener('click', function (event) {
		// 	alert ('Make this vendor favourite');
		// });

		cartForm.addEventListener('submit', function (event) {
			let sessionVendor = @json(session('vendor'));
			let cartVendor = cartForm.querySelector('input[name="vendor"]').value;

			if (sessionVendor) {
				if (sessionVendor != cartVendor) {
					let confirmation = confirm('There are items in cart from different vendor. Do you want to clear cart?');

					if (! confirmation) {
						event.preventDefault();
					}
				}
			}
		});

		// scrollToCategoryButtons.forEach(function (button) {
		// 	button.addEventListener('click', function () {
		// 		const targetId = button.getAttribute('data-target');
		// 		const targetElement = document.getElementById(targetId);

		// 		if (targetElement) {
		// 			let parentUl = button.closest('ul');
		// 			let allListItems = parentUl.querySelectorAll('li');

		// 			allListItems.forEach(function (li) {
		// 				li.classList.remove('is-selected');
		// 			});

		// 			button.parentElement.classList.add('is-selected');
	
		// 			let rect = targetElement.getBoundingClientRect();
		// 			let scrollPosition = window.scrollY + rect.top - 130;

		// 			window.scrollTo({
		// 				top: scrollPosition,
		// 				behavior: 'smooth',
		// 			});
		// 		}
		// 	});
		// });
	});

	// function performSearch() {
	// 	const searchQuery = document.getElementById("search-items").value.toLowerCase();
	// 	const foodItems = document.querySelectorAll(".item-title");
	// 	const categoryCount = {};

	// 	foodItems.forEach(item => {
	// 		const itemName = item.textContent.trim().toLowerCase();
	// 		const shouldDisplay = itemName.includes(searchQuery);
	// 		const dishSection = item.closest(".dish-category-section");
	// 		const productTile = item.closest('li.product-tile');

	// 		if (shouldDisplay) {
	// 			productTile.classList.remove('d-none');
	// 			productTile.classList.add('d-flex');
	// 		} else {
	// 			productTile.classList.remove('d-flex');
	// 			productTile.classList.add('d-none');
	// 		}

	// 		if (dishSection) {
	// 			categoryCount[dishSection.id] = categoryCount[dishSection.id] || 0;

	// 			if (shouldDisplay) {
	// 				categoryCount[dishSection.id]++;
	// 			}
	// 		}
	// 	});

	// 	for (let id in categoryCount) {
	// 		if (categoryCount[id] === 0) {
	// 			document.getElementById(id).classList.remove('d-flex');
	// 			document.getElementById(id).classList.add('d-none');
	// 		} else {
	// 			document.getElementById(id).classList.remove('d-none');
	// 			document.getElementById(id).classList.add('d-flex');
	// 		}
	// 	}
	// }

	function loadItemDetails(vendorId, itemId, itemType) {
		const itemQuantity = 1;

		if (itemType === 'item') {
			$.ajax({
				url: `/vendor/${vendorId}/items/detail/${itemId}`,
				method: 'GET',
				success: function (data) {
					const currency = @json(session('currency.symbol'));

					$('input[name="type"]').val(itemType);
					$('input[name="vendor"]').val(vendorId);
					$('input[name="id"]').val(itemId);

					$('#addToCartModal .modal-title').html(data.item.name);

					$('#addToCartModal .product-information-title').html(data.item.name);

					$('#addToCartModal .product-description').html(data.item.discription);

					$('#addToCartModal .product-price').html(currency + ' ' + parseInt(data.item.price));

					$('#addToCartModal .product-information-image').attr('src', '/images/vendors/' + data.item.vendor_id + '/items/500x500/' + data.item.main_image);

					$('#addToCartModal .deal-options-section').hide();
					$('#addToCartModal .deal-options-section').find('*').hide();

					if (data.item.addons.length) {
						// Clear existing addons
						$('#addToCartModal .list-group').empty();

						// Iterate through addons and append to modal
						data.item.addons.forEach(function (addon) {
							const addonHtml = `
								<label class="list-group-item list-group-item-secondary rounded-1 d-flex align-items-center justify-content-between pb-2 small">
									<span class="d-flex align-items-center">
										<input
											class="form-check-input me-2 mt-0"
											type="checkbox"
											name="addons[${addon.id}]"
										/>
										<span class="fw-semibold lh-paragraph-small-line-height ff-paragraph-small-font-family">
											${addon.name}
										</span>
									</span>
									<div class="d-flex align-items-center justify-content-end gap-2">
										<div class="d-inline-flex justify-content-end">
											<input
												type="number"
												name="addon_quantities[${addon.id}]"
												class="form-control"
												min="1"
												value="1"
												style="width:30%!important;"
											/>
										</div>
										<span class="d-inline-flex fw-semibold lh-paragraph-small-line-height ff-paragraph-small-font-family">
										${currency + addon.price}
									</span>
									</div>
								</label>
							`;

							$('#addToCartModal .list-group').append(addonHtml);
						});

						// Show the div

						$('#addToCartModal .extras-section').show();

					} else {
						// Hide or empty the div if no addons
						$('#addToCartModal .list-group').empty();
						$('#addToCartModal .extras-section').hide();
					}
					$('input[name="quantity"]').val(itemQuantity);
				},
				error: function (error) {
					console.error('Error fetching item details:', error);
				}
			});
		}
	}
</script>
@endpush