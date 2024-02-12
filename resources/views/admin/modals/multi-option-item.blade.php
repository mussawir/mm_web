{{-- Multi Option Item Modal --}}
<div class="modal fade" id="multiOptionModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="multiOptionModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="multiOptionModalLabel">
					Add Multi Option Item
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label class="form-label" for="categories">
                            Item Category
                        </label>
                        <select class="form-select" id="categories">
                            <option>Select Item Category</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="total-item-quantity">
                            Total Quantity
                        </label>
                        <input type="number" class="form-control" id="total-item-quantity" min="1"/>
                    </div>
                </div>
                <hr />
                <div class="row mb-3" id="itemsList"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
					Close
				</button>
				<button type="button" class="btn btn-primary">
					Save changes
				</button>
			</div>
		</div>
	</div>
</div>
{{-- / Multi Option Item Modal --}}
