@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	<span class="text-muted fw-light">
		Edit Deal /
	</span>
	Info
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('deal.edit.info', $deal->id) }}" method="POST" enctype="multipart/form-data">
					@csrf
					<input
						type="hidden"
						name="branch"
						value="{{ $deal->branch_id }}"
					/>
					<input
						type="hidden"
						name="vendor"
						value="{{ $vendorID }}"
					/>
					<input
						type="hidden"
						name="previous_banner"
						value="{{ $deal->banner }}"
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
								value="{{ old('name', session()->get('deal.edit.info.name', $deal->name)) }}"
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
							<textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter deal description">{{ old('description', session()->get('deal.edit.info.description', $deal->description)) }}</textarea>
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
								value="{{ old('start_date', session()->get('deal.edit.info.start_date', $deal->start_date->format('Y-m-d'))) }}"
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
								value="{{ old('end_date', session()->get('deal.edit.info.end_date', $deal->end_date->format('Y-m-d'))) }}"
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
								aria-required='true'
							>
							@if ($errors->has('banner'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('banner') }}
								</strong>
							</span>
							@endif
							@if ($deal->banner)
							<div class="mt-3">
								<span class="form-label">
									Current Image:
								</span>
								<img class="img-thumbnail rounded mt-1 border border-2" src='{{ "/images/deal-banners/{$vendorID}/500x500/{$deal->banner}" }}' style="height:150px;"/>
							</div>
							@endif
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary">
								Next
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection