@forelse($categoryItems as $categoryID => $items)
	<h5>
		{{ $items->first()->category->name ?? "" }}
	</h5>
	@forelse ($items as $item)
	<div class="row mb-3 item">
		<div class="col-md-12">
			<div class="input-group">
				<div class="input-group-text">
					<button
						class="btn btn-sm btn-primary add-item"
						data-item-id="{{ $item->id }}"
						data-item-name="{{ $item->name }}"
						type="button"
					>
						Add
					</button>
				</div>
				<div class="input-group-text">{{ $item->name }}</div>
				<div class="input-group-text">{{ $item->price }}</div>
				<input class="form-control item-quantity" type="number" name="quantity[{{ $item->id }}]" min="0" value="{{ array_key_exists($item->id, $selectedItems) ? $selectedItems[$item->id][0]['quantity'] : 0 }}">
				<div class="invalid-feedback text-end">
					Enter valid quantity!
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="row mb-3">
		<div class="col-md-6">
			<p class="rounded py-2 alert-danger fw-semibold fs-5 text-center">
				Empty category.
			</p>
		</div>
	</div>
	@endforelse
@empty
	<div class="row mb-3">
		<div class="col-md-6">
			<p class="rounded py-2 alert-danger fw-semibold fs-5 text-center">
				No category matched.
			</p>
		</div>
	</div>
@endforelse
