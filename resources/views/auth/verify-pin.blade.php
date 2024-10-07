@extends('layouts.app')

@section('content')
<div class="authentication-inner">
	{{-- Login --}}
	<div class="card">
		<div class="card-body">
			{{-- Logo --}}
			<div class="app-brand justify-content-center">
				<a href="{{ route('home') }}" class="app-brand-link gap-2">
					<span class="app-brand-logo demo">
						<img class="img-fluid" src="{{ asset('/assets/images/favicon/favicon.svg') }}" width="36" height="36" alt="Inventory Ops"/>
					</span>
					<span class="app-brand-text demo text-body fw-bolder text-capitalize">
						Inventory Ops
					</span>
				</a>
			</div>
			@if (session('message'))
				<div class="alert alert-danger" role="alert">
					{{ session('message') }}
				</div>
			@endif
			{{-- /Logo --}}
			<h4 class="mb-2">
				<span>
					{{ __('Verify PIN') }}
				</span>
			</h4>
			<p class="mb-4">
				Please enter your 4 digit PIN
			</p>
			<form method="POST" action="{{ route('customer.verify.pin.submit') }}" aria-label="{{ __('PIN Verification') }}" id="formAuthentication" class="mb-3">
				@csrf
				<div class="mb-3">
					<label for="phone" class="form-label">
						Phone:
					</label>
					<input
						type="text"
						name="phone"
						id="phone"
						class="form-control @error('phone') is-invalid @enderror"
						value="{{ old('phone', session('phone')) }}"
					/>
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
					/>
					@error('pin')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
				<div class="vstack align-items-center gap-3 mb-3">
					<button type="submit" class="btn btn-primary w-100">
						{{ __('Verify') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection