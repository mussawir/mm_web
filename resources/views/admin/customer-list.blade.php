@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Customer List
</h4>
<div class="card">
	<div class="card-header">
		<div class="row">
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
		</div>
	</div>
	<div class="p-3 pb-0">
		{{ $customers->links() }}
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="table-responsive text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Location</th>
					<th scope="col">Number</th>
					<th scope="col">House Number</th>
					<th scope="col">Street</th>
					<th scope="col">Email</th>
					<th scope="col">Verified Customer</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($customers as $customer)
				<tr>
					<td>
						{{ $customer->name }}
					</td>
					<td>
						{{ $customer->geo_location }}
					</td>
					<td>
						{{ $customer->phone_number }}
					</td>
					<td>
						{{ $customer->house_number }}
					</td>
					<td>
						{{ $customer->street }}
					</td>
					<td>
						{{ $customer->email }}
					</td>
					<td>
						<span class="badge bg-label-{{ ($customer->verified_customer == 1) ? 'success' : 'danger' }} me-1">
							{{ ($customer->verified_customer == 1) ? 'Yes' : 'No' }}
						</span>
					</td>
				</tr>
				@empty
				<tr class="fw-semibold lead my-0 alert alert-danger text-center">
					<td colspan="7">
						No customers available.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- / Hoverable Table Rows --}}
	<div class="p-3 pb-0">
		{{ $customers->links() }}
	</div>
</div>
@endsection
