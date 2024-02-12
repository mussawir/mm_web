@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	User List
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
				<a href="/admin/addnew/user" class="btn btn-primary">
					New
				</a>
			</div>
		</div>
	</div>
	{{-- Hoverable Table Rows --}}
	<div class="text-nowrap">
		<table id="searching_table" class="table table-hover">
			<thead>
				<tr>
					<th scope="col">S.No</th>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Role</th>
					<th scope="col">Branch</th>
					<th scope="col" class="d-flex justify-content-start">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($users as $user)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>
						@if ($user->role == '1')
							Admin
						@elseif ($user->role == '2')
							Manager
						@endif
					</td>
					<td>
						{{ $user->branch->name }}
					</td>
					<td>
						<div class="d-flex gap-2">
							<a href="javascript:void(0)" class="btn btn-primary">
								Edit
							</a>
							<a href="javascript:void(0)" class="btn btn-danger">
								Delete
							</a>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="6">
						<div class="d-flex justify-content-center font-weight-600 lead my-0 alert alert-danger">
							No users available.
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection
