{{-- Vendor Info Modal Start --}}
<div class="modal fade" id="vendorInfo" tabindex="-1" aria-labelledby="vendorInfoModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="d-flex flex-column">
					<img src="{{ '/images/vendors/logos/' . $vendor->logo }}"/>
				</div>
				<div class="d-flex flex-column">
					<h1 class="fs-4 fw-bold my-5">
						{{ $vendor->name }}
					</h1>
					<hr class="border-0 border-top border-secondary" />
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Vendor Info Modal End --}}