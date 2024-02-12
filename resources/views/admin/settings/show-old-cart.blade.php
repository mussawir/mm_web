@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Clean Old Cart
</h4>
<div class="card">
	@if ($message = Session::get('message'))
		<div class="card-header">
			<div class="alert alert-success alert-dismissible">
				<strong>{{ $message }}</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	@endif
	<div class="card-body">
		<h5 class="card-title">
			You have <span class="fw-bold text-danger">{{ $oldCarts->count() }}</span> old cart{{ ($oldCarts->count() > 1 ? "s." : ".") }}
		</h5>
		{{-- <p class="card-text"></p> --}}
		<form method="POST" action="{{ route('settings.clean-old-cart') }}">
			@csrf
			<a
				href="{{ route('settings.clean-old-cart') }}"
				onclick="event.preventDefault(); this.closest('form').submit();"
				class="btn btn-primary"
			>
				Clean Old Cart{{ ($oldCarts->count() > 1 ? "s" : "") }}
			</a>
		</form>
	</div>
	{{-- <div class="card-footer text-muted"></div> --}}
</div>
@endsection