@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Vendor
</h4>
<div class="row">
	<div class="col-xl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/vendors" enctype="multipart/form-data">
					@csrf
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="name" class="form-label">
								Name
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('name') is-invalid @enderror"
								type="text"
								name="name"
								id="name"
								placeholder="Enter Your Name"
								aria-required="true"
								value="{{ old('name') }}"
							>
							@if ($errors->has('name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('name') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="company_name" class="form-label">
								Company Name
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('company_name') is-invalid @enderror"
								type="text"
								name="company_name"
								id="company_name"
								placeholder="Enter Company Name"
								aria-required="true"
								value="{{ old('company_name') }}"
							>
							@if ($errors->has('company_name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('company_name') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="shop_number" class="form-label">
								Shop Number
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('shop_number') is-invalid @enderror"
								type="tel"
								name="shop_number"
								id="shop_number"
								placeholder="Enter Shop Number"
								aria-required='true'
								value="{{ old('shop_number') }}"
							>
							@if ($errors->has('shop_number'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('shop_number') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="full_address" class="form-label">
								Full Address
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<textarea class="form-control @error('full_address') is-invalid @enderror" name="full_address" id="full_address" rows="4" placeholder="Enter Full Address">{{ old('full_address') }}</textarea>
							@if ($errors->has('full_address'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('full_address') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="logo" class="form-label">
								Logo
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('logo') is-invalid @enderror"
								name="logo"
								id="logo"
								type="file"
							>
							@if ($errors->has('logo'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('logo') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="banners" class="form-label">
								Banners (Upload exactly 3 images)
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('banners') is-invalid @enderror @error('banners.*') is-invalid @enderror"
								name="banners[]"
								id="banners"
								type="file"
								multiple
								accept="image/*"
							>
							@if ($errors->has('banners'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('banners') }}
								</strong>
							</span>
							@endif
							@if ($errors->has('banners.*'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('banners.*') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="current_balance" class="form-label">
								Current Balance
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('current_balance') is-invalid @enderror"
								type="number"
								name="current_balance"
								id="current_balance"
								placeholder="Enter Current Balance"
								aria-required='true'
								value="{{ old('current_balance') }}"
							>
							@if ($errors->has('current_balance'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('current_balance') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="points_in_hand" class="form-label">
								Points In Hand
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('points_in_hand') is-invalid @enderror"
								type="number"
								name="points_in_hand"
								id="points_in_hand"
								placeholder="Enter Points In Hand"
								aria-required='true'
								value="{{ old('points_in_hand') }}"
							>
							@if ($errors->has('points_in_hand'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('points_in_hand') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="date_joining" class="form-label">
								Date Joining
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control bg-transparent date-selector @error('date_joining') is-invalid @enderror"
								type="text"
								name="date_joining"
								id="date_joining"
								placeholder="Enter Joining Date"
								aria-required='true'
								value="{{ old('date_joining') }}"
							>
							@if ($errors->has('date_joining'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('date_joining') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="primary_contact" class="form-label">
								Primary Contact Number
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('primary_contact') is-invalid @enderror"
								type="number"
								name="primary_contact"
								id="primary_contact"
								placeholder="Enter Primary Contact Number"
								aria-required='true'
								value="{{ old('primary_contact') }}"
							>
							@if ($errors->has('primary_contact'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('primary_contact') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="secondary_contact" class="form-label">
								Secondary Contact Number
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('secondary_contact') is-invalid @enderror"
								type="number"
								name="secondary_contact"
								id="secondary_contact"
								placeholder="Enter Secondary Contact Number"
								aria-required='true'
								value="{{ old('secondary_contact') }}"
							>
							@if ($errors->has('secondary_contact'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('secondary_contact') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="email" class="form-label">
								Email
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('email') is-invalid @enderror"
								type="text"
								name="email"
								id="email"
								placeholder="Enter Email Address"
								aria-required='true'
								value="{{ old('email') }}"
							>
							@if ($errors->has('email'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('email') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="city" class="form-label">
								City
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<select class="form-select @error('city') is-invalid @enderror" name='city' id='city' aria-required='true'>
								<option value=''>
									Select City
								</option>
								@foreach($cities as $city)
								<option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>
									{{ $city->name }}
								</option>
								@endforeach
							</select>
							@if ($errors->has('city'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('city') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="branch" class="form-label">
								Area
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<select class="form-select @error('branch') is-invalid @enderror" name='branch' id='branch' aria-required='true'>
							</select>
							@if ($errors->has('branch'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('branch') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="commission_percentage" class="form-label">
								Commission Percentage
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('commission_percentage') is-invalid @enderror"
								type="text"
								name="commission_percentage"
								id="commission_percentage"
								placeholder="Enter Commission Percentage"
								aria-required='true'
								value="{{ old('commission_percentage') }}"
							>
							@if ($errors->has('commission_percentage'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('commission_percentage') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="delivery_free_after" class="form-label">
								Delivery Free After Amount
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('delivery_free_after') is-invalid @enderror"
								type="text"
								name="delivery_free_after"
								id="delivery_free_after"
								placeholder="Enter Delivery Free After Amount"
								aria-required='true'
								value="{{ old('delivery_free_after') }}"
							>
							@if ($errors->has('delivery_free_after'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('delivery_free_after') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="delivery_charges" class="form-label">
								Delivery Charges
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('delivery_charges') is-invalid @enderror"
								type="text"
								name="delivery_charges"
								id="delivery_charges"
								placeholder="Enter Delivery Charges"
								aria-required='true'
								value="{{ old('delivery_charges') }}"
							>
							@if ($errors->has('delivery_charges'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('delivery_charges') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="minimum_delivery_amount" class="form-label">
								Minimum Delivery Amount
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('minimum_delivery_amount') is-invalid @enderror"
								type="text"
								name="minimum_delivery_amount"
								id="minimum_delivery_amount"
								placeholder="Enter Minimum Delivery Amount"
								aria-required='true'
								value="{{ old('minimum_delivery_amount') }}"
							>
							@if ($errors->has('minimum_delivery_amount'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('minimum_delivery_amount') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="vendor_type" class="form-label">
								Vendor Type
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<select class="form-select @error('vendor_type') is-invalid @enderror" name='vendor_type' id='vendor_type' aria-required='true'>
								<option value=''>
									Select Vendor Type
								</option>
								@foreach($vendorTypes as $vendorType)
								<option value="{{ $vendorType->id }}" {{ old('vendor_type') == $vendorType->id ? 'selected' : '' }}>
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
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="facebook" class="form-label">
								Facebook
							</label>
							<input
								class="form-control @error('facebook') is-invalid @enderror"
								type="text"
								name="facebook"
								id="facebook"
								placeholder="Enter Facebook Profile"
								value="{{ old('facebook') }}"
							>
							@if ($errors->has('facebook'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('facebook') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="website" class="form-label">
								Website
							</label>
							<input
								class="form-control @error('website') is-invalid @enderror"
								type="text"
								name="website"
								id="website"
								placeholder="Enter Your Website Address"
								value="{{ old('website') }}"
							>
							@if ($errors->has('website'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('website') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="instagram" class="form-label">
								Instagram Profile
							</label>
							<input
								class="form-control @error('instagram') is-invalid @enderror"
								type="text"
								name="instagram"
								id="instagram"
								placeholder="Enter Instagram Profile"
								value="{{ old('instagram') }}"
							>
							@if ($errors->has('instagram'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('instagram') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="twitter" class="form-label">
								Twitter Handle
							</label>
							<input
								class="form-control @error('twitter') is-invalid @enderror"
								type="text"
								name="twitter"
								id="twitter"
								placeholder="Enter Twitter Handle"
								value="{{ old('twitter') }}"
							>
							@if ($errors->has('twitter'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('twitter') }}
								</strong>
							</span>
							@endif
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
		var citySelect = document.getElementById('city');
		var branchSelect = document.getElementById('branch');

		// Function to fetch and update branches based on the selected city
		function updateAreas(selectedCityId, preSelectedBranch = 0) {
			// Clear existing options
			branchSelect.innerHTML = '<option value="">Select Area</option>';

			// Fetch branches based on the selected city
			fetch(`/api/v1/city/branches/list/${selectedCityId}`)
				.then(response => response.json())
				.then(data => {
					data.data.forEach(branch => {
						var option = document.createElement('option');
						option.value = branch.id;
						option.textContent = branch.name;

						if (branch.id == preSelectedBranch) {
							option.selected = true;
						}

						branchSelect.appendChild(option);
					});
				})
				.catch(error => console.error('Error fetching areas:', error));
		}

		// Attach change event listener to the city dropdown
		citySelect.addEventListener('change', function () {
			var selectedCityId = this.value;
			updateAreas(selectedCityId);
		});

		// Trigger the change event if a city is already selected on page load
		var preSelectedCityId = citySelect.value;
		if (preSelectedCityId) {
			const preSelectedBranch = @json(old('branch', 0));
			updateAreas(preSelectedCityId, preSelectedBranch);
		}
	});
</script>
@endsection