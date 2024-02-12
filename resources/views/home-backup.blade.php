@extends('layouts.front')

@section('content')
	<div class="d-flex justify-content-center align-items-center mt-4 mb-2 deals-heading-container {{ $deals->count() ? '' : 'd-none' }}">
		<h4>Deals</h4>
	</div>
	<div class="owl-carousel owl-theme p-2 deals-carousel {{ $deals->count() ? '' : 'd-none' }}" id="dealsCarousel">
		@foreach ($deals as $deal)
			<div class="card rounded-4 shadow-lg m-3">
				<a href="{{ route('deal.detail', $deal->id) }}" class="vstack position-relative card-img-bg"
					style="background-image: url('{{ "/images/deal-banners/{$deal->branch_id}/500x500/{$deal->banner}" }}');">
				</a>
				<a href="{{ route('deal.detail', $deal->id) }}" class="card-body vstack justify-content-end">
					<h6 class="card-title text-primary">
						{{ $deal->name }}
					</h6>
					<p class="card-text fw-semibold">
						{{ session('currency')->symbol . $deal->grand_total }}
					</p>
					<div class="d-flex mt-4 gap-2 justify-content-center align-items-center">
						<button type="button" class="btn btn-primary hstack px-4 text-white rounded gap-2"
							style="background-color: #047FB8"
							onclick="window.location({{ route('deal.detail', $deal->id) }});">
							<i class="fa-solid fa-bag-shopping"></i>
							<span>Add</span>
						</button>
					</div>
				</a>
			</div>
		@endforeach
	</div>

	@if ($deals->count())
		<hr />
	@endif

	<div class="d-flex justify-content-center align-items-center mt-4 mb-2 {{ $activeCategories->count() ? '' : 'd-none' }}">
		<h4>Food Categories</h4>
	</div>
	@if ($activeCategories->count())
		<section class="bg-class sticky-top">
			<ul class="nav nav-pills owl-carousel categories-carousel" id="categoriesCarousel">
				@foreach ($activeCategories as $category)
					@if ($category->items->count())
						<li class="nav-item item">
							<a class="nav-link mt-4 text-center rounded" href="#{{ strtolower(str_replace(' ', '_', $category->name)) . $category->id }}">
								<small class="d-inline-block text-truncate small-fulltext" title="{{ $category->name }}">
									{{ $category->name }}
								</small>
							</a>
						</li>
					@endif
				@endforeach
			</ul>
		</section>
	@endif

	<div class="container">
		<div class="row my-5 justify-content-center">
			<div class="col-lg-6">
				<div class="input-group input-group-lg">
					<span class="input-group-text" id="search-box">
						<i class="fa fa-search"></i>
					</span>
					<input type="text" id="search-items" name="search-items" class="form-control" placeholder="Search food items..." aria-label="Search food items" aria-describedby="search-box" />
				</div>
			</div>
		</div>
	</div>
	<div class="container" id="categoryContent">
		@foreach ($activeCategories as $category)
			<div id="{{ strtolower(str_replace(' ', '_', $category->name)) . $category->id }}" class="category-div">
				<div class="row my-4 p-2">
					<div class="col-12 text-center">
						<h2>{{ $category->name }}</h2>
					</div>
				</div>
				<div class="d-flex flex-wrap">
					@foreach ($category->items->sortBy('sort_by') as $item)
						<div class="col-12 col-lg-4 col-md-6 px-2 mb-4 m-0">
							<a href="/items/detail/{{ $item->id }}" class="d-flex justify-content-between align-items-center shadow-lg rounded-4 pe-4">
								<div class="d-flex gap-4">
									@php
									// $img150 = asset("/images/branch-products/{$item->branch_id}/150x150/{$item->main_image}");
									$img250 = asset("/images/branch-products/{$item->branch_id}/250x250/{$item->main_image}");
									// $img500 = asset("/images/branch-products/{$item->branch_id}/500x500/{$item->main_image}");
									@endphp
									<img
										src="{{ $img250 }}"
										class="rounded-4 p-2 align-self-center object-fit-cover img-of-items1 img-itemss"
										loading="lazy"
										decoding="async"
										title="{{ $item->name }}"
										alt="{{ $item->name }}"
									/>
									<div class="vstack justify-content-between my-2">
										<h4 class="item-title fw-semibold fs-6 d-inline-block text-truncate small-fulltext" style="max-width: 160px;">
											{{ $item->name }}
										</h4>
										<h6 class="fw-semibold">
											{{ session('currency')->symbol . $item->price }}
										</h6>
									</div>
								</div>
								<div class="d-flex p-2 rounded" style="background-color: #047FB8">
									<i class="fa-solid fa-plus text-white"></i>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		@endforeach
	</div>
@endsection

@section('js')
<script>
	document.getElementById("search-items").addEventListener("input", performSearch);

	function performSearch() {
		const searchQuery = document.getElementById("search-items").value.toLowerCase();

		// Get all food items that can be searched
		const foodItems = document.querySelectorAll(".item-title");

		// Create an object to track categories and their matching item counts
		const categoryCounts = {};
		
		// Loop through the food items and hide/show based on search query
		foodItems.forEach(item => {
			const itemName = item.textContent.toLowerCase();
			const shouldDisplay = itemName.includes(searchQuery);
			const categoryDiv = item.closest(".category-div");

			item.parentElement.parentElement.parentElement.parentElement.style.display = shouldDisplay ? "block" : "none";

			if (categoryDiv) {
				// Initialize the count for this category if not already
				categoryCounts[categoryDiv.id] = categoryCounts[categoryDiv.id] || 0;
				
				if (shouldDisplay) {
					// If an item matches, increment the count for its category
					categoryCounts[categoryDiv.id]++;
				}

				item.parentElement.parentElement.parentElement.parentElement.style.display = shouldDisplay ? "block" : "none";
			}
		});

		// Loop through categories and hide those with no matching items
		for (const categoryID in categoryCounts) {
			if (categoryCounts[categoryID] === 0) {
				document.getElementById(categoryID).style.display = "none";
			} else {
				document.getElementById(categoryID).style.display = "block";
			}
		}
	}
</script>
@endsection