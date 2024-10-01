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
						Inventory Ops
					</span>
				</a>
			</div>
			@if (session('resent'))
				<div class="alert alert-success" role="alert">
					{{ __('OTP has been resent to your phone number') }}
				</div>
			@endif
			{{-- /Logo --}}
			<h4 class="mb-2">
				<span>
					{{ __('Verify OTP') }}
				</span>
			</h4>
			<p class="mb-4">
				Please enter OTP sent to your phone
			</p>
			<p class="text-center text-danger fw-semibold alert alert-danger mb-4" style="letter-spacing:1rem;">
				{{ session('otp') }}
			</p>
			<form method="POST" action="{{ route('customer.verify.submit') }}" aria-label="{{ __('OTP Verification') }}" id="formAuthentication" class="mb-3">
				@csrf
				<div class="mb-3">
					<label for="otp" class="form-label">
						OTP:
					</label>
					<input
						type="text"
						name="otp"
						id="otp"
						class="form-control @error('otp') is-invalid @enderror"
					/>
					@error('otp')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div>
				<div class="vstack align-items-center gap-3 mb-3">
					<button type="submit" class="btn btn-primary w-100">
						{{ __('Verify OTP') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection