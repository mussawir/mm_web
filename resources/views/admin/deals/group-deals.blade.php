@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Group Deals List
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
					<a href="/admin/group-deals/create/{{ $branch }}" class="btn btn-primary">
						New Group Deal
					</a>
				</div>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="table-responsive text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">Name</th>
					<th scope="col">Status</th>
					<th scope="col" class="text-center">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($groupDeals as $groupDeal)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $groupDeal->name }}</td>
					<td>
						<div class="form-check form-switch mb-2">
							<input class="form-check-input deal-status-switch" data-id="{{ $groupDeal->id }}" type="checkbox" id="statusSwitch" {{ ($groupDeal->status) ? 'checked' : '' }}/>
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
								{{-- <a class="dropdown-item" href="{{ route('group-deals.edit', $groupDeal->id) }}">
									<i class="bx bx-edit-alt me-1"></i>
									Edit
								</a>
								<a class="dropdown-item" href="/admin/delete/deal/{{ $groupDeal->id }}">
									<i class="bx bx-trash me-1"></i>
									Delete
								</a> --}}
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="8">
						<div class="d-flex justify-content-center fw-semibold lead my-2">
							No group deals available.
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $groupDeals->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection
