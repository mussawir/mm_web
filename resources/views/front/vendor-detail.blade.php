@extends('layouts.front')

@section('content')
	<section class="d-flex flex-column border-bottom border-secondary-subtle">
		<div class="section-container main-info">
			<nav class="bds-c-breadcrumbs main-info__breadcrumbs" id="breadcrumbs" aria-label="Breadcrumb">
				<ol class="bds-c-breadcrumbs__list">
					<li class="bds-c-breadcrumbs__list__item">
						<div class="bds-c-link-container">
							<a href="{{ route('home') }}" class="bds-c-link">
								Homepage
							</a>
						</div>
						<div class="bds-c-breadcrumbs__arrow">
							<x-icon name='chevron-right'/>
						</div>
					</li>
					<li class="bds-c-breadcrumbs__list__item">
						<div class="bds-c-link-container">
							<a href="/" class="bds-c-link current-city"></a>
						</div>
						<div class="bds-c-breadcrumbs__arrow">
							<x-icon name='chevron-right'/>
						</div>
					</li>
					<li class="bds-c-breadcrumbs__list__item bds-c-breadcrumbs__list__item--is-current-page">
						{{ $vendor->company_name }}
					</li>
				</ol>
			</nav>
			<div class="d-flex flex-column main-info__vendor-logo bg-neutral-surface position-relative sm:mr-sm md:mr-sm lg:mr-sm mr-md sm:mb-xs md:mb-xs lg:mb-xs xl:mb-xs mb-zero br-sm">
				<img
					src='{{ "/images/vendors/logos/$vendor->logo" }}'
					class="vendor-logo__image"
				/>
			</div>
			<ul class="main-info__characteristics">
				@foreach ($activeCategories as $category)
					<div class="box-flex info-items-dot-separator"></div>
					@if ($category->items->count() && $loop->iteration <= 5)
						<li class="characteristic-list-item">
							<span class="cl-neutral-secondary f-paragraph-small-font-size fw-paragraph-small-font-weight lh-paragraph-small-line-height ff-paragraph-small-font-family">
								{{ $category->name }}
							</span>
						</li>
					@endif
				@endforeach
			</ul>
			<button class="main-info__title border-0 m-0 p-0 bg-transparent">
				<h1 class="sm:f-title-medium-font-size md:f-title-medium-font-size lg:f-title-medium-font-size xl:f-title-large-font-size f-title-xlarge-font-size sm:fw-title-medium-font-weight md:fw-title-medium-font-weight lg:fw-title-medium-font-weight xl:fw-title-large-font-weight fw-title-xlarge-font-weight sm:lh-title-medium-line-height md:lh-title-medium-line-height lg:lh-title-medium-line-height xl:lh-title-large-line-height lh-title-xlarge-line-height sm:ff-title-medium-font-family md:ff-title-medium-font-family lg:ff-title-medium-font-family xl:ff-title-large-font-family ff-title-xlarge-font-family">
					{{ $vendor->company_name }}
				</h1>
			</button>
			{{-- <div class="box-flex main-info__tags ai-center fd-row mr-xs mt-xs">
				<div class="bds-c-tag bds-c-tag--size-standard bds-c-tag--variant-deal">
					<span class="bds-c-tag__label">20% off</span>
				</div>
			</div> --}}
			<button class="d-flex main-info__fees align-items-center fw-wrap position-relative mt-xs">
				<div class="d-flex align-items-center">
					<x-icon name='bicycle'/>
					<span class="fees-communication-content cl-neutral-primary f-label-small-font-size fw-label-small-font-weight lh-label-small-line-height ff-label-small-font-family ml-xxs">
						<span class="fees-communication-content f-label-small-font-size fw-label-small-font-weight lh-label-small-line-height ff-label-small-font-family">
							Free delivery above
							{{ session('currency')->symbol . $vendor->delivery_free_after }}
						</span>
					</span>
				</div>
				<div class="info-items-dot-separator"></div>
				<div class="d-flex align-items-center">
					<x-icon name='shopping-cart-two'/>
					<span class="fees-communication-content cl-neutral-primary f-label-small-font-size fw-label-small-font-weight lh-label-small-line-height ff-label-small-font-family ml-xxs">
						{{ session('currency')->symbol }}{{ $vendor->minimum_delivery_amount ?? 1 }} Minimum
					</span>
				</div>
			</button>
			<div class="d-flex align-items-center main-info__meta-information sm:jc-space-between jc-start sm:mt-xs md:mt-xs lg:mt-xs xl:mt-xs mt-xxs">
				<div class="d-flex align-items-center">
					<div class="d-flex flex-column pr-xs">
						<div class="d-flex align-items-center rating rating--star-type-full fw-nowrap">
							<x-icon name='rating-star'/>
							<span class="rating--label-primary cl-rating-tag-text f-label-small-font-size fw-label-small-font-weight lh-label-small-line-height ff-label-small-font-family">
								4.2/5
							</span>
							<span class="rating--label-secondary cl-neutral-secondary f-label-small-secondary-font-size fw-label-small-secondary-font-weight lh-label-small-secondary-line-height ff-label-small-secondary-font-family">
								(1000+)
							</span>
						</div>
					</div>
					<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-default">
						<button class="bds-c-btn bds-c-btn-text bds-c-btn--size-small bds-is-idle bds-c-btn--layout-default bds-c-btn--remove-side-spacing zi-surface-base">
							<span class="bds-c-btn__idle-content">
								<span class="bds-c-btn__idle-content__label">
									<span>See reviews</span>
								</span>
							</span>
						</button>
					</div>
				</div>
				<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-default">
					<button class="bds-c-btn bds-c-btn-text bds-c-btn--size-small bds-is-idle bds-c-btn--layout-default bds-c-btn--remove-side-spacing zi-surface-base">
						<span class="bds-c-btn__idle-content">
							<span class="bds-c-btn__idle-content__prefix">
								<span>
									<x-icon name='info'/>
								</span>
							</span>
							<span class="bds-c-btn__idle-content__label">
								<span>More info</span>
							</span>
						</span>
					</button>
				</div>
			</div>
			<div class="d-flex main-info__meta-interactive sm:mt-xs md:mt-xs lg:mt-xs xl:mt-xs mt-xxs"></div>
		</div>
	</section>

	@if ($deals->count())
	<section class="section-container offers-carousel-section">
		<div class="box-flex offers-carousel-inner-section">
			<div class="d-flex align-items-center justify-content-between">
				<div class="sm:f-title-small-font-size md:f-title-small-font-size lg:f-title-medium-secondary-font-size xl:f-title-large-secondary-font-size f-title-large-secondary-font-size sm:fw-title-small-font-weight md:fw-title-small-font-weight lg:fw-title-medium-secondary-font-weight xl:fw-title-large-secondary-font-weight fw-title-large-secondary-font-weight sm:lh-title-small-line-height md:lh-title-small-line-height lg:lh-title-medium-secondary-line-height xl:lh-title-large-secondary-line-height lh-title-large-secondary-line-height sm:ff-title-small-font-family md:ff-title-small-font-family lg:ff-title-medium-secondary-font-family xl:ff-title-large-secondary-font-family ff-title-large-secondary-font-family sm:my-st md:my-st my-xs fw-bold">
					Available deals
				</div>
			</div>
			<div class="lane-component webrefresh">
				<div class="lane-wrapper owl-carousel owl-theme deals-carousel {{ $deals->count() ? '' : 'd-none' }}" id="dealsCarousel">
					@foreach ($deals as $deal)
					<a
						href="javascript:void(0);"
						class="card rounded-4 m-3 ms-0"
						data-bs-toggle="modal"
						data-bs-target="#addToCartModal"
						data-item-type="deal"
						data-item-id="{{ $deal->id }}"
						data-vendor-id="{{ $vendor->id }}"
					>
						<div
							class="vstack position-relative card-img-bg"
							style="background-image: url('{{ "/images/vendors/{$deal->vendor_id}/deals/500x500/{$deal->banner}" }}');"
						>
						</div>
						<div class="card-body vstack justify-content-end">
							<h3 class="truncate product-tile__title cl-interaction-primary f-title-small-font-size fw-title-small-font-weight lh-title-small-line-height ff-title-small-font-family text-">
								<span class="vertical-align-middle">
									{{ $deal->name }}
								</span>
							</h3>
							<p class="cl-neutral-primary f-label-large-font-size fw-label-large-font-weight lh-label-large-line-height ff-label-large-font-family">
								{{ session('currency')->symbol . $deal->grand_total }}
							</p>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
	</section>
	@endif

	<div class="position-relative d-flex flex-column">
		<section id="vendor-details-navigation-container" class="vendor-details-navigation" style="top:64px;">
			<div class="d-flex align-items-center section-container my-zero">
				@if ($activeCategories->count())
				<div class="d-flex flex-column align-items-center justify-content-center menu-search h-100 mr-sm">
					<div class="d-flex search-input align-items-center">
						<div class="bds-c-search-input bds-c-search-input--size-small">
							<label class="bds-c-search-input__label">
								<span class="sr-only">Search</span>
								<input
									class="bds-c-search-input__field search-input__text-input"
									type="search"
									id="search-items"
									name="search-items"
									placeholder="Search in menu"
									autocomplete="off"
								/>
								<span class="bds-c-search-input__search-icon">
									<svg aria-hidden="true" focusable="false" class="fl-none" width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M9.96564 11.0259C9.13594 11.6381 8.11023 12 7 12C4.23858 12 2 9.76142 2 7C2 4.23858 4.23858 2 7 2C9.76142 2 12 4.23858 12 7C12 8.11026 11.6381 9.136 11.0259 9.96571C11.031 9.97051 11.036 9.97539 11.0409 9.98035L13.7803 12.7197C14.0732 13.0126 14.0732 13.4875 13.7803 13.7804C13.4874 14.0732 13.0125 14.0732 12.7196 13.7804L9.98029 11.041C9.97532 11.036 9.97044 11.031 9.96564 11.0259ZM10.5 7C10.5 8.933 8.933 10.5 7 10.5C5.067 10.5 3.5 8.933 3.5 7C3.5 5.067 5.067 3.5 7 3.5C8.933 3.5 10.5 5.067 10.5 7Z"></path>
									</svg>
								</span>
							</label>
						</div>
					</div>
				</div>
				<div class="category-tabs" id="category-tabs">
					<div class="bds-c-tabs position-relative" id="tabs">
						<div class="bds-c-tabs__container">
							<ul class="bds-c-tabs__list" aria-orientation="horizontal" id="tabs__tablist" role="tablist">
								@foreach ($activeCategories as $category)
								@if ($category->items->count())
								<li class="bds-c-tab {{ $loop->first ? 'is-selected' : '' }}" id="tabs__tab-0" role="presentation">
									<button
										class="scroll-to-category"
										data-target="{{ strtolower(str_replace(' ', '_', $category->name)) . $category->id }}"
										aria-labelledby="tabs__tab-0-label"
										aria-selected="true"
										role="tab"
									>
										<span class="bds-c-tab__label" id="tabs__tab-0-label">
											{{ $category->name . '(' . $category->items->count() . ')' }}
										</span>
									</button>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				@endif
			</div>
		</section>
		<section class="menu-section section-container" id="menu">
			<div class="menu">
				@foreach ($activeCategories as $category)
				<div class="d-flex flex-column dish-category-section category-div" id="{{ strtolower(str_replace(' ', '_', $category->name)) . $category->id }}">
					<div class="d-flex align-items-center dish-category-title-container">
						<h2 class="dish-category-title cl-neutral-primary sm:f-title-medium-font-size md:f-title-medium-font-size lg:f-title-medium-font-size xl:f-title-medium-font-size f-title-large-font-size sm:fw-title-medium-font-weight md:fw-title-medium-font-weight lg:fw-title-medium-font-weight xl:fw-title-medium-font-weight fw-title-large-font-weight sm:lh-title-medium-line-height md:lh-title-medium-line-height lg:lh-title-medium-line-height xl:lh-title-medium-line-height lh-title-large-line-height sm:ff-title-medium-font-family md:ff-title-medium-font-family lg:ff-title-medium-font-family xl:ff-title-medium-font-family ff-title-large-font-family">
							{{ $category->name }}
						</h2>
					</div>
					<ul class="dish-list-grid">
						@foreach ($category->items->sortBy('sort_by') as $item)
						<li class="position-relative d-flex product-tile pa-st">
							<button
								class="product-tile__button-overlay absolute-fill-parent"
								style="border:1px solid transparent;background-color:rgba(0,0,0,0)"
								type="button"
								data-bs-toggle="modal"
								data-bs-target="#addToCartModal"
								data-item-type="item"
								data-item-id="{{ $item->id }}"
								data-vendor-id="{{ $vendor->id }}"
							></button>
							<div class="absolute-fill-parent product-tile__animation-overlay"></div>
							<div class="d-flex flex-column justify-content-between grow respect-flex-parent-width">
								<div>
									<h3 class="text-truncate product-tile__title cl-neutral-primary f-title-small-font-size fw-title-small-font-weight lh-title-small-line-height ff-title-small-font-family">
										<span class="align-middle item-title cl-interaction-primary">
											{{ $item->name }}
										</span>
									</h3>
									<p class="product-tile__description cl-neutral-secondary f-paragraph-small-font-size fw-paragraph-small-font-weight lh-paragraph-small-line-height ff-paragraph-small-font-family mt-xs">
										{{ substr($item->discription, 0, 50) }}
									</p>
								</div>
								<div class="d-flex align-items-center product-tile__price-row fw-wrap mt-xs">
									<p class="cl-neutral-primary f-label-large-font-size fw-label-large-font-weight lh-label-large-line-height ff-label-large-font-family">
										{{ session('currency')->symbol . $item->price }}
									</p>
									@if ($item->price > 9)
									<div class="bds-c-tag bds-c-tag--size-standard bds-c-tag--variant-primary">
										<x-icon name='popular'/>
										<span class="bds-c-tag__label">
											Popular
										</span>
									</div>
									@endif
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
												data-vendor-id="{{ $vendor->id }}"
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
				@endforeach
			</div>
		</section>
	</div>
	@include('modals.vendor-info')
	@include('modals.add-to-cart')
@endsection

@section('js')
<script>
	document.addEventListener('DOMContentLoaded', () => {
		const currentCity = document.querySelector('.current-city');
		const scrollToCategoryButtons = document.querySelectorAll('.scroll-to-category');

		currentCity.textContent = localStorage.getItem('cityName');

		document.getElementById("search-items").addEventListener("input", performSearch);

		$('#addToCartModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);

			var itemId = button.data('item-id');
			var itemType = button.data('item-type');
			var vendorId = button.data('vendor-id');

			// Update the modal content here using itemId and itemType
			loadItemDetails(vendorId, itemId, itemType);
		});

		scrollToCategoryButtons.forEach(function (button) {
			button.addEventListener('click', function () {
				const targetId = button.getAttribute('data-target');

				const targetElement = document.getElementById(targetId);

				if (targetElement) {
					let parentUl = button.closest('ul');
					let allListItems = parentUl.querySelectorAll('li');

					allListItems.forEach(function (li) {
						li.classList.remove('is-selected');
					});

					button.parentElement.classList.add('is-selected');
					
					let rect = targetElement.getBoundingClientRect();
					let scrollPosition = window.scrollY + rect.top - 130;

					window.scrollTo({
						top: scrollPosition,
						behavior: 'smooth',
					});
				}
			});
		});
	});

	function performSearch() {
		const searchQuery = document.getElementById("search-items").value.toLowerCase();

		// Get all food items that can be searched
		const foodItems = document.querySelectorAll(".item-title");

		// Create an object to track categories and their matching item counts
		const categoryCounts = {};

		// Loop through the food items and hide/show based on search query
		foodItems.forEach(item => {
			const itemName = item.textContent.trim().toLowerCase();
			const shouldDisplay = itemName.includes(searchQuery);
			const categoryDiv = item.closest(".dish-category-section");

			// item.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = shouldDisplay ? "flex" : "none";

			if (categoryDiv) {
				// Initialize the count for this category if not already
				categoryCounts[categoryDiv.id] = categoryCounts[categoryDiv.id] || 0;

				if (shouldDisplay) {
					// If an item matches, increment the count for its category
					categoryCounts[categoryDiv.id]++;
				}

				// item.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.style.display = shouldDisplay ? "flex" : "none";
			}
		});

		// Loop through categories and hide those with no matching items
		for (const categoryID in categoryCounts) {
			if (categoryCounts[categoryID] === 0) {
				document.getElementById(categoryID).classList.remove('d-flex');
				document.getElementById(categoryID).classList.add('d-none');
			} else {
				document.getElementById(categoryID).classList.add('d-flex');
				document.getElementById(categoryID).classList.remove('d-none');
			}
		}
	}

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
					$('#addToCartModal .product-price').html(currency + data.item.price);
					$('#addToCartModal .product-information-image').attr('src', '/images/vendors/' + data.item.vendor_id + '/items/500x500/' + data.item.main_image);

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
		else if (itemType === 'deal') {
			$.ajax({
				url: `/vendor/${vendorId}/deals/detail/${itemId}`,
				method: 'GET',
				success: function (data) {
					const currency = @json(session('currency.symbol'));

					$('input[name="type"]').val(itemType);
					$('input[name="vendor"]').val(vendorId);
					$('input[name="id"]').val(itemId);

					$('#addToCartModal .modal-title').html(data.deal.name);
					$('#addToCartModal .product-information-title').html(data.deal.name);
					$('#addToCartModal .product-description').html(data.deal.description);
					$('#addToCartModal .product-price').html(currency + data.deal.grand_total);
					$('#addToCartModal .product-information-image').attr('src', '/images/deal-banners/' + data.deal.branch_id + '/500x500/' + data.deal.banner);

					// Clear existing options
					$('.deal-options').empty();

					data.deal.items.forEach(function (item) {
						if (item.quantity > 1) {
							for (let i = 1; i <= item.quantity; i++) {
								const heading = $(`<div class="d-flex justify-content-between align-items-center mb-2">
									<h6>
										Choose your
										${i === 1 ? '1st' : i === 2 ? '2nd' : i === 3 ? '3rd' : i + 'th'}
										${item.item_type_name ?? item.item.name}
									</h6>
								</div>`);

								const list = $(`<ul class="list-group ${i !== item.quantity ? 'mb-3' : ''}"></ul>`);

								item.deal_options.forEach(function (option) {
									const listItem = `<li class="list-group-item d-flex justify-content-between align-items-center bg-secondary-subtle">
										<div class="form-check">
											<input
												class="form-check-input"
												type="radio"
												id="option_${option.id}_${i}"
												name="options[${item.id}][${i}]"
												value="${option.id}"
											/>
											<label class="form-check-label" for="option_${option.id}_${i}">
												${option.item.name}
											</label>
										</div>
										<span>
											${(option.deal_price != 0) ? currency + option.deal_price : 'Free'}
										</span>
									</li>`;

									list.append(listItem);
								});

								$('.deal-options').append(heading);
								$('.deal-options').append(list);
							}
						}
						else {
							const heading = $(`<div class="d-flex justify-content-between align-items-center mb-2">
								<h6>
									Choose your
									${item.item_type_name ?? item.item.name}
								</h6>
							</div>`);

							const list = $(`<ul class="list-group"></ul>`);

							item.deal_options.forEach(function (option) {
								const listItem = `<li class="list-group-item d-flex justify-content-between align-items-center bg-secondary-subtle">
									<div class="form-check">
										<input
											class="form-check-input"
											type="radio"
											id="option_${option.id}"
											name="options[${item.id}]"
											value="${option.id}"
										/>
										<label class="form-check-label" for="option_${option.id}">
											${option.item.name}
										</label>
									</div>
									<span>
										${(option.deal_price != 0 ) ? currency + option.deal_price : 'Free'}
									</span>
								</li>`;

								list.append(listItem);
							});

							$('.deal-options').append(heading);
							$('.deal-options').append(list);
						}
					});

					if (data.deal.addons.length) {
						// Clear existing addons
						$('#addToCartModal .addons-list-group').empty();

						// Iterate through addons and append to modal
						data.deal.addons.forEach(function (addon) {
							const addonHtml = `
								<label class="list-group-item list-group-item-secondary rounded-1 d-flex align-items-center justify-content-between pb-2 small">
									<span class="d-flex align-items-center">
										<input
											class="form-check-input me-2 mt-0"
											type="checkbox"
											name="addons[${addon.item.id}]"
										/>
										<span class="fw-semibold lh-paragraph-small-line-height ff-paragraph-small-font-family">
											${addon.item.name}
										</span>
									</span>
									<div class="d-flex align-items-center justify-content-end gap-2">
										<div class="d-inline-flex justify-content-end">
											<input
												type="number"
												name="addon_quantities[${addon.item.id}]"
												class="form-control"
												min="1"
												value="1"
												style="width:30%!important;"
											/>
										</div>
										<span class="d-inline-flex fw-semibold lh-paragraph-small-line-height ff-paragraph-small-font-family">
										${currency + addon.item.price}
									</span>
									</div>
								</label>
							`;

							$('#addToCartModal .addons-list-group').append(addonHtml);
						});
						// Show the div
						$('#addToCartModal .extras-section').show();
					} else {
						// Hide or empty the div if no addons
						$('#addToCartModal .addons-list-group').empty();
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
@endsection
