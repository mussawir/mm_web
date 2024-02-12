@extends('layouts.app')

@section('content')
<div class="authentication-inner">
	<div class="card">
		<div class="card-body">
			<div class="app-brand justify-content-center">
				<a href="{{ route('home') }}" class="app-brand-link gap-2">
					<span class="app-brand-logo demo">
						<img src="{{ asset('/assets/images/avatars/fastfood.png') }}" width="40" height="40" alt="Brand Logo"/>
					</span>
					<span class="app-brand-text demo text-body fw-bolder text-capitalize">
						Order Delivery
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
			<form method="POST" action="{{ url('/customer/register') }}" aria-label="{{ __('Register') }}" id="formAuthentication" class="mb-3">
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
					<label for="email" class="form-label">
						Email:
					</label>
					<input
						type="text"
						name="email"
						id="email"
						value="{{ old('email') }}"
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
						Phone Number:
					</label>
					<input
						type="text"
						name="phone"
						id="phone"
						value="{{ $phone ?? old('phone') }}"
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
					<label for="house_number" class="form-label">House Number:</label>
					<input type="text" name="house_number" id="house_number" value="{{ old('house_number') }}" class="form-control @error('house_number') is-invalid @enderror">
					@error('house_number')
					<span class="d-block invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				
				<div class="mb-3">
					<label for="street" class="form-label">Street:</label>
					<input type="text" name="street" id="street" value="{{ old('street') }}" class="form-control @error('street') is-invalid @enderror">
					@error('street')
					<span class="d-block invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

				<div class="mb-3">
					<label for="address" class="form-label">Address:</label>
					<input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror">
					@error('address')
					<span class="d-block invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
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