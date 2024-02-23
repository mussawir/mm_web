@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Update Item
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card mb-4">
			<div class="card-body">
				<form method="POST" action="{{ url('/admin/update/item') }}" enctype="multipart/form-data">
					@csrf
					<input
						name="id"
						type="hidden"
						value="{{ $item->id }}"
					/>
					<input
						name="vendor"
						type="hidden"
						value="{{ $item->vendor_id }}"
					/>
					<div class="row mb-3">
						<label for="category" class="col-sm-2 col-form-label">
							Category
						</label>
						<div class="col-sm-10">
							<select
								class="form-select @error('category') is-invalid @enderror"
								name="category"
								id="category"
								aria-label="Select Category"
							>
								<option value="">
									Select Category
								</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ old('category', $item->category_id) == $category->id ? 'selected' : '' }}>
									{{ $category->name }}
								</option>
								@endforeach
							</select>
							@if($errors->has('category'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('category') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="main_image" class="col-sm-2 col-form-label">
							Main Image
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('main_image') is-invalid @enderror"
								type="file"
								name="main_image"
								id="main_image"
							/>
							@if($errors->has('main_image'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('main_image') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="image" class="col-sm-2 col-form-label">
							Additional Images
						</label>
						<div class="col-sm-10">
							<input class="form-control" type="file" name="image" id="image" multiple />
						</div>
					</div>
					<div class="row mb-3">
						<label for="name" class="col-sm-2 col-form-label">
							Name
						</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" id="name" value="{{ old('name', $item->name) }}" placeholder="Type your name">
							@if($errors->has('name'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('name') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="description" class="col-sm-2 col-form-label">
							Description
						</label>
						<div class="col-sm-10">
							<input class="form-control" name="description" id="description" value="{{ old('description', $item->discription) }}" type="text" placeholder="Type description">
							@if($errors->has('description'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('description') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="price" class="col-sm-2 col-form-label">
							Price
						</label>
						<div class="col-sm-10">
							<input class="form-control" name="price" id="price" value="{{ old('price', $item->price) }}" type="number" placeholder="Rs.00">
							@if($errors->has('price'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('price') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="discount" class="col-sm-2 col-form-label">
							Discount (%)
						</label>
						<div class="col-sm-10">
							<input class="form-control" name="discount" id="discount" value="{{ old('discount', $item->discount) }}" type="number" placeholder="Discount percentage">
							@if($errors->has('discount'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('discount') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="quantity" class="col-sm-2 col-form-label">
							Quantity
						</label>
						<div class="col-sm-10">
							<input class="form-control" name="quantity" id="quantity" value="{{ old('quantity', $item->qty) }}" type="number" placeholder="Type quantity">
							@if($errors->has('quantity'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('max_order_quantity') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="max_order_quantity" class="col-sm-2 col-form-label">
							Max Order Quantity
						</label>
						<div class="col-sm-10">
							<input
								class="form-control"
								name="max_order_quantity"
								id="max_order_quantity"
								value="{{ old('max_order_quantity', $item->max_order_qty) }}"
								type="number"
								placeholder="Type maximum order quantity"
							>
							@if($errors->has('max_order_quantity'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('max_order_quantity') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="preparation_time" class="col-sm-2 col-form-label">
							Preparation Time
							<span class="text-danger" aria-hidden="true">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<select
								id="preparation_time"
								name="preparation_time"
								class="form-select @error('preparation_time') is-invalid @enderror"
								aria-required='true'
								aria-label='Select preparation_time'
							>
								@php
									$minutes = [10, 15, 20, 25, 30, 40, 45];
								@endphp
								<option value="">
									Select Preparation Time
								</option>
								@foreach($minutes as $minute)
								<option value="{{ $minute }}" {{ old('preparation_time', $item->preparation_time) == $minute ? 'selected' : '' }}>
									{{ $minute . ' Minutes'}}
								</option>
								@endforeach
							</select>
							@if($errors->has('preparation_time'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('preparation_time') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="" class="col-sm-2 col-form-label">
							In Stock
						</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="instock" value="1" id="yes" {{ ($item->instock == 1) ? 'checked' : '' }}>
								<label class="form-check-label" for="yes">
									Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="instock" value="0" id="no" {{ ($item->instock == 0) ? 'checked' : '' }}>
								<label class="form-check-label" for="no">
									No
								</label>
							</div>
							@if($errors->has('instock'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('instock') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					@if ($item->is_addon)
					<div class="row mb-3">
						<label for="" class="col-sm-2 col-form-label">
							Is Addon
						</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="isaddon" value="1" id="yes" {{ ($item->isaddon == 1) ? 'checked' : '' }}>
								<label class="form-check-label" for="yes">
									Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="isaddon" value="0" id="no" {{ ($item->isaddon == 0) ? 'checked' : '' }}>
								<label class="form-check-label" for="no">
									No
								</label>
							</div>
						</div>
					</div>
					@endif
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary">
								Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<div class="d-flex align-items-center justify-content-between">
					<h5>Added Addons</h5>
					<button type="button" class="btn btn-primary" id="openAddonModal" data-category="{{ $item->category_id }}">
						Add Addon
					</button>
				</div>
				<div class="mt-4" id="added-addons-container">
					@if ($item->addons->count())
					@include('partials.item-addons', ['addedAddons' => $item->addons])
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Item Addon Modal --}}
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="addonModal" tabindex="-1" aria-labelledby="addonModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addonModalLabel">
					Add Addon
				</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row align-items-center mb-3">
					<div class="col-md-8">
						<div class="input-group input-group-merge">
							<span class="input-group-text" id="modal-search-box">
								<i class="bx bx-search"></i>
							</span>
							<input
								id="modal-search"
								name="modal-search"
								type="text"
								class="form-control form-control-lg"
								placeholder="Search addons ..."
								aria-label="Search addon"
								aria-describedby="modal-search-box"
							/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-check">
							<input name="search-type" class="form-check-input" type="radio" value="1" id="search-addons-only" checked>
							<label class="form-check-label" for="search-addons-only">
								Search Addons Only
							</label>
						</div>
						<div class="form-check">
							<input name="search-type" class="form-check-input" type="radio" value="0" id="search-everything">
							<label class="form-check-label" for="search-everything">
								Search Everything
							</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div id="addonList"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-bs-dismiss="modal">
					Cancel
				</button>
				<button type="button" class="btn btn-primary" id="save-addons">
					Save
				</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
	document.addEventListener("DOMContentLoaded", function ()
	{
		const addonList = document.getElementById('addonList');
		const saveButton = document.getElementById('save-addons');
		const modalSearchInput = document.getElementById('modal-search');
		const modal = new bootstrap.Modal(document.getElementById('addonModal'));

		document.getElementById('openAddonModal').addEventListener('click', function()
		{
			const selectedAddons = [];
			const removeAddonButtons = document.querySelectorAll('.remove-addon');
			
			removeAddonButtons.forEach(button => {
				selectedAddons.push(button.getAttribute('data-addon-id'));
			});

			const categoryId = this.dataset.category;

			// Fetch addons dynamically using AJAX
			fetch(`/admin/get-addons/${categoryId}`, {
				method: 'GET'
			})
			.then(response => response.json())
			.then(data => {
				// Populate the addon list with fetched data
				addonList.innerHTML = '';
				
				data.forEach(addon => {
					const inputGroup = document.createElement('div');
					inputGroup.className = 'input-group mb-2';

					const inputGroupText = document.createElement('div');
					inputGroupText.className = 'input-group-text';

					const checkbox = document.createElement('input');
					checkbox.className = 'form-check-input mt-0';
					checkbox.type = 'checkbox';
					checkbox.value = addon.id;
					checkbox.setAttribute('aria-label', 'Checkbox for addon');
					if (selectedAddons.includes(checkbox.value.toString()))
					{
						checkbox.checked = true;
					}

					inputGroupText.appendChild(checkbox);
					inputGroup.appendChild(inputGroupText);

					const span = document.createElement('span');
					span.className = 'input-group-text form-control';
					span.textContent = addon.name;

					inputGroup.appendChild(span);

					addonList.appendChild(inputGroup);
				});

				modal.show();
			})
			.catch(error => console.error(error));
		});
		
		saveButton.addEventListener("click", function () {
			const selectedAddons = [];

			addonList.querySelectorAll("input.form-check-input:checked").forEach((checkbox) => {
				selectedAddons.push(checkbox.value);
			});

			// Send the selected addons to the server
			fetch("/admin/items/{{ $item->id }}/addons", {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
				},
				body: JSON.stringify({ addons: selectedAddons }),
			})
			.then(response => response.json())
			.then(data => {
				if (data.data)
				{
					// Close the modal
					modal.hide();
					generatedAddonHTML();
				}
				else
				{
					alert (data.message)
				}
			})
			.catch(error => {
				console.error('Error:', error);
			});
		});

		// Add event listener for search input
		modalSearchInput.addEventListener("input", function ()
		{
			const value = this.value.trim().toLowerCase();
			const regex = new RegExp(value, "i");

			addonList.querySelectorAll(".input-group").forEach((addonElement) => {
				const addonNameElement = addonElement.querySelector("span.form-control");
				const addonName = addonNameElement.textContent.toLowerCase();

				if (addonName.match(regex))
				{
					addonElement.style.display = "flex";
				}
				else
				{
					addonElement.style.display = "none";
				}
			});
		});

		function generatedAddonHTML()
		{
			fetch("/admin/get-added-addons/{{ $item->id }}")
			.then(response => response.json())
			.then(data => {
				// Update the DOM with the new list of added addons
				const addedAddonsContainer = document.getElementById('added-addons-container');
				addedAddonsContainer.innerHTML = data.addedAddonsList;
			});
		}

		// Attach a click event handler to the "Remove" buttons
		$(document).on('click', '.remove-addon', function () {
			// Get the addon ID from the data attribute
			var addonId = $(this).data('addon-id');
			
			// Send a fetch POST request to remove the addon
			fetch("/admin/items/{{ $item->id }}/remove-addon", {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content"),
				},
				body: JSON.stringify({ addon_id: addonId }),
			})
			.then(response => response.json())
			.then(data => {
				
				// If the addon was successfully removed
				if (data.success)
				{
					// Remove the addon row from the table
					$(this).closest('tr').remove();
					
					// Update any other UI components as needed
				}
			})
			.catch(error => {
				console.error('An error occurred:', error);
			});
		});
	});
</script>
@endsection