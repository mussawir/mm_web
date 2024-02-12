@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New User
</h4>
<div class="row">
	<div class="col-xl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/addnew/user">
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
								placeholder="Enter First Name"
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
								class="form-control @error('last_name') is-invalid @enderror"
								type="text"
								name="last_name"
								id="last_name"
								placeholder="Enter Last Name"
								value="{{ old('last_name') }}"
							>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="phone" class="form-label">
								Phone Number
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('phone') is-invalid @enderror"
								type="tel"
								name="phone"
								id="phone"
								placeholder="Enter Phone Number"
								aria-required='true'
								value="{{ old('phone') }}"
							>
							@if ($errors->has('phone'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('phone') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="email" class="form-label">
								Email Address
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('email') is-invalid @enderror"
								type="text"
								name="email"
								id="email"
								placeholder="Enter email address"
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
							<label for="password" class="form-label">
								Password
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control @error('password') is-invalid @enderror"
								type="password"
								name="password"
								id="password"
								placeholder="Enter password"
								aria-required='true'
							>
							@if ($errors->has('password'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('password') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="password_confirmation" class="form-label">
								Confirm Password
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<input
								class="form-control"
								type="password"
								name="password_confirmation"
								id="password_confirmation"
								placeholder="Enter password again"
								aria-required='true'
							>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="user_role" class="form-label">
								User Role
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<select class="form-select @error('user_role') is-invalid @enderror" name="user_role" id="user_role" aria-required='true'>
								<option value=''>
									Select User Role
								</option>
								<option value='1' {{ old('user_role') == '1' ? 'selected' : '' }}>
									Admin
								</option>
								<option value='2' {{ old('user_role') == '2' ? 'selected' : '' }}>
									Branch Manager
								</option>
							</select>
							@if ($errors->has('user_role'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('user_role') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="branch" class="form-label">
								Branch
								<span class='text-danger' aria-hidden='true'>*</span>
							</label>
							<select class="form-select @error('branch') is-invalid @enderror" name='branch' id="branch" aria-required='true'>
								<option value=''>
									Select Branch
								</option>
								@foreach($branches as $branch)
								<option value="{{ $branch->id }}" {{ old('branch') == $branch->id ? 'selected' : '' }}>
									{{ $branch->name }}
								</option>
								@endforeach
							</select>
							@if ($errors->has('branch'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('branch') }}
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
