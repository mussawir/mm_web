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
						Inventory Ops
					</span>
				</a>
			</div>
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
						Name:
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
						City:
					</label>
					<select class="form-select" id="city" name="city">
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
					<label for="phone" class="form-label">
						Phone Number:
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
					<label for="pin" class="form-label">
						PIN:
					</label>
					<input
						type="password"
						name="pin"
						id="pin"
						class="form-control @error('pin') is-invalid @enderror"
					>
					@error('pin')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="pin_confirmation" class="form-label">
						Confirm PIN:
					</label>
					<input
						type="password"
						name="pin_confirmation"
						id="pin_confirmation"
						class="form-control @error('pin_confirmation') is-invalid @enderror"
					>
				</div>

				{{-- <div class="mb-3">
					<label for="address" class="form-label">
						Address:
					</label>
					<input
						type="text"
						name="address"
						id="address"
						value="{{ old('address') }}"
						class="form-control @error('address') is-invalid @enderror"
					/>
					@error('address')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div> --}}

				<div class="mb-3">
					<button class="btn btn-primary d-grid w-100" type="submit">
						{{ __('Register') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection