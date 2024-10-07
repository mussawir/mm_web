@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Add New Inventory Mapping
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
				<form method="POST" action="{{ route('inventory.mapping.store') }}">
					@csrf
					{{-- <input
						name="vendor"
						type="hidden"
						value="{{ $vendor->id }}"
					/> --}}
					<div class="row mb-3">
						<label for="item" class="col-sm-2 col-form-label">
							Item
							<span class="text-danger" aria-hidden="true">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<select
								id="item"
								name="item"
								class="form-select @error('item') is-invalid @enderror"
								aria-required='true'
								aria-label='Select Item'
							>
								<option value="">
									Select Item
								</option>
								@foreach($items as $item)
								<option value="{{ $item->id }}" {{ old('item') == $item->id ? 'selected' : '' }}>
									{{ $item->name }}
								</option>
								@endforeach
							</select>
							@if($errors->has('item'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('item') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="location" class="col-sm-2 col-form-label">
							Location
							<span class="text-danger" aria-hidden="true">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<select
								id="location"
								name="location"
								class="form-select @error('location') is-invalid @enderror"
								aria-required='true'
								aria-label='Select Location'
							>
								<option value="">
									Select Location
								</option>
								@foreach($locations as $location)
								<option value="{{ $location->id }}" {{ old('location') == $location->id ? 'selected' : '' }}>
									{{ $location->name }}
								</option>
								@endforeach
							</select>
							@if($errors->has('location'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('location') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row mb-3">
						<label for="quantity" class="col-sm-2 col-form-label">
							Quantity
							<span aria-hidden="true" class="text-danger">
								*
							</span>
						</label>
						<div class="col-sm-10">
							<input
								type="number"
								class="form-control @error('quantity') is-invalid @enderror"
								name="quantity"
								id="quantity"
								value="{{ old('quantity') }}"
								placeholder="Type quantity"
								aria-required="true"
							>
							@if($errors->has('quantity'))
							<span class="invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('quantity') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<button type="submit" class="btn btn-primary" name="action" value="save">
								Save
							</button>
							<button type="submit" class="btn btn-primary" name="action" value="saveAndAddMore">
								Save & Add More
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection