@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Branch
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/branches" enctype="multipart/form-data">
					@csrf
					<div class="row mb-3">
						<label for="branch_name" class="col-sm-2 col-form-label">
							Branch Name
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('name') is-invalid @enderror"
								type="text"
								name="name"
								id="branch_name"
								placeholder="Type branch name"
								value="{{ old('name') }}"
								aria-required='true'
							>
							@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('name') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="phone" class="col-sm-2 col-form-label">
							Phone
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('phone') is-invalid @enderror"
								type="tel"
								id="phone"
								name="phone"
								placeholder="Type branch phone number"
								value="{{ old('phone') }}"
								aria-required='true'
							>
							@if ($errors->has('phone'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('phone') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="city" class="col-sm-2 col-form-label">
							City
							<span class='text-danger' aria-hidden='true'>
								*
							</span>
						</label>
						<div class="col-sm-10">
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
					</div>
					<div class="row mb-3">
						<label for="banner" class="col-sm-2 col-form-label">
							Banner
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('banner') is-invalid @enderror"
								name="banner"
								id="banner"
								type="file"
								accept="image/*"
							>
							@if ($errors->has('banner'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('banner') }}
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
							<textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
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
