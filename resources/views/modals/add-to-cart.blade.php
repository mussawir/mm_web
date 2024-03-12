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
							<div class="bds-c-btn-cursor bds-is-disabled">
								<button class="bds-c-btn bds-c-btn-circular bds-is-disabled bds-c-btn-circular-basic bds-c-btn-circular--size-medium zi-surface-base bds-c-quantity-stepper__button bds-c-quantity-stepper__button--decrement">
									<span class="bds-c-quantity-stepper__button-wrap">
										{{-- <svg aria-hidden="true" focusable="false" class="bds-c-quantity-stepper__button--bin" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="quantity-stepper-trash-icon">
											<path d="M10.55 16.9C10.1358 16.9 9.8 16.5663 9.8 16.1547L9.8 9.84534C9.8 9.4337 10.1358 9.1 10.55 9.1C10.9642 9.1 11.3 9.4337 11.3 9.84534L11.3 16.1547C11.3 16.5663 10.9642 16.9 10.55 16.9Z"></path>
											<path d="M13.45 16.9C13.0358 16.9 12.7 16.5663 12.7 16.1547L12.7 9.84534C12.7 9.4337 13.0358 9.1 13.45 9.1C13.8642 9.1 14.2 9.4337 14.2 9.84534L14.2 16.1547C14.2 16.5663 13.8642 16.9 13.45 16.9Z"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M20 7.05C20 7.46421 19.6663 7.8 19.2547 7.8H18.7206C18.5225 7.8 18.3543 7.94499 18.325 8.1409L16.7584 18.6281C16.6406 19.4167 15.968 20 15.1762 20H8.82376C8.03205 20 7.35938 19.4167 7.24157 18.6281L5.675 8.1409C5.64573 7.94499 5.47748 7.8 5.27938 7.8H4.74534C4.3337 7.8 4 7.46421 4 7.05C4 6.63579 4.3337 6.3 4.74534 6.3H19.2547C19.6663 6.3 20 6.63579 20 7.05ZM16.354 7.8H7.64599C7.40874 7.80366 7.22618 8.01248 7.25533 8.2489L8.50069 18.3489C8.52541 18.5494 8.6957 18.7 8.89768 18.7H15.1023C15.3043 18.7 15.4745 18.5494 15.4993 18.3489L16.7446 8.2489C16.7738 8.01248 16.5912 7.80366 16.354 7.8Z"></path>
											<path fill-rule="evenodd" clip-rule="evenodd" d="M8 3.75C8 3.33579 8.31603 3 8.70588 3H15.2941C15.684 3 16 3.33579 16 3.75C16 4.16421 15.684 4.5 15.2941 4.5H8.70588C8.31603 4.5 8 4.16421 8 3.75Z"></path>
										</svg> --}}
										<svg aria-hidden="false" focusable="false" class="bds-c-quantity-stepper__button--minus" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="quantity-stepper-minus-icon">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M18.25 11C18.6642 11 19 11.3358 19 11.75C19 12.1297 18.7178 12.4435 18.3518 12.4932L18.25 12.5H5.75C5.33579 12.5 5 12.1642 5 11.75C5 11.3703 5.28215 11.0565 5.64823 11.0068L5.75 11H18.25Z"></path>
										</svg>
									</span>
								</button>
							</div>
							<div class="bds-c-quantity-stepper__quantity bds-c-quantity-stepper__quantity--decrementing f-label-medium-font-size fw-label-medium-font-weight lh-label-medium-line-height ff-label-medium-font-family">
								<label class="form-label visually-hidden" id="quantity">
									Quantity
								</label>
								<input type="number" name="quantity" id="quantity" class="form-control w-75" min="1" />
							</div>
							<div class="bds-c-btn-cursor">
								<button class="bds-c-btn bds-c-btn-circular bds-c-btn-circular-basic bds-c-btn-circular--size-medium zi-surface-base bds-c-quantity-stepper__button bds-c-quantity-stepper__button--increment">
									<svg aria-hidden="true" focusable="false" class="fl-none" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-testid="quantity-stepper-plus-icon">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M12 5C12.3797 5 12.6935 5.28215 12.7432 5.64823L12.75 5.75V10.85C12.75 11.0709 12.9291 11.25 13.15 11.25H18.25C18.6642 11.25 19 11.5858 19 12C19 12.3797 18.7178 12.6935 18.3518 12.7432L18.25 12.75H13.15C12.9291 12.75 12.75 12.9291 12.75 13.15V18.25C12.75 18.6642 12.4142 19 12 19C11.6203 19 11.3065 18.7178 11.2568 18.3518L11.25 18.25V13.15C11.25 12.9291 11.0709 12.75 10.85 12.75H5.75C5.33579 12.75 5 12.4142 5 12C5 11.6203 5.28215 11.3065 5.64823 11.2568L5.75 11.25H10.85C11.0709 11.25 11.25 11.0709 11.25 10.85V5.75C11.25 5.33579 11.5858 5 12 5Z"></path>
									</svg>
								</button>
							</div>
						</div>
						<div class="bds-c-btn-cursor bds-c-btn-cursor--layout-full-width-primary">
							{{-- <div class="me-3" style="width: 4rem">
								<label class="form-label visually-hidden" id="quantity">
									Quantity
								</label>
								<input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ old('quantity', array_key_exists($item->id, session()->get('cart.item', [])) ? session()->get('cart.item')[$item->id]['quantity'] : 1) }}" />
							</div> --}}
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
					{{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
						Close
					</button> --}}
					{{-- <button type="button" class="btn btn-primary">
						Save changes
					</button> --}}
				</div>
			</form>
		</div>
	</div>
</div>
{{-- Add To Cart Modal - End --}}