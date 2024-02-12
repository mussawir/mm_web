@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Vendor Login
</h4>
<div class="row">
	<div class="col-xl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/vendors/{{ $id }}/login">
					@csrf
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="first_name" class="form-label">
								First Name
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('first_name') is-invalid @enderror"
								type="text"
								name="first_name"
								id="first_name"
								placeholder="Enter Your First Name"
								aria-required="true"
								value="{{ old('first_name') }}"
							>
							@if ($errors->has('first_name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('first_name') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="last_name" class="form-label">
								Last Name
							</label>
							<input
								class="form-control"
								type="text"
								name="last_name"
								id="last_name"
								placeholder="Enter Your Last Name"
								value="{{ old('last_name') }}"
							>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="password" class="form-label">
								Password
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('password') is-invalid @enderror"
								type="password"
								name="password"
								id="password"
								aria-required='true'
								autocomplete="new-password"
							>
							@if ($errors->has('password'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('password') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="password-confirm" class="form-label">
								Confirm Password
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								id="password-confirm"
								type="password"
								class="form-control"
								name="password_confirmation"
								aria-required="true"
								autocomplete="new-password"
							/>
						</div>
					</div>
					<div class="row mb-3">
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
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('email') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="phone_number" class="form-label">
								Phone Number
							</label>
							<input
								class="form-control"
								type="number"
								name="phone_number"
								id="phone_number"
								placeholder="Enter Phone Number"
								value="{{ old('phone_number') }}"
							>
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