@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add Deal Add-Ons
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			@if ($message = Session::get('message'))
			<div class="card-header">
				<div class="alert alert-success alert-dismissible">
					<strong>{{ $message }}</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			@endif
			<div class="card-body">
				<div class="row mb-3">
					<div class="col-md-4">
						<p>
							<strong>
								Name:
							</strong>
							{{ $deal->name }}
						</p>
					</div>
					<div class="col-md-4">
						<p>
							<strong>
								Start Date:
							</strong>
							{{ $deal->start_date->format('d M Y') }}
						</p>
					</div>
					<div class="col-md-4">
						<p>
							<strong>
								End Date:
							</strong>
							{{ $deal->end_date->format('d M Y') }}
						</p>
					</div>
				</div>
				<form method="POST" action="{{ route('deal.addons.store') }}">
					@csrf
					<input type="hidden" name="deal" value="{{ $deal->id }}"/>
					<input type="hidden" name="branch" value="{{ $deal->branch_id }}"/>
					<input type="hidden" name="selected_add_ons" id="selected-items-input">
					<div class="row mb-3">
						<div class="col-md-4">
							<label for="categories" class="form-label">
								Category
							</label>
							<select class="form-select" name="categories[]" id="categories" multiple>
								<option value="">Select Category</option>
								@foreach ($categories as $category)
									<option value="{{ $category->id }}" {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }}>
										{{ $category->name }}
									</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-4">
							{{-- Search Input --}}
							<div class="mb-3">
								<label for="search" class="form-label">
									Search
								</label>
								<input type="text" class="form-control" id="search">
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<h5>Select Items:</h5>
							<div id="items-container"></div>
						</div>
						<div class="col-md-6">
							<h5 class="text-end">Selected Items:</h5>
							<div id="selected-items-container"></div>
						</div>
					</div>

					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary">
								Save
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	var selectedItems = [];
	// Function to generate HTML markup for selected items
	function generateSelectedItemsHtml() {
		var selectedItemsHtml = '';
		$.each(selectedItems, function(index, item) {
			selectedItemsHtml += '<div class="d-flex justify-content-end  align-items-center gap-3 mb-4 selected-item">'
				+ '<p class="mb-0">' + item.name + ' (Quantity: ' + item.quantity + ')</p>'
				+ '<button class="btn btn-sm btn-danger remove-item" data-item-id="' + item.id + '">Remove</button>'
				+ '</div>';
		});
		return selectedItemsHtml;
	}

	// Function to update the hidden input value with selected items data
	function updateSelectedItemsInput() {
		$('#selected-items-input').val(JSON.stringify(selectedItems));
	}

	// Function to update selected items and hidden input value
	function updateSelectedItems() {
		// Generate HTML markup for selected items
		var selectedItemsHtml = generateSelectedItemsHtml();
		$('#selected-items-container').html(selectedItemsHtml);

		// Update the hidden input value
		updateSelectedItemsInput();
	}
	// AJAX request to load items based on selected categories
	function loadItems(categories) {
		$.ajax({
			url: "{{ route('deal.loadItems', $deal) }}",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
			},
			data: {
				categories: categories,
			},
			success: function (response) {
				$('#items-container').html(response);
				$('.item-quantity').filter(function () {
					return parseInt($(this).val()) > 0;
				}).each(function () {
					var itemId = $(this).closest('.input-group').find('.add-item').data('item-id');
					var quantity = parseInt($(this).val());

					// Validate quantity
					if (quantity <= 0) {
						return;
					}

					// Find the item in the selectedItems array
					var selectedItem = selectedItems.find(function(item) {
						return item.id === itemId;
					});

					if (selectedItem) {
						// Update the quantity of the existing item
						selectedItem.quantity = quantity;
					} else {
						// Create a new item and add it to the selectedItems array
						selectedItem = {
							id: itemId,
							name: $(this).closest('.input-group').find('.input-group-text:eq(1)').text(),
							quantity: quantity
						};
						selectedItems.push(selectedItem);
					}

					// Update selected items and hidden input value
					updateSelectedItems();
				});
			}
		});
	}

	// AJAX request to load add-ons based on selected categories
	function loadAddOns(categories) {
		$.ajax({
			url: "{{ route('deal.loadAddOns', $deal) }}",
			type: 'POST',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
			},
			data: {
				categories: categories,
			},
			success: function (response) {
				$('#items-container').html(response);
				$('.item-quantity').filter(function () {
					return parseInt($(this).val()) > 0;
				}).each(function () {
					var itemId = $(this).closest('.input-group').find('.add-item').data('item-id');
					var quantity = parseInt($(this).val());

					// Validate quantity
					if (quantity <= 0) {
						return;
					}

					// Find the item in the selectedItems array
					var selectedItem = selectedItems.find(function(item) {
						return item.id === itemId;
					});

					if (selectedItem) {
						// Update the quantity of the existing item
						selectedItem.quantity = quantity;
					} else {
						// Create a new item and add it to the selectedItems array
						selectedItem = {
							id: itemId,
							name: $(this).closest('.input-group').find('.input-group-text:eq(1)').text(),
							quantity: quantity
						};
						selectedItems.push(selectedItem);
					}

					// Update selected items and hidden input value
					updateSelectedItems();
				});
			}
		});
	}

	$(document).ready(function() {
		var selectedCategories = $('#categories').val();

		if (selectedCategories && selectedCategories.length > 0)
		{
			loadAddOns(selectedCategories);
		}
		else
		{
			// Clear the items container if no categories are selected
			$('#items-container').html('');
		}

		// Event handler for the "Add" button
		$(document).on('click', '.add-item', function(event) {
			event.preventDefault();

			var itemId = $(this).data('item-id');
			var itemName = $(this).data('item-name');
			var quantityField = $(this).closest('.input-group').find('.item-quantity');
			var quantity = parseInt(quantityField.val());

			// Validate quantity
			if (quantity <= 0) {
				quantityField.addClass('is-invalid');
				return;
			}

			// Remove invalid feedback and highlight
			quantityField.removeClass('is-invalid');
			quantityField.closest('.input-group').find('.invalid-feedback').hide();

			// Check if the item is already in the selectedItems array
			var existingItem = selectedItems.find(function(item) {
				return item.id === itemId;
			});

			if (existingItem) {
				// Update the quantity of the existing item
				existingItem.quantity = quantity;
			} else {
				// Add the item to the selectedItems array
				selectedItems.push({
					id: itemId,
					name: itemName,
					quantity: quantity
				});
			}

			// Update selected items and hidden input value
			updateSelectedItems();
		});

		// Event handler for changing the quantity input
		$(document).on('input', '.item-quantity', function() {
			var itemId = $(this).closest('.input-group').find('.add-item').data('item-id');
			var quantity = parseInt($(this).val());

			// Validate quantity
			if (quantity <= 0) {
				$(this).addClass('is-invalid');
				return;
			}

			// Remove invalid feedback and highlight
			$(this).removeClass('is-invalid');
			$(this).closest('.input-group').find('.invalid-feedback').hide();

			// Find the item in the selectedItems array
			var selectedItem = selectedItems.find(function(item) {
				return item.id === itemId;
			});

			if (selectedItem) {
				// Update the quantity of the existing item
				selectedItem.quantity = quantity;
			} else {
				// Create a new item and add it to the selectedItems array
				selectedItem = {
					id: itemId,
					name: $(this).closest('.input-group').find('.input-group-text:eq(1)').text(),
					quantity: quantity
				};
				selectedItems.push(selectedItem);
			}

			// Update selected items and hidden input value
			updateSelectedItems();
		});

		// Event handler for the "Remove" button
		$(document).on('click', '.remove-item', function(event) {
			event.preventDefault();

			var itemId = $(this).data('item-id');

			// Remove the item from the selectedItems array
			selectedItems = selectedItems.filter(function(item) {
				return item.id !== itemId;
			});

			// Generate HTML markup for selected items
			var selectedItemsHtml = generateSelectedItemsHtml();
			$('#selected-items-container').html(selectedItemsHtml);

			// Update the hidden input value
			updateSelectedItemsInput();
		});

		// Load items on category change
		$('#categories').on('change', function() {
			var selectedCategories = $(this).val();
			if (selectedCategories && selectedCategories.length > 0)
			{
				loadItems(selectedCategories);
			}
			else
			{
				// Clear the items container if no categories are selected
				$('#items-container').html('');
			}
		});

		$('#search').on('input', function() {
			var searchValue = $(this).val().toLowerCase();
			$('.item').each(function()
			{
				var itemName = $(this).find('.input-group-text:eq(1)').text().toLowerCase();
				if (itemName.indexOf(searchValue) !== -1)
				{
					$(this).show();
				}
				else
				{
					$(this).hide();
				}
			});
		});

		// Prevent form submission when hitting Enter key on the search input field
		$('#search').on('keydown', function(event) {
			if (event.keyCode === 13) {
				event.preventDefault();
				return false;
			}
		});
	});
</script>
@endsection