@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Update Supplier
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<form class="edit-operator-form" method="POST" action="/admin/operators/{{ $operator->id }}" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="row mb-3">
						<div class="col-md-3">
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
								value="{{ old('name', $operator->name) }}"
							>
							@if ($errors->has('name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('name') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-md-3">
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
								value="{{ old('company_name', $operator->company_name) }}"
							>
							@if ($errors->has('company_name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('company_name') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-md-3">
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
								value="{{ old('email', $operator->email) }}"
							>
							@if ($errors->has('email'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('email') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-md-3">
							<label for="phone" class="form-label">
								Phone
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('phone') is-invalid @enderror"
								type="number"
								name="phone"
								id="phone"
								placeholder="Enter Phone Number"
								aria-required='true'
								value="{{ old('phone', $operator->phone) }}"
							>
							@if ($errors->has('phone'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('phone') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<label for="logo" class="form-label">
								Logo
							</label>
							<input
								class="form-control @error('logo') is-invalid @enderror"
								name="logo"
								id="logo"
								type="file"
								accept="image/*"
							>
							@if ($errors->has('logo'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('logo') }}
								</strong>
							</span>
							@endif
						</div>
						{{-- <div class="col-md-6">
							<label for="banner" class="form-label">
								Banner
							</label>
							<input
								class="form-control @error('banner') is-invalid @enderror"
								name="banner"
								id="banner"
								type="file"
								accept="image/*"
							>
							@if ($errors->has('banner'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('banner') }}
								</strong>
							</span>
							@endif
						</div> --}}
					</div>
					<div class="row mb-3">
						<div class="col-sm-12">
							<label for="address" class="form-label">
								Address
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control map-input @error('address') is-invalid @enderror"
								type="text"
								id="address-input"
								name="address"
								placeholder="Enter Address"
								aria-required='true'
								value="{{ old('address', $operator->details->address) }}"
							>
							@if ($errors->has('address'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('address') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					{{-- <div class="row mb-3">
						<div class="col-md-4">
							<label for="operational_area" class="form-label">
								Operational Area
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<select
								class="form-select @error('operational_area') is-invalid @enderror"
								name='operational_area'
								id='operational_area'
								aria-required='true'
							>
								@for ($i = 1; $i <= 10; $i++)
								<option value="{{ $i }}" {{ old('operational_area', $operator->details->operational_area) == $i ? 'selected' : '' }}>
									{{ $i . ' km' }}
								</option>
								@endfor
							</select>
							@if ($errors->has('operational_area'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('operational_area') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-md-4">
							<label for="operation_radius" class="form-label">
								Operation Radius
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<select
								class="form-select @error('operation_radius') is-invalid @enderror"
								name='operation_radius'
								id='operation_radius'
								aria-required='true'
							>
								@for ($i = 1; $i <= 10; $i++)
								<option value="{{ $i }}" {{ old('operation_radius'. $operator->details->operation_radius) == $i ? 'selected' : '' }}>
									{{ $i . ' km' }}
								</option>
								@endfor
							</select>
							@if ($errors->has('operation_radius'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('operation_radius') }}
								</strong>
							</span>
							@endif
						</div>
					</div> --}}
					<div class="row mb-3">
						<div class="col-md-4">
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
								<option value="{{ $city->id }}" {{ old('city', $operator->details->city_id) == $city->id ? 'selected' : '' }}>
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
						{{-- <div class="col-md-4">
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
								value="{{ old('commission_percentage', $operator->details->commission_percentage) }}"
							>
							@if ($errors->has('commission_percentage'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('commission_percentage') }}
								</strong>
							</span>
							@endif
						</div> --}}
						{{-- <div class="col-md-4">
							<label for="area_name" class="form-label">
								Area Name
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('area_name') is-invalid @enderror"
								type="text"
								name="area_name"
								id="area_name"
								placeholder="Enter Area Name"
								aria-required='true'
								value="{{ old('area_name', $operator->details->area_name) }}"
							>
							@if ($errors->has('area_name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('area_name') }}
								</strong>
							</span>
							@endif
						</div> --}}
					</div>
					{{-- <div class="row mb-3">
						<div class="col-md-4">
							<label for="" class="col-sm-4 col-form-label">
								Single Vendor
							</label>
							<div class="col-sm-8">
								<div class="form-check form-check-inline">
									<input
										class="form-check-input"
										type="radio"
										name="single_vendor"
										value="1"
										id="yes"
										{{ ($operator->single_vendor == 1) ? 'checked' : '' }}
									/>
									<label class="form-check-label" for="yes">
										Yes
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input
										class="form-check-input"
										type="radio"
										name="single_vendor"
										value="0"
										id="no"
										{{ ($operator->single_vendor == 0) ? 'checked' : '' }}
									/>
									<label class="form-check-label" for="no">
										No
									</label>
								</div>
							</div>
						</div>
					</div> --}}
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary update-operator">
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
