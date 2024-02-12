@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Item
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				@if(session('message'))
				<div class="alert alert-success alert-dismissible">
					<strong>
						{{ session('message') }}
					</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@endif
				<form method="POST" action="{{ url('/admin/addnew/item') }}" enctype="multipart/form-data">
					@csrf
					<input
						name="branch"
						type="hidden"
						value="{{ $vendor->branch_id }}"
					/>
					<input
						name="vendor"
						type="hidden"
						value="{{ $vendor->id }}"
					/>					
					<div class="row mb-3">
						<label for="category" class="col-sm-2 col-form-label">
							Category
							<span class="text-danger" aria-hidden="true">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<select
								id="category"
								name="category"
								class="form-select @error('category') is-invalid @enderror"
								aria-required='true'
								aria-label='Select Category'
							>
								<option value="">
									Select Category
								</option>
								@foreach($categories as $category)
								<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>
									{{ $category->name }}
								</option>
								@endforeach
							</select>
							@if($errors->has('category'))
							<span class="invalid-feedback" role="alert">
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
							<span class="text-danger" aria-hidden="true">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<div class="input-group">
								<span class="input-group-text">
									<i class='bx bxs-image'></i>
									{{-- Upload --}}
								</span>
								<input type="file" class="form-control @error('main_image') is-invalid @enderror" name="main_image" id="main_image" aria-required='true'>
							</div>
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
							<div class="input-group">
								<span class="input-group-text">
									<i class='bx bxs-image'></i>
									{{-- Upload --}}
								</span>
								<input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" multiple>
							</div>
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
						<label for="name" class="col-sm-2 col-form-label">
							Name
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('name') is-invalid @enderror"
								name="name"
								value="{{ old('name') }}"
								type="text"
								placeholder="Type item name"
								id="name"
								aria-required="true"
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
						<label for="description" class="col-sm-2 col-form-label">
							Description
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('description') is-invalid @enderror"
								name="description"
								id="description"
								value="{{ old('description') }}"
								type="text"
								placeholder="Type item description"
								aria-required="true"
							>
							@if($errors->has('description'))
							<span class="invalid-feedback" role="alert">
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
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('price') is-invalid @enderror"
								name="price"
								id="price"
								value="{{ old('price') }}"
								type="number"
								placeholder="{{ session('currency')->symbol }}10"
								aria-required="true"
							>
							@if($errors->has('price'))
							<span class="invalid-feedback" role="alert">
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
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('discount') is-invalid @enderror"
								name="discount"
								id="discount"
								value="{{ old('discount') }}"
								type="number"
								placeholder="Discount percentage"
								aria-required="true"
							>
							@if($errors->has('discount'))
							<span class="invalid-feedback" role="alert">
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
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('quantity') is-invalid @enderror"
								name="quantity"
								id="quantity"
								value="{{ old('quantity') }}"
								type="number"
								placeholder="Type quantity"
								aria-required="true"
							>
							@if($errors->has('quantity'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('quantity') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="max_order_quantity" class="col-sm-2 col-form-label">
							Max Order Quantity
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('max_order_quantity') is-invalid @enderror"
								name="max_order_quantity"
								id="max_order_quantity"
								value="{{ old('max_order_quantity') }}"
								type="number"
								placeholder="Type maximum order quantity"
								aria-required="true"
							>
							@if($errors->has('max_order_quantity'))
							<span class="invalid-feedback" role="alert">
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
								<option value="{{ $minute }}" {{ old('preparation_time') == $minute ? 'selected' : '' }}>
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
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input
									class="form-check-input @error('instock') is-invalid @enderror"
									type="radio"
									name="instock"
									value="1"
									id="yes"
									aria-required="true"
									{{ (old('instock') == '1') ? 'checked' : '' }}
								>
								<label class="form-check-label" for="yes">
									Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input
									class="form-check-input @error('instock') is-invalid @enderror"
									type="radio"
									name="instock"
									value="0"
									id="no"
									aria-required="true"
									{{ (old('instock') == '0') ? 'checked' : '' }}
								>
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
					@if ($isFoodVendor)
					<div class="row mb-3">
						<label for="" class="col-sm-2 col-form-label">
							Is Addon
						</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input
									class="form-check-input @error('is_addon') is-invalid @enderror"
									type="radio"
									name="is_addon"
									value="1"
									id="yes"
									{{ (old('is_addon') == '1') ? 'checked' : '' }}
								>
								<label class="form-check-label" for="yes">
									Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input
									class="form-check-input @error('is_addon') is-invalid @enderror"
									type="radio"
									name="is_addon"
									value="0"
									id="no"
									{{ (old('is_addon') == '0') ? 'checked' : '' }}
									{{ ((old('is_addon', null))) ? '' : 'checked' }}
								>
								<label class="form-check-label" for="no">
									No
								</label>
							</div>
							@if($errors->has('is_addon'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('is_addon') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					@endif
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary" name="action" value="save">
								Save
							</button>
							<button type="submit" class="btn btn-primary" name="action" value="saveAndAddMore">
								Save & Add More
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection