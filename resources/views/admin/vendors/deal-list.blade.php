@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Vendor Deal List
</h4>
<div class="card">
	<div class="card-header">
		@if ($message = Session::get('message'))
		<div class="alert alert-success alert-dismissible">
			<strong>{{ $message }}</strong>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<div class="row gap-md-0 gap-4">
			<div class="col-md-6">
				<div class="input-group input-group-merge">
					<span class="input-group-text" id="search-box">
						<i class="bx bx-search"></i>
					</span>
					<input
						id="search"
						name="search"
						type="text"
						class="form-control"
						placeholder="Search..."
						aria-label="Search..."
						aria-describedby="search-box"
					/>
				</div>
			</div>
			<div class="col-md-6 text-md-end text-center">
				<div class="d-inline-flex gap-3">
					<a href="/admin/deals/create/{{ $vendorID }}" class="btn btn-primary">
						New
					</a>
				</div>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Name</th>
					<th scope="col">Start Date</th>
					<th scope="col">End Date</th>
					<th scope="col">Grand Total</th>
					<th scope="col">Offer</th>
					<th scope="col">Status</th>
					<th scope="col" class="text-center">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($deals as $deal)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $deal->name }}</td>
					<td>{{ $deal->start_date->format('M d Y') }}</td>
					<td>{{ $deal->end_date->format('M d Y') }}</td>
					<td>{{ $deal->grand_total }}</td>
					<td>{{ $deal->offer }}</td>
					<td>
						<div class="form-check form-switch mb-2">
							<input class="form-check-input deal-status-switch" data-id="{{ $deal->id }}" type="checkbox" id="statusSwitch" {{ ($deal->status) ? 'checked' : '' }}/>
							<label class="form-check-label visually-hidden" for="statusSwitch">
								Status Switch
							</label>
						</div>
					</td>
					<td>
						<div class="dropdown text-center">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="{{ $deal->addons->count() ? '/admin/deals/' . $deal->id . '/addons/edit' : '/admin/deals/addons/add/' . $deal->id }}">
									<i class="bx bx-plus-circle me-1"></i>
									{{ $deal->addons->count() ? 'Update' : 'Add' }} Add-Ons
								</a>
								<a class="dropdown-item" href="{{ route('deal.edit', [$deal->id, $vendorID]) }}">
									<i class="bx bx-edit-alt me-1"></i>
									Edit
								</a>
								{{-- <form action="{{ route('deal.destroy', ['id' => $deal->id]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit" onclick="return confirm('Are you sure you want to delete this deal?')" class="dropdown-item">
										<i class="bx bx-trash me-1"></i>
										Delete
									</button>
								</form> --}}
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr class="fw-semibold lead my-0 alert alert-danger text-center">
					<td colspan="8">
						No deals available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $deals->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection
