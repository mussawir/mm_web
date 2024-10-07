@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Update Category
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/categories/{{ $category->id }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row mb-3">
						<label for="name" class="col-sm-2 col-form-label">
							Category Name
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('name') is-invalid @enderror"
								name="name"
								id="name"
								value="{{ old('name', $category->name) }}"
								type="text"
								placeholder="Type category name"
								aria-required='true'
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
					<div class="row mb-3">
						<label for="image" class="col-sm-2 col-form-label">
							Image
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('image') is-invalid @enderror"
								value="{{ $category->image }}"
								name="image"
								id="image"
								type="file"
							>
							@if($errors->has('image'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('image') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="category" class="col-sm-2 col-form-label">
							Parent Category
						</label>
						<div class="col-sm-10">
							<select class="form-select" id="category" name="category">
								<option value="">
									Select Parent Category
								</option>
								@foreach ($parentCategories as $parentCategory)
								<option
									value="{{ $parentCategory->id }}"
									{{ (old('category', $category->parent_id) == $parentCategory->id) ? 'selected' : '' }}
								>
									{{ $parentCategory->name }}
								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row mb-3">
						<label for="is_mu" class="col-sm-2 col-form-label">
							Is Most Used
						</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input
									class="form-check-input"
									type="radio"
									name="is_mu"
									value="1"
									id="yes"
									{{ (old('is_mu', $category->is_mu) == '1') ? 'checked' : '' }}
								>
								<label class="form-check-label" for="yes">
									Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input
									class="form-check-input"
									type="radio"
									name="is_mu"
									value="0"
									id="no"
									{{ (old('is_mu', $category->is_mu) == '0') ? 'checked' : '' }}
								>
								<label class="form-check-label" for="no">
									No
								</label>
							</div>
							@if($errors->has('is_mu'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('is_mu') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
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
			const preSelectedParentCategory = @json(old('category', $category->parent_id));
			loadParentCategories(preSelectedVendorType, preSelectedParentCategory);
		}
	});
</script>
@endsection