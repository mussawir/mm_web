@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Customer Approval List
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
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($customers as $customer)
				<tr>
					<td>{{ $customer->name }}</td>
					<td>{{ $customer->email }}</td>
					<td>
						<div class="btn-group btn-group-sm gap-2" role="group">
							<form action="{{ route('approve.customer', $customer->id) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-success">
									<i class="bx bx-check me-1"></i>
									Approve
								</button>
							</form>
							<form action="{{ route('reject.customer', $customer->id) }}" method="POST">
								@csrf
								<button type="submit" class="btn btn-danger">
									<i class="bx bx-x me-1"></i>
									Reject
								</button>
							</form>
						</div>
					</td>
				</tr>
				@empty
				<tr class="fw-semibold lead my-0 alert alert-danger text-center">
					<td colspan="5">
						No approvals pending.
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection