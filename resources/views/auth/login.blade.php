@extends('layouts.app')

@section('content')
{{-- Content --}}
<div class="authentication-inner">
	{{-- Login --}}
	<div class="card">
		<div class="card-body">
			{{-- Logo --}}
			<div class="app-brand justify-content-center">
				<a href="{{ route('home') }}" class="app-brand-link gap-2">
					<span class="app-brand-logo demo">
						<img class="img-fluid" src="{{ asset('/assets/images/favicon/favicon.svg') }}" width="36" height="36" alt="Inventory Ops"/>
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
			{{-- /Logo --}}
			<h4 class="mb-2">
				{{ isset($url) ? ucwords($url) : "" }}
				<span>
					{{ __('Login') }}
				</span>
			</h4>
			<p class="mb-4">
				Please sign-in to your account
			</p>
			@isset($url)
			<form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}" id="formAuthentication" class="mb-3">
			@else
			<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
			@endisset
				@csrf
				{{-- @if (isset($url) && $url === 'customer') --}}
				{{-- <div class="mb-3">
					<label for="phone" class="form-label">
						Phone Number:
					</label>
					<input
						type="text"
						name="phone"
						id="phone"
						value="{{ old('phone') }}"
						class="form-control @error('phone') is-invalid @enderror"
					>
					@error('phone')
					<span class="d-block invalid-feedback" role="alert">
						<strong>
							{{ $message }}
						</strong>
					</span>
					@enderror
				</div> --}}
				{{-- @else --}}
				<div class="mb-3">
					<label for="email" class="form-label">
						{{ __('Email') }}
					</label>
					<input
						id="email"
						type="email"
						class="form-control @error('email') is-invalid @enderror"
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
				<div class="mb-3 form-password-toggle">
					<div class="d-flex justify-content-between">
						<label class="form-label" for="current-password">
							{{ __('Password') }}
						</label>
						@if (Route::has('password.request'))
							<a href="{{ route('password.request') }}">
								<small>
									{{ __('Forgot Your Password?') }}
								</small>
							</a>
						@endif
					</div>
					<div class="input-group input-group-merge">
						<input
							type="password"
							id="current-password"
							class="form-control @error('password') is-invalid @enderror"
							name="password"
							placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
							aria-describedby="password"
							autocomplete="current-password"
						/>
						<span class="input-group-text cursor-pointer">
							<i class="bx bx-hide"></i>
						</span>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
				</div>
				{{-- @endif --}}
				{{-- @if (! (isset($url) && $url === 'customer')) --}}
				<div class="mb-3">
					<div class="form-check">
						<input
							class="form-check-input"
							type="checkbox"
							name="remember"
							id="remember"
							{{ old('remember') ? 'checked' : '' }}
						/>
						<label class="form-check-label" for="remember">
							{{ __('Remember Me') }}
						</label>
					</div>
				</div>
				{{-- @endif --}}
				<div class="mb-3">
					<button class="btn btn-primary d-grid w-100" type="submit">
						{{ __('Login') }}
					</button>
				</div>
				@if (isset($url) && $url === 'customer')
				<p class="mb-2">
					No account? Register and join us.
				</p>
				<div class="mb-3">
					<a href="{{ route('customer.register') }}" class="btn btn-primary d-grid w-100">
						{{ __('Register') }}
					</a>
				</div>
				@endif
			</form>
		</div>
	</div>
	{{-- / Login --}}
</div>
{{-- /Content --}}
@endsection
