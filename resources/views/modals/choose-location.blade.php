{{-- Modal - Start --}}
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body mt-5 d-flex justify-content-center">
				<div class="vstack align-items-center">
					<img class="bg-secondary-subtle p-2 rounded-pill" src="{{ asset('assets/images/avatars/fastfood.png') }}" width="100" height="100" alt="Brand Logo">
					<div class="card-body mt-4">
						<h5 class="card-title text-center" id="cardTitle">
							Please select area
						</h5>
						<div class="btn-group gap-3 mt-3" role="group" aria-label="Basic radio toggle button group">
							<input type="radio" class="btn-check" name="deliveryPickupOption" id="delivery" value="delivery" autocomplete="off">
							<label class="btn btn-outline-primary rounded-pill" for="delivery">
								Delivery
							</label>

							<input type="radio" class="btn-check" name="deliveryPickupOption" id="pickup" value="pickup" autocomplete="off">
							<label class="btn btn-outline-primary rounded-pill" for="pickup">
								Pickup
							</label>

							<input type="radio" class="btn-check" name="deliveryPickupOption" id="dine-in" value="dine-in" autocomplete="off">
							<label class="btn btn-outline-primary rounded-pill" for="dine-in">
								Dine In
							</label>
						</div>
						<div id="cityContainer" class="mt-3">
							<select id="citySelect" class="form-select my-4" aria-label="Select City"></select>
						</div>

						<div id="branchContainer" class="mt-3" style="display: none;">
							<select id="branchSelect" class="form-select mb-2" aria-label="Select Area"></select>
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