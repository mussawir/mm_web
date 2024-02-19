@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	<span class="text-muted fw-light">
		Add New Deal /
	</span>
	Info
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				@if(session('message'))
					<div class="alert alert-success alert-dismissible">
						<strong>
							{{ session('message') }}
						</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
				@endif
				<form method="POST" action="{{ route('deal.info') }}" enctype="multipart/form-data">
					@csrf
					<input
						type="hidden"
						name="vendor"
						value="{{ $vendor->id }}"
					/>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="name" class="form-label">
								Deal Name
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<input
								class="form-control @error('name') is-invalid @enderror"
								type="text"
								name="name"
								id="name"
								placeholder="Type deal name"
								value="{{ old('name', session()->get('deal.info.name', '')) }}"
								aria-required='true'
							>
							@if ($errors->has('name'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('name') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="name" class="form-label">
								Deal Description
							</label>
							<textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter deal description">{{ old('description', session()->get('deal.info.description', '')) }}</textarea>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="start_date" class="form-label">
								Start Date
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<input
								class="form-control @error('start_date') is-invalid @enderror"
								type="date"
								id="start_date"
								name="start_date"
								placeholder="Enter start date of deal"
								value="{{ old('start_date', session()->get('deal.info.start_date', '')) }}"
								aria-required='true'
							>
							@if ($errors->has('start_date'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('start_date') }}
								</strong>
							</span>
							@endif
						</div>
						<div class="col-sm-6">
							<label for="end_date" class="form-label">
								End Date
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<input
								class="form-control @error('end_date') is-invalid @enderror"
								type="date"
								id="end_date"
								name="end_date"
								placeholder="Enter end date for deal"
								value="{{ old('end_date', session()->get('deal.info.end_date', '')) }}"
								aria-required='true'
							>
							@if ($errors->has('end_date'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('end_date') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="banner" class="form-label">
								Banner
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<input
								class="form-control @error('banner') is-invalid @enderror"
								type="file"
								id="banner"
								name="banner"
							>
							@if ($errors->has('banner'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('banner') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary">
								Save & Add Items
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
