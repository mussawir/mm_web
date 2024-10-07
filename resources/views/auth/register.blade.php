@extends('layouts.app')

@section('content')
<div class="authentication-inner">
	<div class="card">
		<div class="card-body">
			<div class="app-brand justify-content-center">
				<a href="{{ route('home') }}" class="app-brand-link gap-2">
					<span class="app-brand-logo demo">
						<img src="{{ asset('/assets/images/favicon/favicon.svg') }}" width="36" height="36" alt="Brand Logo"/>
					</span>
					<span class="app-brand-text demo text-body fw-bolder text-capitalize">
						Inventory Ops
					</span>
				</a>
			</div>
			@if (session('message'))
				<div class="alert alert-success fw-semibold" role="alert">
					{{ session('message') }}
				</div>
			@endif
			<h4 class="mb-2">
				<span>
					{{ __('Register') }}
				</span>
			</h4>
			<p class="mb-4">
				Please register and join us
			</p>
			<form method="POST" action="{{ route('customer.register.submit') }}" aria-label="{{ __('Register') }}" id="formAuthentication" class="mb-3">
				@csrf
				<div class="mb-3">
					<label for="name" class="form-label">
						{{ __('Name') }}
						<span class='text-danger' aria-hidden='true'>
							*
						</span>
					</label>
					<input
						type="text"
						name="name"
						id="name"
						value="{{ old('name') }}"
						class="form-control @error('name') is-invalid @enderror"
					>
					@error('name')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="city" class="form-label">
						{{ __('City') }}
						<span class='text-danger' aria-hidden='true'>
							*
						</span>
					</label>
					<select class="form-select @error('city') is-invalid @enderror" id="city" name="city">
						<option value="">
							Select Your City
						</option>
						@foreach ($cities as $city)
						<option value="{{ $city->id }}">
							{{ $city->name }}
						</option>
						@endforeach
					</select>
					@error('city')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="email" class="form-label">
						{{ __('Email') }}
						<span class='text-danger' aria-hidden='true'>
							*
						</span>
					</label>
					<input
						type="text"
						name="email"
						id="email"
						value="{{ old('email', session('email')) }}"
						class="form-control @error('email') is-invalid @enderror"
					>
					@error('email')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="phone" class="form-label">
						{{ __('Phone Number') }}
					</label>
					<input
						type="text"
						name="phone"
						id="phone"
						value="{{ old('phone', session('phone')) }}"
						class="form-control @error('phone') is-invalid @enderror"
					>
					@error('phone')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">
						{{ __('Password') }}
						<span class='text-danger' aria-hidden='true'>
							*
						</span>
					</label>
					<input
						type="password"
						name="password"
						id="password"
						class="form-control @error('password') is-invalid @enderror"
					>
					@error('password')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="password_confirmation" class="form-label">
						{{ __('Confirm Password') }}
						<span class='text-danger' aria-hidden='true'>
							*
						</span>
					</label>
					<input
						type="password"
						name="password_confirmation"
						id="password_confirmation"
						class="form-control @error('password_confirmation') is-invalid @enderror"
					>
				</div>

				<div class="mb-3">
					<button class="btn btn-primary d-grid w-100" type="submit">
						{{ __('Register') }}
					</button>
				</div>
				<p class="mb-2">
					Already registered?
				</p>
				<div class="mb-3">
					<a href="{{ route('customer.login') }}" class="btn btn-primary d-grid w-100">
						{{ __('Login') }}
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection