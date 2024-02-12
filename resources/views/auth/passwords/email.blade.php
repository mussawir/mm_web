@extends('layouts.app')

@section('content')
<div class="authentication-inner py-4">
	@if (session('status'))
		<div class="alert alert-success" role="alert">
			{{ session('status') }}
		</div>
	@endif
	{{-- Forgot Password --}}
	<div class="card">
		<div class="card-body">
			{{-- Logo --}}
			<div class="app-brand justify-content-center">
				<a href="{{ route('home') }}" class="app-brand-link gap-2">
					<span class="app-brand-logo demo">
						<img src="{{ asset('/assets/images/avatars/fastfood.png') }}" width="40" height="40" alt="Brand Logo"/>
					</span>
					<span class="app-brand-text demo text-body fw-bolder">
						Fast Food
					</span>
				</a>
			</div>
			{{-- / Logo --}}
			<h4 class="mb-2">
				{{ __('Forgot Password? 🔒') }}
			</h4>
			<p class="mb-4">
				Enter your email and we'll send you instructions to reset your password
			</p>
			<form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}">
				@csrf
				<div class="mb-3">
					<label for="email" class="form-label">
						{{ __('Email') }}
					</label>
					<input
						type="email"
						class="form-control @error('email') is-invalid @enderror"
						id="email"
						name="email"
						value="{{ old('email') }}"
						placeholder="Enter your email"
						autofocus
						autocomplete="email"
					/>
					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<button type="submit" class="btn btn-primary d-grid w-100">
					Send Reset Link
				</button>
			</form>
			<div class="text-center">
				<a href="{{ url('/login') }}" class="d-flex align-items-center justify-content-center">
					<i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
					Back to login
				</a>
			</div>
		</div>
	</div>
	{{-- / Forgot Password --}}
</div>
@endsection
