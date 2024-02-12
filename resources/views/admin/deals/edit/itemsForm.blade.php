@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	<span class="text-muted fw-light">
		Edit Deal /
	</span>
	Items
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				@if (session()->get('deal.edit.info', []))
				@php
				extract(session()->get('deal.edit.info', []));
				@endphp
				<div class="card mb-4">
					<div class="row g-0">
						<div class="col-md-3">
							@if ($banner ?? null)
							<img
								class="card-img card-img-left"
								src='{{ "/images/deal-banners/{$branch}/250x250/{$banner}" }}'
								alt="{{ $name }}"
								title="{{ $name }}"
								style="width:200px;"
							/>
							@else
							No image uploaded for banner.
							@endif
						</div>
						<div class="col-md-9">
							<div class="card-body pb-2">
								<h5 class="card-title">
									{{ $name }}
								</h5>
								<p class="card-text">
									{{ $description }}
								</p>
								<p class="card-text">
									<span class="me-3">
										Start Date:
										<small class="text-muted">
											{{ date('d M Y', strtotime($start_date)) }}
										</small>
									</span>
									<span>
										End Date:
										<small class="text-muted">
											{{ date('d M Y', strtotime($end_date)) }}
										</small>
									</span>
								</p>
							</div>
						</div>
					</div>
				</div>
				@endif
				<form method="POST" action="{{ route('deal.edit.items', [$id, $vendorID]) }}">
					@csrf
					<input
						type="hidden"
						name="branch"
						value={{ $branch }}
					/>
					<input
						type="hidden"
						name="vendor"
						value={{ $vendorID }}
					/>
					<input
						type="hidden"
						name="selected_items"
						id="selected-items-input"
					/>
					@if ($errors->has('items'))
					<span class="d-block invalid-feedback alert alert-danger" role="alert">
						<strong>
							{{ $errors->first('items') }}
						</strong>
					</span>
					@endif
					<div class="row mb-3 justify-content-end">
						<div class="col-md-2">
							<button type="button" class="btn btn-primary add-item">
								Add Item
							</button>
						</div>
					</div>
					<div class="row mb-4">
						<div class="accordion mt-3" id="itemsAccordion">
							<div class="card accordion-item">
								<h2 class="accordion-header">
									<button
										type="button"
										class="accordion-button collapsed"
										data-bs-toggle="collapse"
										data-bs-target="#accordionOne"
										aria-expanded="false"
										aria-controls="accordionOne"
									>
									Summary of Added Items: 0
									</button>
								</h2>
								<div id="accordionOne" class="accordion-collapse collapse" data-bs-parent="#itemsAccordion">
									<div class="accordion-body">
										<div class="row">
											<div class="col">
												<table class="table table-bordered">
													<thead>
														<tr>
															<th>Item Name</th>
															<th>Quantity</th>
															<th>Items</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody id="selected-items-container">
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card mb-4 add-item-container">
						<div class="card-body">
							<h5 class="card-title">
								Add Item To Deal
							</h5>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="custom_name" class="form-label">
										Custom Item Name
									</label>
									<input
										type="text"
										name="custom_name"
										id="custom_name"
										class="form-control"
										placeholder="Enter custom item name"
									/>
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-md-6">
									<label for="category" class="form-label">
										Main Category
									</label>
									<select class="form-select" name="category" id="category">
										<option value="">
											Select Main Category
										</option>
										@foreach ($categories as $category)
											<option value="{{ $category->id }}">
												{{ $category->name }}
											</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-6">
									<label for="sub-category" class="form-label">
										Sub Category
									</label>
									<select class="form-select" name="sub-category" id="sub-category">
										<option value="">
											Select Sub Category
										</option>
									</select>
								</div>
							</div>
							<div class="row justify-content-between mb-3">
								<div class="col-md-4">
									<label class="form-label" for="item_quantity">
										Quantity
									</label>
									<input type="number" name="item_quantity" id="item_quantity" class="form-control" min="1" value="1" />
								</div>
								<div class="col-md-6">
									<div class="mb-3">
										<label for="search" class="form-label">
											Search
										</label>
										<input type="text" class="form-control" id="search" placeholder="Search...">
									</div>
								</div>
							</div>
							<hr />
							<div id="itemsList"></div>
						</div>
					</div>

					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<a class="btn btn-secondary" href="{{ route('deal.edit', [$id, $vendorID]) }}">
								Previous
							</a>
							<button type="submit" class="btn btn-primary">
								Next
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
	$(document).ready(function() {
		var selectedItems = [];
		selectedItems.push(@json($selectedItems));
		updateSelectedItems();

		// Function to update selected items and hidden input value
		function updateSelectedItems()
		{
			selectedItems = selectedItems.filter(function (sets) {
				return sets.length > 0;
			});

			// Generate HTML markup for selected items
			var selectedItemsHtml = generateSelectedItemsHtml();
			$('#selected-items-container').html(selectedItemsHtml);

			// Update the hidden input value
			updateSelectedItemsInput();
		}

		// Function to generate HTML markup for selected items
		function generateSelectedItemsHtml()
		{
			let html = '';
			let quantityCount = 0;
			selectedItems.forEach((sets) => {
				sets.forEach((set) => {

				if (set.hasOwnProperty('quantity')) {
					quantityCount++;
				}
				html += `
					<tr>
					<td>${set.name}</td>
					<td>${set.quantity}</td>
					<td>
						<ul class="list-group list-group-flush">
				`;
				set.items.forEach((item) => {
					html += `
					<li class="list-group-item">${item.name} - Additional Price: ${item.price}</li>
					`;
				});
				html += `
						</ul>
					</td>
					<td>
						<button type="button" class="btn btn-primary btn-sm edit-item" data-item-id="${set.id}">Edit</button>
						<button type="button" class="btn btn-danger btn-sm remove-item" data-item-id="${set.id}">Remove</button>
					</td>
					</tr>
				`;
				});
			});

			const accordianButton = document.querySelector('.accordion-button');
			accordianButton.textContent = 'Summary of Added Items: ' + quantityCount;
			return html;
		}

		// Function to update the hidden input value with selected items data
		function updateSelectedItemsInput()
		{
			if (selectedItems.length > 0) {
				$('#selected-items-input').val(JSON.stringify(selectedItems));
			}
			else {
				$('#selected-items-input').val('[]');
			}
		}

		// Event handler for the "Remove" button
		$(document).on('click', '.remove-item', function(event) {
			event.preventDefault();

			var itemId = $(this).data('item-id');

			// Find the index of the set that contains the item to be removed
			var setIndex = -1;

			for (var i = 0; i < selectedItems.length; i++) {
				for (var j = 0; j < selectedItems[i].length; j++) {
					if (selectedItems[i][j].id == itemId) {
						setIndex = i;
						break;
					}
				}
				if (setIndex !== -1) {
					break;
				}
			}

			if (setIndex !== -1) {
				// Remove the item from the selectedItems array
				selectedItems[setIndex].splice(j, 1);

				// If the set is empty after removing the item, remove the set as well
				if (selectedItems[setIndex].length === 0) {
					selectedItems.splice(setIndex, 1);
				}

				// Update the UI to reflect the changes
				updateSelectedItems();
			}
		});

		const subCategories = document.getElementById('sub-category');
		const itemsList = document.getElementById('itemsList')

		// Load sub categories on category change
		$('#category').on('change', function() {
			var category = $(this).val();
			var vendor = @json($vendorID);

			subCategories.innerHTML = '';

			const defaultOption = document.createElement('option');
			defaultOption.value = "";
			defaultOption.textContent = "Select Sub Category";
			subCategories.appendChild(defaultOption);

			if (category)
			{
				// Fetch sub categories of main category
				fetch(`/api/v1/category/subcategories/${category}/${vendor}`)
				.then(response => response.json())
				.then(data => {
					data.data.forEach(category => {
						const option = document.createElement('option');
						option.value = category.id;
						option.textContent = category.name;
						subCategories.appendChild(option);
					});
				})
				.catch(error => {
					console.error('Error fetching categories:', error);
				});
			}
		});

		subCategories.addEventListener('change', () => {
			const categoryId = subCategories.value;
			if (categoryId)
			{
				// Make an AJAX request to fetch the items of the selected category
				fetch(`/api/v1/getcatitems/${categoryId}`)
				.then(response => response.json())
				.then(data => {
					// Populate the items list inside the modal with the received data
					itemsList.innerHTML = '';
					data.data.forEach(item => {
						const row = document.createElement('div');
						row.classList.add('row', 'mb-3', 'item');

						const firstColumn = document.createElement('div');
						firstColumn.classList.add('col-md-10', 'mb-3')

						const secondColumn = document.createElement('div');
						secondColumn.classList.add('col-md-2', 'mb-3');

						const inputGroup = document.createElement('div');
						inputGroup.classList.add('input-group');

						const checkboxDiv = document.createElement('div');
						checkboxDiv.classList.add('input-group-text');

						const checkboxInput = document.createElement('input');
						checkboxInput.classList.add('form-check-input', 'mt-0', 'item-checkbox');
						checkboxInput.type = 'checkbox';
						checkboxInput.name = 'items[]';
						checkboxInput.value = item.id;
						checkboxInput.setAttribute('data-name', item.name);
						checkboxInput.setAttribute('data-description', item.discription);
						checkboxInput.setAttribute('data-image', item.main_image);
						checkboxInput.setAttribute('data-original-price', item.price)
						checkboxDiv.appendChild(checkboxInput);

						const itemName = document.createElement('span');
						itemName.classList.add('input-group-text');
						itemName.textContent = item.name;

						const itemPrice = document.createElement('span');
						itemPrice.classList.add('input-group-text');
						itemPrice.textContent = item.price;

						inputGroup.appendChild(checkboxDiv);
						inputGroup.appendChild(itemName);
						inputGroup.appendChild(itemPrice);

						firstColumn.appendChild(inputGroup);

						const itemQuantity = document.createElement('input')
						itemQuantity.classList.add('form-control')
						itemQuantity.type = 'number';
						itemQuantity.value = 0.0;
						itemQuantity.name = `quantity[${item.id}]`;

						secondColumn.appendChild(itemQuantity);

						row.appendChild(firstColumn);
						row.appendChild(secondColumn);

						itemsList.appendChild(row);
					});
				})
				.catch(error => {
					console.error('Error fetching items:', error);
				});
			}
			else
			{
				itemsList.innerHTML = '';
			}
		});

		const addItemButton = document.querySelector('.add-item');

		// Event listener for "Save Item" button
		addItemButton.addEventListener('click', () => {
			const checkedItems = [];

			const itemCheckboxes = document.querySelectorAll('.item-checkbox:checked');
			const checkedOptions = Array.from(itemCheckboxes)
			.map(checkbox => {
				return {
					id: checkbox.value,
					name: checkbox.dataset.name,
					description: checkbox.dataset.description,
					image: checkbox.dataset.image,
					originalPrice: checkbox.dataset.originalPrice,
					price: parseFloat(document.querySelector('input[name="quantity['+ checkbox.value +']"]').value)
				};
			});

			if (checkedOptions.length)
			{
				const totalQuantity = document.getElementById('item_quantity').value;
				let customName = document.getElementById('custom_name').value;
				let categoryId = document.getElementById('category').value;

				if (! customName)
				{
					customName = subCategories.options[subCategories.selectedIndex].textContent;
				}

				let existingItem = null;

				for (const items of selectedItems)
				{
					for (const item of items)
					{
						if (item.id == subCategories.options[subCategories.selectedIndex].value)
						{
							existingItem = item;
							break;
						}
					}
				}

				if (existingItem)
				{
					existingItem.quantity = totalQuantity;
					existingItem.name = customName;
					existingItem.items = checkedOptions;
				}
				else
				{
					checkedItems.push({
						id: subCategories.options[subCategories.selectedIndex].value,
						name: customName,
						quantity: totalQuantity,
						items: checkedOptions,
						category: categoryId
					});

					selectedItems.push(checkedItems);
				}

				updateSelectedItems();
				resetForm();
			}
			else
			{
				alert ('No option checked');
			}
		});

		// Function to reset form elements
		function resetForm() {
			// Clear custom item name
			$('#custom_name').val('');

			// Reset main category and subcategory dropdowns
			$('#category').val('');
			$('#sub-category').empty();

			// Reset quantity input
			$('#item_quantity').val(1);

			// Clear search input
			$('#search').val('');

			// Uncheck all checkboxes
			itemsList.innerHTML = '';
		}

		// Event handler for the "Edit" button
		$(document).on('click', '.edit-item', function(event) {
			event.preventDefault();

			var itemId = $(this).data('item-id');

			// Find the set with the provided itemId
			var selectedItem = null;

			for (var i = 0; i < selectedItems.length; i++) {
				for (var j = 0; j < selectedItems[i].length; j++) {
					if (selectedItems[i][j].id == itemId) {
						selectedItem = selectedItems[i][j];
						break;
					}
				}
				if (selectedItem) {
					break;
				}
			}

			if (selectedItem) {
				$('#custom_name').val(selectedItem.name);
				$('#item_quantity').val(selectedItem.quantity);

				$('#category').val(selectedItem.category);
				$('#category').change();

				$('#sub-category').val(selectedItem.id);
				$('#sub-category').change();

				// Uncheck all checkboxes first
				$('input[name="items[]"]').prop('checked', false);

				selectedItem.items.forEach(function(item) {
					$('input[name="items[]"][value="' + item.id + '"]').prop('checked', true);
				});
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