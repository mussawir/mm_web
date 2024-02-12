@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
    <span class="text-muted fw-light">
		Add New Group Deal /
	</span>
	Info
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
                <h5 class="display-6">
                    {{ $branch->name }}
                </h5>
				<form method="POST" action="{{ route('group-deals.info') }}" enctype="multipart/form-data">
					@csrf
                    <input type="hidden" name="branch" value="{{ $branch->id }}"/>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="name" class="form-label">
								Group Deal Name
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
								value="{{ old('name', session()->get('group-deal.info.name', '')) }}"
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
								Group Deal Description
							</label>
							<textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter group deal description">{{ old('description', session()->get('group-deal.info.description', '')) }}</textarea>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-sm-6">
							<label for="banner" class="form-label">
								Group Deal Banner
							</label>
							<input
								class="form-control"
								type="file"
								id="banner"
								name="banner"
							>
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
