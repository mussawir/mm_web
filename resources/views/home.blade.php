@extends('layouts.front')

@section('content')
{{-- <div class="container-fluid p-0 mb-5">
	<div class="hero-bannerMain"></div>
</div> --}}
<div class="container">
	<div class="d-flex flex-wrap" id="vendorContent">
		@forelse ($vendors as $vendor)
			<div x-show="selectedTab === '{{ $vendor->vendorType->is_food ? 'food' : 'general' }}'" class="vendor-title col-12 col-lg-4 col-md-6 px-2" data-vendor-type="{{ $vendor->vendorType->is_food ? 'food' : 'general' }}">
				<div class="overflow-hidden mw-100 rounded-4 shadow-lg m-3 position-relative border border-secondary-subtle">
					<a href="{{ route('vendor.detail', $vendor->id) }}">
						<div class="rounded-3 position-relative">
							<div class="d-flex align-items-center justify-content-center overflow-hidden" style="aspect-ratio: 16/9;border-top-left-radius:12px;border-top-right-radius:12px;background-color:#f7f7f7;">
								<img src="{{ "/images/vendors/banners/{$vendor->banner1}" }}" class="card-img-bg position-relative" loading="lazy"/>
							</div>
							<div class="m-3 position-absolute" style="inset:0;">
								<div class="d-flex flex-column start-0 position-absolute top-0">
									<div class="d-inline-flex align-items-center rounded-2 py-1 px-2 text-center mb-1 bds-c-tag--variant-gradient" style="column-gap:2px;height:24px;max-width:232px;width:max-content;">
										<span class="d-flex">
											<x-icon name='percentage'/>
										</span>
										<span class="overflow-hidden fw-semibold" style="text-overflow:ellipsis;white-space:nowrap;font-size:12px;">
											20% off
										</span>
									</div>
									<div class="d-inline-flex align-items-center rounded-2 py-1 px-2 text-center mb-1 bds-c-tag--variant-gradient" style="column-gap:2px;height:24px;max-width:232px;width:max-content;">
										<span class="d-flex">
											<x-icon name='percentage'/>
										</span>
										<span class="overflow-hidden fw-semibold" style="text-overflow:ellipsis;white-space:nowrap;font-size:12px;">
											Welcome gift: free de...
										</span>
									</div>
								</div>
								<div class="d-inline-flex align-items-center text-center bottom-0 end-0 position-absolute" style="background-color:#333333cc;border-radius:9999px;height:16px;padding:2px 8px;column-gap:2px;max-width:232px;">
									<span class="fw-semibold text-white" style="font-size:10px;">Featured</span>
								</div>
							</div>
						</div>
						<div class="d-flex flex-column" style="margin:12px;">
							<div class="mb-1 d-flex align-items-center fw-semibold fs-6 cl-neutral-primary">
								<div class="fw-bold fs-6 text-truncate vendor-name">
									{{ $vendor->company_name }}
								</div>
								<div class="d-inline-flex flex-nowrap align-items-center justify-content-end flex-shrink-0 ms-auto" style="max-width:232px;">
									<div class="d-inline-flex align-items-center justify-content-center me-1">
										<img
											src="{{ asset('assets/images/avatars/rating-star.png') }}"
											width="14"
											height="14"
											alt="Restaurant Rating"
											loading="lazy"
										>
									</div>
									<span class="fw-semibold text-truncate fs-7 cl-neutral-primary" style="margin-left:2px;">
										4.2
									</span>
									<span class="text-truncate fs-7 cl-neutral-secondary" style="margin-left:2px;">
										(1000+)
									</span>
								</div>
							</div>
							<div class="ms-0 d-block text-truncate" style="line-height:16px;color:#666666;margin-right:unset;">
								<div class="fw-semibold fs-7 align-middle d-inline" style="margin-right:2px;color:#666666;">
									<div class="d-inline fw-semibold fs-7">
										$$$
									</div>
								</div>
								@if ($vendor->categories->count())
								<div class="d-inline fw-semibold fs-7 align-middle cl-neutral-inactive" style="margin:0 4px 0 2px;">
									•
								</div>
								<div class="fw-semibold d-inline fs-7 align-middle" style="margin-right:2px;color:#666666;">
									<div class="fw-semibold d-inline fs-7">
										{{ $vendor->categories->random()->name }}
									</div>
								</div>
								@endif
							</div>
						</div>
					</a>
				</div>
			</div>
		@empty
		<div class="fw-semibold px-3">
			We are coming to this area soon.
		</div>
		@endforelse
	</div>
</div>
@endsection

@push('scripts')
<script src="//unpkg.com/alpinejs" defer></script>
@endpush