@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Category
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/categories" enctype="multipart/form-data">
					@csrf
					{{-- <div class="row mb-3">
						<label for="vendor_type" class="col-sm-2 col-form-label">
							Vendor Type
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
							<select class="form-select @error('vendor_type') is-invalid @enderror" id="vendor_type" name="vendor_type">
								<option value="">Select Vendor Type</option>
								@foreach ($vendorTypes as $vendorType)
								<option value="{{ $vendorType->id }}" {{ (old('vendor_type', "") == $vendorType->id) ? 'selected' : '' }}>
									{{ $vendorType->type_name }}
								</option>
								@endforeach
							</select>
							@if ($errors->has('vendor_type'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('vendor_type') }}
								</strong>
							</span>
							@endif
						</div>
					</div> --}}
					<div class="row mb-3">
						<label for="name" class="col-sm-2 col-form-label">
							Category Name
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								type="text"
								class="form-control @error('name') is-invalid @enderror"
								name="name"
								id="name"
								placeholder="Type category name"
								aria-required='true'
								value="{{ old('name') }}"
							>
							@if($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('name') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					{{-- <div class="row mb-3">
						<label for="image" class="col-sm-2 col-form-label">
							Image
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('image') is-invalid @enderror"
								name="image"
								id="image"
								type="file"
								aria-required='true'
							>
							@if($errors->has('image'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('image') }}
								</strong>
							</span>
							@endif
						</div>
					</div> --}}
					<div class="row mb-3">
						<label for="category" class="col-sm-2 col-form-label">
							Parent Category
						</label>
						<div class="col-sm-10">
							<select class="form-select" id="category" name="category">
								<option value="">Select Parent Category</option>
								@foreach ($parentCategories as $parentCategory)
								<option value="{{ $parentCategory->id }}">
									{{ $parentCategory->name }}
								</option>
								@endforeach
							</select>
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
	document.addEventListener('DOMContentLoaded', function () {
		const parentCategories = document.getElementById('category');
		const vendorTypeSelect = document.getElementById('vendor_type');

		function loadParentCategories(vendorType, parentCategory = 0) {
			parentCategories.innerHTML = '';

			const defaultOption = document.createElement('option');
			defaultOption.value = "";
			defaultOption.textContent = "Select Parent Category";
			parentCategories.appendChild(defaultOption);

			if (vendorType) {
				fetch(`/api/v1/parent-categories-by-vendor-type/${vendorType}`)
				.then(response => response.json())
				.then(data => {
					data.data.forEach(category => {
						const option = document.createElement('option');
						option.value = category.id;
						option.textContent = category.name;

						if (category.id == parentCategory) {
							option.selected = true;
						}

						parentCategories.appendChild(option);
					});
				})
				.catch(error => {
					console.error('Error fetching categories:', error);
				});
			}
		}

		vendorTypeSelect.addEventListener('change', function () {
			const vendorType = this.value;
			loadParentCategories(vendorType);
		});

		const preSelectedVendorType = vendorTypeSelect.value;
		if (preSelectedVendorType) {
			const preSelectedParentCategory = @json(old('category', 0));
			loadParentCategories(preSelectedVendorType, preSelectedParentCategory);
		}
	});
</script>
@endsection