<div class="modal fade" id="pickupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel2">
					Order Pickup
				</h5>
				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>
			<div class="modal-body">
				{{-- <form id="paymentReceivedForm"> --}}
					<div class="row">
						<div class="col mb-3">
							<label for="payment" class="form-label">
								Payment Received
							</label>
							<input type="text" id="payment" class="form-control" placeholder="Enter received payment" data-order-id="" />
						</div>
					</div>
				{{-- </form> --}}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary" id="submitPayment">
					Submit
				</button>
			</div>
		</div>
	</div>
</div>