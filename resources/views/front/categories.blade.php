@extends('layouts.front')

@section('content')
<div class="container">
	@if ($categories->count())
	<div class="m-2 p-2">
		{{-- <h3>
			All
		</h3> --}}
		{{-- @livewire('search-vendors') --}}
	</div>
	@endif
	<div class="d-flex flex-wrap" id="vendorContent">
		@forelse ($categories as $category)
			<div
				class="vendor-title col-12 col-lg-4 col-md-6 px-2"
			>
				<div class="overflow-hidden mw-100 rounded-4 shadow-lg m-3 position-relative border border-secondary-subtle">
					<a href="{{ route('category.detail', $category->id) }}">
						<div class="rounded-3 position-relative">
							<div class="d-flex align-items-center justify-content-center overflow-hidden" style="aspect-ratio: 16/9;border-top-left-radius:12px;border-top-right-radius:12px;background-color:#f7f7f7;">
								<strong>{{ $category->name }}</strong>
								{{-- <img src="{{ "/images/categories/{$category->id}/500x500/{$category->image}" }}" class="card-img-bg position-relative" loading="lazy"/> --}}
							</div>
						</div>
						<div class="d-flex flex-column" style="margin:12px;">
							<div class="mb-1 d-flex align-items-center fw-semibold fs-6 cl-neutral-primary justify-content-between">
								<div class="vendor-name f-title-small-font-size fw-title-small-font-weight lh-title-small-line-height ff-title-small-font-family">
									{{-- {{ $category->name }} --}}
								</div>
								{{-- Condition for logged in customer and if customer has this vendor as favourite
								<i class="fa-solid fa-heart text-primary"></i> --}}
							</div>
							<div class="ms-0 d-block text-truncate" style="line-height:16px;color:#666666;margin-right:unset;">
								<div class="fw-semibold fs-7 align-middle d-inline" style="margin-right:2px;color:#666666;">
								</div>
								{{-- <div class="fw-semibold d-inline fs-7 align-middle" style="margin-right:2px;color:#666666;">
									<div class="fw-semibold d-inline fs-7">
										{{ $item->category->name }}
									</div>
								</div> --}}
							</div>
						</div>
					</a>
				</div>
			</div>
		@empty
		<h3 class="m-3 p-3">
			No categories added.
		</h3>
		@endforelse
	</div>
</div>
@endsection
