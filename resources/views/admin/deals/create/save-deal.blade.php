@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	<span class="text-muted fw-light">
		Add New Deal /
	</span>
	Save
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<h5 class="display-6">Step 3: Review Your Deal</h5>

				<h6 class="fw-bold">
					Deal Information:
				</h6>
				<div class="row mb-3">
					<div class="col-md-4">
						<p>
							<strong>
								Name:
							</strong>
							{{ $info['name'] }}
						</p>
					</div>
					<div class="col-md-4">
						<p>
							<strong>
								Start Date:
							</strong>
							{{ $info['start_date'] }}
						</p>
					</div>
					<div class="col-md-4">
						<p>
							<strong>
								End Date:
							</strong>
							{{ $info['end_date'] }}
						</p>
					</div>
				</div>

				<p>
					<strong>
						Selected Items:
					</strong>
				</p>
				<div class="card mb-3">
					<div class="card-body mx-0 px-0">
						<div class="table-responsive text-nowrap">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Quantity</th>
										<th>Items</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($selectedItems as $item)
									<tr>
										<td>{{ $item['name'] }}</td>
										<td>{{ $item['quantity'] }}</td>
										<td>
											<ul class="list-group">
												@foreach ($item['items'] as $product)
												<li class="mb-2">
													{{ $product['name'] }}
													<div class="vstack fw-semibold ps-2 small">
														<span>
															<span class="text-muted">
																Price:
															</span>
															{{ $product['original_price'] }}
														</span>
														<span>
															<span class="text-muted">
																Additional Price:
															</span>
															{{ $product['deal_price'] }}
														</span>
													</div>
													{{-- {{ $product['name'] }} - {{ ($product['deal_price'] ?? null) ? 'Additional' : '' }} Price: {{ $product['deal_price'] ?? $product['original_price'] }} --}}
												</li>
												@endforeach
											</ul>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				{{-- <p>
					<strong>
						Grand Total:
					</strong>
					{{ $grandTotal }}
				</p> --}}

				<form method="POST" action="{{ route('deal.store') }}">
					@csrf
					<input type="hidden" name="vendor" value="{{ $vendor }}"/>
					<div class="row mb-3">
						<div class="col-md-4">
							<label class="form-label" for="grand_total">
								Grand Total
								<span class='text-danger' aria-hidden='true'>
									*
								</span>
							</label>
							<input
								class="form-control @error('grand_total') is-invalid @enderror"
								type="number"
								name="grand_total"
								id="grand_total"
								aria-required="true"
								placeholder="Enter grand total price"
								value="{{ old('grand_total') }}"
							/>
							@if ($errors->has('grand_total'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('grand_total') }}
								</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<label class="form-label" for="discount_price">
								Discount Price:
							</label>
							<input
								class="form-control @error('discount_price') is-invalid @enderror"
								type="number"
								name="discount_price"
								id="discount_price"
								aria-required="true"
								placeholder="Enter discount price"
								value="{{ old('discount_price', 0) }}"
							/>
							@if ($errors->has('discount_price'))
							<span class="d-block invalid-feedback" role="alert">
								<strong>
									{{ $errors->first('discount_price') }}
								</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<a class="btn btn-secondary" href="{{ route('deal.itemsForm', $vendor) }}">
								Previous
							</a>
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
