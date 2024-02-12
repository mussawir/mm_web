@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	Reservation List
</h4>
<div class="card">
	<div class="card-header">
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
					<th scope="col">S.No</th>
					<th scope="col">Name</th>
					<th scope="col">Phone Number</th>
					<th scope="col">Reservation Date</th>
					<th scope="col">Reservation Time</th>
					<th scope="col">Status</th>
					<th scope="col" class="text-center">
						Actions
					</th>
				</tr>
			</thead>
			<tbody class="table-border-bottom-0">
				@forelse ($reservations as $reservation)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $reservation->name }}</td>
					<td>{{ $reservation->phone }}</td>
					<td>
						{{ date('d M Y', strtotime($reservation->reservation_date)) }}
					</td>
					<td>
						{{ date('h:i A', strtotime($reservation->reservation_time)) }}
					</td>
					<td>
						@if ($reservation->status == 1)
						<span class="badge bg-label-primary">
							Not Reserved
						</span>
						@elseif ($reservation->status == 2)
						<span class="badge bg-label-success">
							Reserved
						</span>
						@elseif ($reservation->status == 3)
						<span class="badge bg-label-danger">
							Canceled
						</span>
						@endif
					</td>
					<td>
						<div class="dropdown text-center">
							<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
								<i class="bx bx-dots-vertical-rounded"></i>
							</button>
							<div class="dropdown-menu">
								@if ($reservation->status == 1)
								<a
									class="dropdown-item"
									href="/admin/reservation/reserve/{{ $reservation->id }}"
									onclick="return confirm('Reserve this?')"
								>
									Reserve
								</a>
								<a
									class="dropdown-item"
									href="/admin/reservation/cancel/{{ $reservation->id }}"
									onclick="return confirm('Are you sure you want to cancel?')"
								>
									Cancel
								</a>
								@else
								<a
									class="dropdown-item"
									href="javascript:void(0);"
								>
									No action needed
								</a>
								@endif
							</div>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan="8">
						<div class="d-flex justify-content-center fw-semibold lead my-2">
							No reservations available.
						</div>
					</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="p-3 pb-0">
		{{ $reservations->links() }}
	</div>
	{{-- / Hoverable Table Rows --}}
</div>
@endsection
