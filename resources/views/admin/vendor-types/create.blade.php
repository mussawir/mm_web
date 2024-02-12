@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Vendor Type
</h4>
<div class="row">
	<div class="col-xl">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="/admin/vendor-types">
					@csrf
					<div class="row mb-3">
						<label for="type_name" class="col-sm-2 col-form-label">
							Type Name
							<span class='text-danger' aria-hidden='true'>*</span>
						</label>
						<div class="col-sm-10">
							<input
								class="form-control @error('type_name') is-invalid @enderror"
								type="text"
								name="type_name"
								id="type_name"
								placeholder="Enter Type Name"
								aria-required="true"
								value="{{ old('type_name') }}"
							>
							@if ($errors->has('type_name'))
							<span class="invalid-feedback">
								<strong>
									{{ $errors->first('type_name') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="" class="col-sm-2 col-form-label">
							Food Vendor
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<div class="form-check form-check-inline">
								<input
									class="form-check-input @error('is_food') is-invalid @enderror"
									type="radio"
									name="is_food"
									value="1"
									id="yes"
									aria-required="true"
									{{ (old('is_food') == '1') ? 'checked' : '' }}
								>
								<label class="form-check-label" for="yes">
									Yes
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input
									class="form-check-input @error('is_food') is-invalid @enderror"
									type="radio"
									name="is_food"
									value="0"
									id="no"
									aria-required="true"
									{{ (old('is_food') == '0') ? 'checked' : '' }}
								>
								<label class="form-check-label" for="no">
									No
								</label>
							</div>
							@if($errors->has('is_food'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('is_food') }}
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