@extends('layouts.front')

@section('content')
<div class="container">
	<div class="card card-body bg-secondary-subtle my-5">
		<h5 class="card-title display-6 text-center text-uppercase py-4">
			{{ __('Contact Us') }}
		</h5>
		<form class="row g-3" action="" method="POST" onsubmit="return false;">
			<div class="col-md-6">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control" id="name">
			</div>
			<div class="col-md-6">
				<label for="email" class="form-label">Email</label>
				<input type="email" class="form-control" id="email">
			</div>
			<div class="col-md-6">
				<label for="phone" class="form-label">
					Phone Number
				</label>
				<input type="number" class="form-control" id="phone">
			</div>

			<div class="col-md-6">
				<label for="message" class="form-label">
					Message
				</label>
				<textarea class="form-control" placeholder="Type your message..." id="message" rows="5"></textarea>
			</div>
			
			<div class="col-12 text-center">
				<button type="submit" class="btn btn-lg btn-primary">
					Submit
				</button>
			</div>
		</form>
	</div>
</div>
@endsection