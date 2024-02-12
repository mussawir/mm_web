@extends('layouts.admin')

@section('content')
<h4 class="fw-bold mb-4">
	<span class="text-muted fw-light">
		Add New Group Deal /
	</span>
	Save
</h4>
<div class="row">
	<div class="col-xxl">
		<div class="card">
			<div class="card-body">
				<h5 class="display-6">Review Your Group Deal</h5>

				<div class="row mb-3">
					<div class="col-md-4">
						<p>
							<strong>
								Name:
							</strong>
							{{ $info['name'] }}
						</p>
					</div>
				</div>

				<p>
					<strong>
						Selected Deals:
					</strong>
				</p>
				@foreach($selectedDeals as $selectedDeal)
					<p>
						<div class="input-group">
							<div class="input-group-text">
								{{ $selectedDeal['deal']->name }}
							</div>
							<div class="input-group-text">
								<s>
                                    {{ $selectedDeal['deal']->grand_total }}
                                </s>
							</div>
							<div class="input-group-text">
								{{ $selectedDeal['deal']->offer }}
							</div>
                            <span class="input-group-text cursor-pointer">
                                <i class='bx bx-x text-danger fs-4'></i>
                            </span>
						</div>
					</p>
				@endforeach

				<form method="POST" action="{{ route('group-deals.store') }}">
					@csrf
                    <input type="hidden" name="branch" value="{{ $branch }}"/>
					<div class="row justify-content-end">
						<div class="col-sm-10 text-end">
							<a class="btn btn-secondary" href="{{ route('group-deals.add-deals-form', $branch) }}">
								Previous
							</a>
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
