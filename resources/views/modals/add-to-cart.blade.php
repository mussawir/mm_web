{{-- Add To Cart Modal - Start --}}
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="addToCartModalLabel"></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="cart-form" method="POST" action="{{ route('cart.create') }}">
				@csrf
				<input type="hidden" name="type" value=""/>
				<input type="hidden" name="vendor" value=""/>
				<input type="hidden" name="id" value=""/>
				<div class="modal-body">
					<div class="d-flex flex-column px-sm">
						<picture class="product-information-picture" style="background-image: url('');">
							<img class="product-information-image rounded"/>
						</picture>
						<div class="d-flex flex-column item-modifier-product-information btm-neutral-border mt-md mb-lg">
							<h2 class="product-information-title grow cl-neutral-primary sm:f-title-medium-font-size f-title-large-font-size sm:fw-title-medium-font-weight fw-title-large-font-weight sm:lh-title-medium-line-height lh-title-large-line-height sm:ff-title-medium-font-family ff-title-large-font-family ma-zero"></h2>
							<p class="cl-neutral-primary f-paragraph-small-font-size fw-paragraph-small-font-weight lh-paragraph-small-line-height ff-paragraph-small-font-family ma-zero pt-xxs pb-sm product-description">
								{{-- 1-2 person serving --}}
							</p>
							{{-- <span class="no-shrink strike-through cl-neutral-inactive f-title-small-font-size fw-title-small-font-weight lh-title-small-line-height ff-title-small-font-family product-discount">
								Rs. 520
							</span> --}}
							<div class="d-flex justify-content-between align-items-start pb-sm">
								<span class="no-shrink cl-neutral-primary f-title-medium-font-size fw-title-medium-font-weight lh-title-medium-line-height ff-title-medium-font-family product-price"></span>
							</div>
						</div>
						<section class="deal-options-section d-flex flex-column required-list invalid-section guided-required-section position-relative mb-lg px-xs pt-md pb-xs br-sm bc-neutral-border">
							<div class="d-flex justify-content-between px-xs">
								<h3 class="cl-neutral-primary f-title-medium-font-size fw-title-medium-font-weight lh-title-medium-line-height ff-title-medium-font-family">
									Options
								</h3>
								{{-- <div class="guided-required-section__tags"></div> --}}
							</div>
							<div class="row mb-4">
								<div class="col-lg-12 deal-options">
								</div>
							</div>
						</section>
						<section class="extras-section">
							<h6 class="fw-semibold py-2">
								Extras / Add ons
							</h6>
							<div class="list-group addons-list-group list-group-flush gap-2"></div>
						</section>
						{{-- <div class="product-order-actions">
							<div class="product-special-instructions">
								<h3 class="cl-neutral-primary f-title-medium-font-size fw-title-medium-font-weight lh-title-medium-line-height ff-title-medium-font-family ma-zero">
									Special instructions
								</h3>
								<p class="cl-neutral-primary f-paragraph-small-font-size fw-paragraph-small-font-weight lh-paragraph-small-line-height ff-paragraph-small-font-family mb-sm">
									Any specific preferences? Let the restaurant know.
								</p>
								<div class="input-box product-special-instructions-textarea">
									<textarea class="valid" placeholder="e.g. No sauce please"></textarea>
								</div>
							</div>
							<div class="product-sold-out-options"></div>
						</div> --}}
					</div>
				</div>
				<div class="modal-footer">
					<div class="d-flex w-100">
						<div class="bds-c-quantity-stepper bds-c-quantity-stepper--size-small bds-c-quantity-stepper--variant-button mr-sm">
							<div class="bds-c-btn-cursor">
								<button type="button" class="bds-c-btn bds-c-btn-circular bds-c-btn-circular-basic bds-c-btn-circular--size-medium zi-surface-base bds-c-quantity-stepper__button bds-c-quantity-stepper__button--decrement" onclick="decrementQuantity()">
									<span class="bds-c-quantity-stepper__button-wrap">
										<svg aria-hidden="false" focusable="false" class="bds-c-quantity-stepper__button--minus" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="quantity-stepper-minus-icon">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M18.25 11C18.6642 11 19 11.3358 19 11.75C19 12.1297 18.7178 12.4435 18.3518 12.4932L18.25 12.5H5.75C5.33579 12.5 5 12.1642 5 11.75C5 11.3703 5.28215 11.0565 5.64823 11.0068L5.75 11H18.25Z"></path>
										</svg>
									</span>
								</button>
							</div>
							<div class="bds-c-quantity-stepper__quantity bds-c-quantity-stepper__quantity--decrementing f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family">
								<label class="form-label visually-hidden" for="quantity">
									Quantity
								</label>
								<input type="number" name="quantity" id="quantityInput" class="form-control w-75" min="1" />
							</div>
							<div class="bds-c-btn-cursor">
								<button type="button" class="bds-c-btn bds-c-btn-circular bds-c-btn-circular-basic bds-c-btn-circular--size-medium zi-surface-base bds-c-quantity-stepper__button bds-c-quantity-stepper__button--increment" onclick="incrementQuantity()">
									<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="quantity-stepper-plus-icon">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12 5C12.3797 5 12.6935 5.28215 12.7432 5.64823L12.75 5.75V10.85C12.75 11.0709 12.9291 11.25 13.15 11.25H18.25C18.6642 11.25 19 11.5858 19 12C19 12.3797 18.7178 12.6935 18.3518 12.7432L18.25 12.75H13.15C12.9291 12.75 12.75 12.9291 12.75 13.15V18.25C12.75 18.6642 12.4142 19 12 19C11.6203 19 11.3065 18.7178 11.2568 18.3518L11.25 18.25V13.15C11.25 12.9291 11.0709 12.75 10.85 12.75H5.75C5.33579 12.75 5 12.4142 5 12C5 11.6203 5.28215 11.3065 5.64823 11.2568L5.75 11.25H10.85C11.0709 11.25 11.25 11.0709 11.25 10.85V5.75C11.25 5.33579 11.5858 5 12 5Z"></path>
									</svg>
								</button>
							</div>
						</div>
						<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-full-width-primary">
							<button class="bds-c-btn bds-c-btn-primary bds-c-btn--size-regular bds-is-idle bds-c-btn--layout-full-width-primary zi-surface-base item-modifier-add-to-cart-button ">
								<span class="bds-c-btn__idle-content">
									<span class="bds-c-btn__idle-content__label">
										<span>
											<span>
												Add to cart
											</span>
										</span>
									</span>
								</span>
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
{{-- Add To Cart Modal - End --}}

@push('scripts')
<script>
	function incrementQuantity() {
		var input = document.getElementById('quantityInput');
		var currentValue = parseInt(input.value);
		input.value = currentValue + 1;
	}

	function decrementQuantity() {
		var input = document.getElementById('quantityInput');
		var currentValue = parseInt(input.value);
		if (currentValue > 1) {
			input.value = currentValue - 1;
		}
	}
</script>
@endpush