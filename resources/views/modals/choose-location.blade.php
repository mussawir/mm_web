{{-- Modal - Start --}}
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-body d-flex justify-content-center">
				<div class="vstack align-items-center">
					<img
						src="{{ asset('assets/images/avatars/mazamax.svg') }}"
						class="img-fluid w-25"
						alt="Mazaa Max"
					/>
					<div class="card-body w-75 mt-4">
						<div class="d-flex align-items-center justify-content-center gap-3">
							<div class="d-flex">
								<input
									type="radio"
									class="btn-check"
									name="deliveryPickupOption"
									id="delivery"
									value="delivery"
									autocomplete="off"
								/>
								<label class="btn bds-c-tab__label border-2" for="delivery">Delivery</label>
							</div>
							<div class="d-flex">
								<input
									type="radio"
									class="btn-check"
									name="deliveryPickupOption"
									id="pickup"
									value="pickup"
									autocomplete="off"
								/>
								<label class="btn bds-c-tab__label border-2" for="pickup">Pickup</label>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<label for="address_address" class="form-label">
									Address
								</label>
								<div class="input-group mb-3">
									<input
										type="text"
										class="form-control map-input"
										id="address-input"
										name="address_address"
									/>
									<button id="locate-me" class="btn btn-outline-secondary">
										<i class="fa-solid fa-location-crosshairs"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-md-12">
								<div class="w-100" id="address-map-container" style="height:400px;">
									<div class="h-100" id="address-map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-center mb-4 mx-5">
				<button type="button" class="btn btn-primary save-option px-5" onclick="saveOption()">
					Select
				</button>
			</div>
		</div>
	</div>
</div>
{{-- Modal - End --}}