{{-- Modal - Start --}}
{{-- <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-body d-flex justify-content-center">
				<div class="vstack align-items-center">
					<img
						src="{{ asset('assets/images/avatars/logo.svg') }}"
						class="img-fluid w-25"
						alt="Mazaa Max"
					/>
					<div class="card-body w-75 mt-4">
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
								<div class="w-100 border border-2 rounded-3" id="address-map-container" style="height:400px;">
									<div class="h-100" id="address-map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-center mb-4 mx-5">
				<button type="button" class="w-auto bds-c-btn bds-c-btn-primary bds-c-btn--size-regular zi-surface-base save-option px-5" onclick="saveOption()">
					Select
				</button>
			</div>
		</div>
	</div>
</div> --}}
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body mt-5 d-flex justify-content-center">
				<div class="vstack align-items-center">
					<img class="w-75" src="{{ asset('assets/images/avatars/logo.svg') }}" alt="Brand Logo">
					<div class="card-body mt-4">
						<h5 class="card-title text-center" id="cardTitle">
							Please select your city
						</h5>
						<div id="cityContainer" class="mt-3">
							<select id="citySelect" class="form-select my-4" aria-label="Select City">
								<option value="">Select City</option>
								@foreach ($cities as $city)
								<option value="{{ $city->id }}">
									{{ $city->name }}
								</option>
								@endforeach
							</select>
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