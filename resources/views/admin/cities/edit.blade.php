@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Update City
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card mb-4">
			<div class="card-body">
				<form method="POST" action="/admin/cities/{{ $city->id }}">
					@csrf
					@method('PUT')
					<div class="row mb-3">
						<label for="name" class="col-sm-2 col-form-label">
							Name
						</label>
						<div class="col-sm-10">
							<input
								type="text"
								class="form-control"
								name="name"
								id="name"
								value="{{ old('name', $city->name) }}"
								placeholder="Enter City Name"
							/>
							@if($errors->has('name'))
							<span class="d-block invalid-feedback" role="alert">
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
								Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
