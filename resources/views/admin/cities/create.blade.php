@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New City
</h4>
<div class="row">
	<div class="col-xl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/cities">
					@csrf
					<div class="row mb-3">
						<label for="name" class="col-sm-2 col-form-label">
							Name
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('name') is-invalid @enderror"
								name="name"
								value="{{ old('name') }}"
								type="text"
								placeholder="Enter City Name"
								id="name"
								aria-required="true"
							>
							@if($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('name') }}
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
